<!-- resources/views/recipes/show.blade.php -->
@extends('layouts.app') 
@include('navbar')
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

        <a href="{{ route('recipes.index') }}" class="btn btn-primary">Back to Recipes</a>
    </div>
@endsection
