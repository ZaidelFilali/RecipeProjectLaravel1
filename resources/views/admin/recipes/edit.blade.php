<!-- resources/views/recipes/edit.blade.php -->
@extends('layouts.app') 
@include('partials._navbar')
@section('content')
    <div class="container mt-5">
        <h1>Edit Recipe - {{ $recipe->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('recipes.update', $recipe) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $recipe->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" required>{{ old('description', $recipe->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="minutes">Minutes:</label>
                <input type="number" class="form-control" name="minutes" value="{{ old('minutes', $recipe->minutes) }}" required>
            </div>

            <div class="form-group">
                <label for="instructions">Instructions:</label>
                <textarea class="form-control" name="instructions" required>{{ old('instructions', $recipe->instructions) }}</textarea>
            </div>

            <div class="form-group">
                <label for="nutrition_values">Nutrition Values:</label>
                <input type="text" class="form-control" name="nutrition_values" value="{{ old('nutrition_values', $recipe->nutrition_values) }}" required>
            </div>

            <div class="form-group">
                <label for="picture">Picture:</label>
                <input type="text" class="form-control" name="picture" value="{{ old('picture', $recipe->picture) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Recipe</button>
        </form>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Back to Recipes</a>
    </div>
@endsection
