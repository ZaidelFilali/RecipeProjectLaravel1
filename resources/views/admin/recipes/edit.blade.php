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
            <h2>Edit Ingredients</h2>

            @foreach($recipe->ingredients as $ingredient)
                <div class="form-group">
                    <label for="ingredient_name">Ingredient Name:</label>
                    <input type="text" class="form-control" name="ingredients[{{ $ingredient->id }}][name]" value="{{ $ingredient->name }}" required>
                </div>
            
                <div class="form-group">
                    <label for="ingredient_quantity">Ingredient Quantity:</label>
                    <input type="number" class="form-control" name="ingredients[{{ $ingredient->id }}][quantity]" value="{{ $ingredient->quantity }}" required>
                </div>
            
                <div class="form-group">
                    <label for="ingredient_units">Ingredient Units:</label>
                    <input type="text" class="form-control" name="ingredients[{{ $ingredient->id }}][units]" value="{{ $ingredient->units }}" required>
                </div>
            @endforeach
            <h2>Edit Nutritions</h2>

            @foreach($recipe->nutritions as $index => $nutrition)
                <div class="form-group">
                    <label for="nutritions[{{ $index }}][name]">Nutrition Name:</label>
                    <input type="text" class="form-control" name="nutritions[{{ $index }}][name]" value="{{ $nutrition->name }}" required>
                </div>
            
                <div class="form-group">
                    <label for="nutritions[{{ $index }}][quantity]">Nutrition Quantity:</label>
                    <input type="number" class="form-control" name="nutritions[{{ $index }}][quantity]" value="{{ $nutrition->quantity }}" required>
                </div>
            
                <div class="form-group">
                    <label for="nutritions[{{ $index }}][units]">Nutrition Units:</label>
                    <input type="text" class="form-control" name="nutritions[{{ $index }}][units]" value="{{ $nutrition->units }}" required>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Update Recipe</button>
            </form>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Back to Recipes</a>
    </div>
@endsection
