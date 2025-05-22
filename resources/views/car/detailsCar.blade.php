@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Car Details</h1>
    <a href="{{ route('cars.index') }}" class="btn btn-primary mb-3">Back</a>
    <div class="card">
        @if($car->image)
            <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="Car Image">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $car->make }} {{ $car->model }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $car->brand }}</h6>
            <p class="card-text">
                <strong>License Plate:</strong> {{ $car->license_plate }}<br>
                <strong>Price:</strong> ${{ $car->price }}<br>
                <strong>Mileage:</strong> {{ $car->mileage }} km<br>
                <strong>Seats:</strong> {{ $car->seats }}<br>
                <strong>Doors:</strong> {{ $car->doors }}<br>
                <strong>Production Year:</strong> {{ $car->production_year }}<br>
                <strong>Weight:</strong> {{ $car->weight }} kg<br>
                <strong>Color:</strong> {{ $car->color }}<br>
                <strong>Seller:</strong> {{ $car->user->name }}<br>
                @if($car->user->isSuspicious())
                    <span class="text-warning" title="Suspicious Seller">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                        </svg>
                    </span>
                @endif
                <strong>Sold At:</strong> {{ $car->sold_at }}
            </p>
        </div>
    </div>
</div>
@endsection


<style>
    .card-img-top {
        max-width: 100%;
        height: auto;
        max-height: 400px;
        object-fit: cover;
    }
</style>
