@extends('layouts.layout')

@section('title', 'Vul autogegevens aan')

@section('content')
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">

        {{-- Progressbar --}}
        <div class="flex items-center mb-8">
            <div class="w-8 h-8 flex items-center justify-center rounded-full bg-yellow-400 text-black font-bold z-10">1
            </div>
            <div class="flex-1 h-1 bg-gray-300"></div>
            <div class="w-8 h-8 flex items-center justify-center rounded-full bg-yellow-400 text-black font-bold z-10">2
            </div>
            <div class="flex-1 h-1 bg-gray-300"></div>
            <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold z-10">3
            </div>
        </div>

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

            {{-- Kenteken (disabled) --}}
            <div class="mb-4">
                <label for="license_plate" class="block font-semibold mb-1">Kenteken</label>
                <input id="license_plate" name="license_plate" type="text" value="{{ $carData['license_plate'] }}" disabled
                    class="bg-yellow-300 text-black rounded px-3 py-2 w-full" />
            </div>

            {{-- Merk, Type, Model, Prijs --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="make" class="block font-semibold mb-1">Merk</label>
                    <input id="make" name="make" type="text" value="{{ old('make', $carData['make']) }}" required
                        class="border rounded px-3 py-2 w-full" />
                </div>
                <div>
                    <label for="brand" class="block font-semibold mb-1">Type</label>
                    <input id="brand" name="brand" type="text" value="{{ old('brand', $carData['brand']) }}" required
                        class="border rounded px-3 py-2 w-full" />
                </div>
                <div>
                    <label for="model" class="block font-semibold mb-1">Model</label>
                    <input id="model" name="model" type="text" value="{{ old('model', $carData['model']) }}" required
                        class="border rounded px-3 py-2 w-full" />
                </div>
                <div>
                    <label for="price" class="block font-semibold mb-1">Prijs (€)</label>
                    <input id="price" name="price" type="number" value="{{ old('price', $carData['price']) }}" required
                        class="border rounded px-3 py-2 w-full" />
                </div>
            </div>

            {{-- Kilometerstand, Zitplaatsen, Deuren --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="mileage" class="block font-semibold mb-1">Kilometerstand</label>
                    <input id="mileage" name="mileage" type="number" value="{{ old('mileage', $carData['mileage']) }}"
                        required class="border rounded px-3 py-2 w-full" />
                </div>
                <div>
                    <label for="seats" class="block font-semibold mb-1">Aantal zitplaatsen</label>
                    <input id="seats" name="seats" type="number" value="{{ old('seats', $carData['seats']) }}" required
                        class="border rounded px-3 py-2 w-full" />
                </div>
                <div>
                    <label for="doors" class="block font-semibold mb-1">Aantal deuren</label>
                    <input id="doors" name="doors" type="number" value="{{ old('doors', $carData['doors']) }}" required
                        class="border rounded px-3 py-2 w-full" />
                </div>
            </div>

            {{-- Bouwjaar, Gewicht, Kleur --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <label for="production_year" class="block font-semibold mb-1">Bouwjaar</label>
                    <input id="production_year" name="production_year" type="number"
                        value="{{ old('production_year', $carData['production_year']) }}" required
                        class="border rounded px-3 py-2 w-full" />
                </div>
                <div>
                    <label for="weight" class="block font-semibold mb-1">Gewicht (kg)</label>
                    <input id="weight" name="weight" type="number" value="{{ old('weight', $carData['weight']) }}" required
                        class="border rounded px-3 py-2 w-full" />
                </div>
                <div>
                    <label for="color" class="block font-semibold mb-1">Kleur</label>
                    <input id="color" name="color" type="text" value="{{ old('color', $carData['color']) }}" required
                        class="border rounded px-3 py-2 w-full" />
                </div>
            </div>

            {{-- Navigatie --}}
            <div class="flex justify-between items-center">
                <a href="{{ route('cars.step1') }}" class="text-indigo-600 hover:underline">Terug</a>
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                    Volgende stap
                </button>
            </div>
        </form>
    </div>
@endsection