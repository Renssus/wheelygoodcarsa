
@extends('layouts.layout')

@section('title', 'Alle Auto\'s')

@section('content')
<div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">Alle aangeboden auto's</h1>

    @if($cars->isEmpty())
        <p>Er zijn nog geen auto's aangeboden.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($cars as $car)
                <div class="bg-gray-50 rounded-lg shadow hover:shadow-lg transition p-4 flex flex-col items-center">
                    @if($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" alt="Foto van {{ $car->make }} {{ $car->model }}" class="w-full h-40 object-cover rounded mb-4">
                    @else
                        <div class="w-full h-40 flex items-center justify-center bg-gray-200 rounded mb-4 text-gray-400">
                            Geen foto
                        </div>
                    @endif
                    <div class="w-full">
                        <div class="font-semibold text-lg mb-1">{{ $car->make }} {{ $car->model }}</div>
                        <div class="text-sm text-gray-600 mb-2">{{ $car->license_plate }}</div>
                        <div class="mb-2">
                            <span class="font-bold text-indigo-700 text-xl">&euro;{{ number_format($car->price, 2, ',', '.') }}</span>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-2">
                            <span class="px-2 py-1 bg-gray-200 rounded text-xs">{{ ucfirst($car->status ?? 'onbekend') }}</span>
                            <span class="px-2 py-1 bg-gray-200 rounded text-xs">Aanbieder: {{ $car->user->name ?? 'Onbekend' }}</span>
                        </div>
                        <a href="{{ route('car.detail', $car->id) }}" class="block mt-2 text-center bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Bekijken</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection