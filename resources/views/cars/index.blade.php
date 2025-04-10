@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold text-gray-700 mb-6">Mijn Aangeboden Auto's</h1>

    <!-- Table -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">License Plate</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Brand</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Model</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Price</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Mileage</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $car->license_plate }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $car->brand }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $car->model }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ number_format($car->price, 2, ',', '.') }} €</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ number_format($car->mileage) }} km</td>
                        <td class="px-6 py-4 text-sm text-gray-800">
                            <a href="{{ route('cars.edit', $car->id) }}" class="text-indigo-600 hover:text-indigo-500">Bewerken</a>
                            |
                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-500">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
