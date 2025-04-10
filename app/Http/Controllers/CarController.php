<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function showAddCarForm()
    {
        return view('cars.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
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

        return redirect()->route('cars.show')->with('success', 'Car added successfully!');
    }
}
