<!-- resources/views/recipes/create.blade.php -->
@extends('layouts.app') 
@include('navbar')
@section('content')
    <div class="container mt-5">
        <h1>Create Recipe</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('recipes.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="minutes">Minutes:</label>
                <input type="number" class="form-control" name="minutes" value="{{ old('minutes') }}" required>
            </div>

            <div class="form-group">
                <label for="instructions">Instructions:</label>
                <textarea class="form-control" name="instructions" required>{{ old('instructions') }}</textarea>
            </div>

            <div class="form-group">
                <label for="nutrition_values">Nutrition Values:</label>
                <input type="text" class="form-control" name="nutrition_values" value="{{ old('nutrition_values') }}" required>
            </div>

            <div class="form-group">
                <label for="picture">Picture:</label>
                <input type="text" class="form-control" name="picture" value="{{ old('picture') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Recipe</button>
        </form>

        <a href="{{ route('recipes.index') }}" class="btn btn-secondary mt-3">Back to Recipes</a>
    </div>
@endsection
