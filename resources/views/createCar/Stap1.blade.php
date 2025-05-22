@extends('layouts.layout')

@section('title', 'Stap 1 - Voer kenteken in')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">

        {{-- Progressbar --}}
<div class="flex items-center mb-8">
    {{-- Stap 1 --}}
    <div class="w-8 h-8 flex items-center justify-center rounded-full bg-yellow-400 text-black font-bold z-10">1</div>

    {{-- Lijntje 1 --}}
    <div class="flex-1 h-1 bg-gray-300"></div>

    {{-- Stap 2 --}}
    <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold z-10">2</div>

    {{-- Lijntje 2 --}}
    <div class="flex-1 h-1 bg-gray-300"></div>

    {{-- Stap 3 --}}
    <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold z-10">3</div>
</div>

        <h1 class="text-2xl font-bold mb-6 text-center">Voer het kenteken in</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cars.postStep1') }}" method="POST">
            @csrf

            <label for="license_plate" class="block mb-2 font-semibold text-gray-700">Kenteken</label>

            <div class="w-48 mx-auto">
                <input id="license_plate" name="license_plate" type="text" maxlength="8" autocomplete="off" autofocus
                    value="{{ old('license_plate') }}" placeholder="BV-12-XY"
                    class="w-full text-black font-bold text-3xl text-center rounded-md border-2 border-yellow-400 bg-yellow-400 shadow-inner tracking-widest"
                    style="letter-spacing: 0.25em; font-family: 'DIN 1451 Engschrift', Arial, sans-serif;" />
            </div>

            <p class="text-center text-sm text-gray-600 mt-1">
                Voer het kenteken in zonder spaties of streepjes
            </p>

            <button type="submit"
                class="w-full py-3 mt-6 bg-yellow-400 hover:bg-yellow-500 text-black font-bold rounded shadow transition">
                Controleer kenteken
            </button>
        </form>
    </div>
@endsection