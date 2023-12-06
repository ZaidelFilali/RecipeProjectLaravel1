@extends('layouts.app') 
@include('partials._navbar')
@section('content')
    <div class="container mt-5">
        <h1>{{ $recipe->name }}</h1>

        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text"><strong>Description:</strong> {{ $recipe->description }}</p>
                <p class="card-text"><strong>Minutes:</strong> {{ $recipe->minutes }}</p>
                <p class="card-text"><strong>Instructions:</strong> {{ $recipe->instructions }}</p>
                <p class="card-text"><strong>Nutrition Values:</strong> {{ $recipe->nutrition_values }}</p>
                <p class="card-text"><strong>Picture:</strong> {{ $recipe->picture }}</p>
            </div>
        </div>
        <h2>Ingredients</h2>
        <ul>
            @forelse($ingredients as $ingredient)
                <li>{{ $ingredient->name }} - {{ $ingredient->quantity }} {{ $ingredient->units }}</li>
            @empty
                <li>No ingredients found.</li>
            @endforelse
        </ul>
        
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Recipes</a>
    </div>
@endsection
