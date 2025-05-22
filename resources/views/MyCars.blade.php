@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Mijn Aanbod</h1>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Kenteken</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Merk</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Model</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Prijs (€)</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Views</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Acties</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($cars as $car)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">{{ $car->license_plate }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $car->make }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $car->model }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">€ {{ number_format($car->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($car->sold_at)
                                <span class="px-3 py-1 text-xs bg-red-100 text-red-800 rounded-full">Verkocht</span>
                            @else
                                <span class="px-3 py-1 text-xs bg-green-100 text-green-800 rounded-full">Beschikbaar</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $car->views }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                            <a href="{{ route('cars.detail', $car) }}" class="inline-flex items-center px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Details</a>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">Je hebt nog geen auto's aangeboden.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
