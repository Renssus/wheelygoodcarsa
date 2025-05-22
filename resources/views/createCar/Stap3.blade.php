@extends('layouts.layout')

@section('title', 'Stap 3 - Upload foto van de auto')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    {{-- Progressbar --}}
    <div class="flex items-center mb-8">
        {{-- Stap 1 --}}
        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold z-10">1</div>
        <div class="flex-1 h-1 bg-gray-300"></div>
        {{-- Stap 2 --}}
        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold z-10">2</div>
        <div class="flex-1 h-1 bg-gray-300"></div>
        {{-- Stap 3 --}}
        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-yellow-400 text-black font-bold z-10">3</div>
    </div>

    <h1 class="text-2xl font-bold mb-6 text-center">Upload een foto van je auto</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Toon alvast ingevulde velden uit sessie --}}
    <div class="mb-6">
        <p><span class="font-semibold">Kenteken:</span> {{ session('carData.license_plate') }}</p>
        <p><span class="font-semibold">Merk:</span> {{ session('carData.merk') }}</p>
        <p><span class="font-semibold">Type:</span> {{ session('carData.handelsbenaming') }}</p>
        <p><span class="font-semibold">Bouwjaar:</span> {{ session('carData.datum_eerste_toelating') ? \Illuminate\Support\Carbon::parse(session('carData.datum_eerste_toelating'))->year : '-' }}</p>
        <p><span class="font-semibold">Prijs:</span> €{{ number_format(session('carData.prijs'), 2, ',', '.') }}</p>
        <p><span class="font-semibold">Kilometerstand:</span> {{ number_format(session('carData.kilometerstand'), 0, ',', '.') }} km</p>
        <p><span class="font-semibold">Brandstof:</span> {{ session('carData.brandstof') }}</p>
        <p><span class="font-semibold">Kleur:</span> {{ session('carData.color') }}</p>
        <p><span class="font-semibold">Aantal zitplaatsen:</span> {{ session('carData.seats') }}</p>
    </div>

    <form action="{{ route('cars.postStep3') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="image" class="block font-semibold mb-2">Foto van je auto</label>
            <input type="file" id="image" name="image" accept="image/*" required
                   class="block w-full text-sm text-gray-600
                          file:mr-4 file:py-2 file:px-4
                          file:rounded file:border-0
                          file:text-sm file:font-semibold
                          file:bg-yellow-400 file:text-black
                          hover:file:bg-yellow-500" />
        </div>

        {{-- Preview --}}
        <div class="mb-4">
            <img id="preview" src="" alt="Preview auto foto" class="hidden w-full rounded-lg shadow-md" />
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('cars.step2') }}" class="text-indigo-600 hover:underline">Terug</a>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Voltooien</button>
        </div>
    </form>
</div>

{{-- JavaScript voor preview function --}}
@push('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        }
    });
</script>
@endpush
@endsection
