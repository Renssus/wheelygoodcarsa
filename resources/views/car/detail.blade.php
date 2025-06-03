
@extends('layouts.layout')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100 py-8">
    <div class="w-full max-w-xl bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Auto Details</h1>
        <a href="{{ route('cars.index') }}" class="inline-block mb-4 text-indigo-600 hover:underline">&larr; Terug naar overzicht</a>
        <div class="card">
            @if($car->image)
                <img src="{{ asset('storage/' . $car->image) }}" class="w-full h-64 object-cover rounded mb-6" alt="Car Image">
            @else
                <div class="w-full h-64 flex items-center justify-center bg-gray-200 rounded mb-6 text-gray-400">
                    Geen foto
                </div>
            @endif
            <div class="card-body">
                <h2 class="text-2xl font-semibold mb-2 text-center">{{ $car->make }} {{ $car->model }}</h2>
                <h3 class="text-lg text-gray-500 mb-4 text-center">{{ $car->brand }}</h3>
                <div class="grid grid-cols-2 gap-x-4 gap-y-2 mb-4">
                    <div><strong>Kenteken:</strong></div><div>{{ $car->license_plate }}</div>
                    <div><strong>Prijs:</strong></div><div>&euro;{{ number_format($car->price, 2, ',', '.') }}</div>
                    <div><strong>Kilometerstand:</strong></div><div>{{ $car->mileage }} km</div>
                    <div><strong>Zitplaatsen:</strong></div><div>{{ $car->seats }}</div>
                    <div><strong>Deuren:</strong></div><div>{{ $car->doors }}</div>
                    <div><strong>Bouwjaar:</strong></div><div>{{ $car->production_year }}</div>
                    <div><strong>Gewicht:</strong></div><div>{{ $car->weight }} kg</div>
                    <div><strong>Kleur:</strong></div><div>{{ $car->color }}</div>
                    <div><strong>Status:</strong></div>
                    <div>
                        <span class="px-2 py-1 bg-gray-200 rounded text-xs">{{ ucfirst($car->status ?? 'onbekend') }}</span>
                    </div>
                    <div><strong>Verkocht op:</strong></div><div>{{ $car->sold_at ?? '-' }}</div>
                    <div><strong>Aanbieder:</strong></div>
                    <div>
                        {{ $car->user->name }}
                        @if($car->user->isSuspicious())
                            <span class="text-yellow-500 ml-1" title="Verdachte aanbieder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                                </svg>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection