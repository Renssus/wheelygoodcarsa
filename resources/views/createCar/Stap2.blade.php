@extends('layouts.layout')

@section('title', 'Vul autogegevens aan')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">Vul de gegevens van je auto aan</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cars.postStep2') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1" for="license_plate">Kenteken</label>
            <input type="text" id="license_plate" name="license_plate" value="{{ $carData['license_plate'] ?? '' }}" disabled class="bg-yellow-300 text-black rounded px-3 py-2 w-full" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block font-semibold mb-1" for="make">Merk</label>
                <input type="text" id="make" name="make" value="{{ old('make', $carData['make'] ?? '') }}" required class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-semibold mb-1" for="brand">Type</label>
                <input type="text" id="brand" name="brand" value="{{ old('brand', $carData['brand'] ?? '') }}" required class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-semibold mb-1" for="model">Model</label>
                <input type="text" id="model" name="model" value="{{ old('model', $carData['model'] ?? '') }}" required class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-semibold mb-1" for="price">Prijs (€)</label>
                <input type="number" id="price" name="price" value="{{ old('price', $carData['price'] ?? '') }}" required class="border rounded px-3 py-2 w-full" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block font-semibold mb-1" for="mileage">Kilometerstand</label>
                <input type="number" id="mileage" name="mileage" value="{{ old('mileage', $carData['mileage'] ?? '') }}" required class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-semibold mb-1" for="seats">Aantal zitplaatsen</label>
                <input type="number" id="seats" name="seats" value="{{ old('seats', $carData['seats'] ?? '') }}" class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-semibold mb-1" for="doors">Aantal deuren</label>
                <input type="number" id="doors" name="doors" value="{{ old('doors', $carData['doors'] ?? '') }}" class="border rounded px-3 py-2 w-full" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block font-semibold mb-1" for="production_year">Bouwjaar</label>
                <input type="number" id="production_year" name="production_year" value="{{ old('production_year', $carData['production_year'] ?? '') }}" class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-semibold mb-1" for="weight">Gewicht (kg)</label>
                <input type="number" id="weight" name="weight" value="{{ old('weight', $carData['weight'] ?? '') }}" class="border rounded px-3 py-2 w-full" />
            </div>
            <div>
                <label class="block font-semibold mb-1" for="color">Kleur</label>
                <input type="text" id="color" name="color" value="{{ old('color', $carData['color'] ?? '') }}" class="border rounded px-3 py-2 w-full" />
            </div>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('cars.step1') }}" class="text-indigo-600 hover:underline">Terug</a>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Volgende stap</button>
        </div>
    </form>
</div>
@endsection
