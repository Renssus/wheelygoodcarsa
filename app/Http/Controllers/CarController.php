<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    // Display the form for creating a new car (default resource action)
    public function create()
    {
        return view('cars.create');
    }

    // Store a newly created car in the database (default resource action)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'license_plate' => 'required|string|max:10',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price' => 'required|numeric',
            'mileage' => 'required|integer',
            'seats' => 'nullable|integer',
            'doors' => 'nullable|integer',
            'production_year' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'color' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:255',
            'sold_at' => 'nullable|date',
        ]);

        $car = new Car([
            'user_id' => auth()->id(),
            'license_plate' => $request->license_plate,
            'brand' => $request->brand,
            'model' => $request->model,
            'price' => $request->price,
            'mileage' => $request->mileage,
            'seats' => $request->seats,
            'doors' => $request->doors,
            'production_year' => $request->production_year,
            'weight' => $request->weight,
            'color' => $request->color,
            'image' => $request->image,
            'sold_at' => $request->sold_at,
            'views' => 0, 
        ]);

        $car->save();

        // Redirect after storing the car, ideally back to the index page
        return redirect()->route('cars.index')->with('success', 'Car added successfully!');
    }

    // Display a list of cars the authenticated user owns
    public function index()
    {
        $cars = Car::where('user_id', auth()->id())->get();
        return view('cars.index', compact('cars'));
    }

    // Optional: Show a specific car (if you want to display single car details)
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }

    // Optional: Edit the details of a specific car
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    // Update the car details
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        // Validation and updating logic...

        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    // Delete a car
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }

    public function showAddCarForm()
{
    return view('cars.create');
}
}
