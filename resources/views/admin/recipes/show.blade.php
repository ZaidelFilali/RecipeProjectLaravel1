@extends('layouts.app')

@include('partials._navbar')

@section('content')
    <div class="container mt-5">
        <h1>{{ $recipe->name }}</h1>
        <p class="card-text"><strong>Picture:</strong> <img src="{{ asset('storage/images/' . $recipe->picture) }}" alt="Recipe Picture"></p>

        <div class="card mb-3">
            <div class="card-body">
                <p class="card-text"><strong>Description:</strong> {{ $recipe->description }}</p>
                <p class="card-text"><strong>Minutes:</strong> {{ $recipe->minutes }}</p>
                <p class="card-text"><strong>Instructions:</strong> {{ $recipe->instructions }}</p>
                <p class="card-text"><strong>Nutrition Values:</strong> {{ $recipe->nutrition_values }}</p>
                <p class="card-text"><strong>Picture:</strong></p>
                
            </div>
        </div>

        <h2>Ingredients</h2>
        @if(count($ingredients) > 0)
            <ul>
                @foreach($ingredients as $ingredient)
                    <li>{{ $ingredient->name }} - {{ $ingredient->quantity }} {{ $ingredient->units }}</li>
                @endforeach
            </ul>
        @else
            <p>No ingredients found.</p>
        @endif

        <h2>Nutrition</h2>

        @if(!is_null($nutritions) && count($nutritions) > 0)
            <ul>
                @foreach($nutritions as $nutrition)
                    <li>{{ $nutrition->name }} - {{ $nutrition->quantity }} {{ $nutrition->units }}</li>
                @endforeach
            </ul>
        @else
            <p>No nutrition information available.</p>
        @endif
        

        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Recipes</a>
    </div>
@endsection
