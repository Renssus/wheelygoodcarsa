<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    // 📃 Publiek overzicht
    public function index()
    {
        $cars = Car::all();
        return view('MyCars', compact('cars'));
    }

    public function show()
    {
        $cars = Car::with('user')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('cars.show', compact('cars'));
    }

    public function detail(Car $car)
    {
        $car->increment('views');
        return view('cars.detail', compact('car'));
    }

    public function edit(Car $car)
    {
        $this->authorize('update', $car);
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $this->authorize('update', $car);

        $validated = $request->validate([
            'license_plate' => 'required|unique:cars,license_plate,' . $car->id,
            'make' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required|numeric',
            'mileage' => 'required|integer',
            'seats' => 'nullable|integer',
            'doors' => 'nullable|integer',
            'production_year' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'color' => 'nullable|string',
            'image' => 'nullable|image',
            'sold_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $validated['image'] = $request->file('image')->store('car_images', 'public');
        }

        $car->update($validated);

        return redirect()->route('cars.show')->with('success', 'Auto succesvol bijgewerkt.');
    }

    public function destroy(Car $car)
    {
        $this->authorize('delete', $car);

        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->route('cars.show')->with('success', 'Auto succesvol verwijderd.');
    }


    public function markAsSold(Car $car)
    {
        $this->authorize('update', $car);

        $car->update(['sold_at' => Carbon::now()]);

        return redirect()->route('cars.index')->with('success', 'Auto succesvol als verkocht gemarkeerd.');
    }

    /*
    |--------------------------------------------------------------------------
    | Multistep Form Functionaliteit
    |--------------------------------------------------------------------------
    */
    public function showStep1()
    {
        return view('createCar.Stap1', ['progress' => 33, 'currentStep' => 1]);
    }
    // 📄 Stap 1: kenteken invoeren
    public function postStep1(Request $request)
    {
        $request->validate([
            'license_plate' => 'required',
        ]);

        $licensePlate = $request->license_plate;

        // RDW API-call
        $response = Http::get("https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken={$licensePlate}");

        if ($response->successful() && count($response->json()) > 0) {
            $carData = $response->json()[0];
            $carData['license_plate'] = $licensePlate;
            session(['carData' => $carData]);

            return redirect()->route('cars.step2');
        }

        return back()->withErrors(['license_plate' => 'Kenteken niet gevonden.']);
    }

    // 📄 Stap 2: formulier met vooraf ingevulde RDW-data
    public function showStep2()
    {
        if (!session()->has('carData')) {
            return redirect()->route('cars.step1')->withErrors('Voer eerst een kenteken in.');
        }

        $raw = session('carData');

        // Map de RDW-velden naar jouw form-namen
        $carData = [
            'license_plate' => $raw['license_plate'] ?? '',
            'make' => $raw['merk'] ?? '',
            'brand' => $raw['handelsbenaming'] ?? '',
            'model' => $raw['handelsbenaming'] ?? '',
            'price' => '',
            'mileage' => '',
            'seats' => $raw['aantal_zitplaatsen'] ?? 'onbekend',
            'doors' => $raw['aantal_deuren'] ?? 'onbekend',
            'production_year' => isset($raw['datum_eerste_toelating'])
                ? Carbon::parse($raw['datum_eerste_toelating'])->year
                : '',
            'weight' => $raw['massa_ledig_voertuig'] ?? '',
            'color' => $raw['eerste_kleur'] ?? '',
        ];

        return view('createCar.Stap2', compact('carData'));
    }

    public function postStep2(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required|numeric',
            'mileage' => 'required|integer',
            'seats' => 'nullable|integer',
            'doors' => 'nullable|integer',
            'production_year' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'color' => 'nullable',
            'sold_at' => 'nullable|date',
        ]);

        $carData = session('carData', []);
        $carData = array_merge($carData, $request->except('_token'));
        session(['carData' => $carData]);

        return redirect()->route('cars.step3');
    }

    // 📄 Stap 3: foto uploaden
    public function showStep3()
    {
        return view('createCar.stap3');
    }

    public function postStep3(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('car_images', 'public');

        $carData = session('carData');
        $carData['image'] = $imagePath;

        // Opslaan in database
        Car::create(array_merge($carData, ['user_id' => auth()->id()]));

        session()->forget('carData');

        return redirect()->route('cars.index')->with('success', 'Auto succesvol aangemaakt.');
    }
}
