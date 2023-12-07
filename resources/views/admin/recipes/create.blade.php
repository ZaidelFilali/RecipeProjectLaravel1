@extends('layouts.app') 
@include('partials._navbar')
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

        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Spaghetti Bolognese" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" placeholder="Classic Spaghetti Bolognese recipe with a rich tomato sauce." required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="minutes">Minutes:</label>
                <input type="number" class="form-control" name="minutes" value="{{ old('minutes') }}" placeholder="30" required>
            </div>

            <div class="form-group">
                <label for="instructions">Instructions:</label>
                <textarea class="form-control" name="instructions" placeholder="1. Cook pasta. 2. Prepare Bolognese sauce. 3. Combine and serve." required>{{ old('instructions') }}</textarea>
            </div>

            <div class="form-group">
                <label for="nutrition_values">Nutrition Values:</label>
                <input type="text" class="form-control" name="nutrition_values" value="{{ old('nutrition_values') }}" placeholder="Calories: 500, Carbs: 60g, Protein: 25g, Fat: 20g" required>
            </div>

            <div class="form-group">
                <label for="picture">Picture:</label>
                <input type="file" class="form-control" name="picture" accept="image/*">
            </div>
            
            <h2>Ingredients</h2>

            <div id="ingredientFields">
            <div class="form-group" data-ingredient-index="0">
                <label for="ingredient_name[]">Ingredient Name:</label>
                <input type="text" class="form-control" name="ingredients[0][name]" placeholder="Spaghetti" required>
            </div>

            <div class="form-group">
                <label for="ingredient_quantity[]">Ingredient Quantity:</label>
                <input type="number" class="form-control" name="ingredients[0][quantity]" placeholder="300" required>
            </div>

            <div class="form-group">
                <label for="ingredient_units[]">Ingredient Units:</label>
                <input type="text" class="form-control" name="ingredients[0][units]" placeholder="grams" required>
            </div>

            <h2>Nutritions</h2>

            <div class="form-group">
                <label for="nutrition_name">Nutrition Name:</label>
                <input type="text" class="form-control" name="nutritions[0][name]" placeholder="Calories" required>
            </div>
        
            <div class="form-group">
                <label for="nutrition_quantity">Nutrition Quantity:</label>
                <input type="number" class="form-control" name="nutritions[0][quantity]" placeholder="500" required>
            </div>
        
            <div class="form-group">
                <label for="nutrition_units">Nutrition Units:</label>
                <input type="text" class="form-control" name="nutritions[0][units]" placeholder="kcal" required>
            </div>
        </div>

        <button type="button" class="btn btn-success" id="addNutrition">Add Nutrition</button>

        <button type="button" class="btn btn-success" id="addIngredient">Add Ingredient</button>

        <button type="submit" class="btn btn-primary">Create Recipe</button>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Back to Recipes</a>
    </div>

    <script>
        document.getElementById('addIngredient').addEventListener('click', function () {
            var ingredientFields = document.getElementById('ingredientFields');
            var lastIndex = ingredientFields.querySelectorAll('.form-group[data-ingredient-index]').length;
    
            var newIngredientField = ingredientFields.firstElementChild.cloneNode(true);
            newIngredientField.setAttribute('data-ingredient-index', lastIndex);
    
            newIngredientField.querySelector('[name="ingredients[0][name]"]').setAttribute('name', 'ingredients[' + lastIndex + '][name]');
            newIngredientField.querySelector('[name="ingredients[0][quantity]"]').setAttribute('name', 'ingredients[' + lastIndex + '][quantity]');
            newIngredientField.querySelector('[name="ingredients[0][units]"]').setAttribute('name', 'ingredients[' + lastIndex + '][units]');
    
            ingredientFields.appendChild(newIngredientField);
        });

        document.getElementById('addNutrition').addEventListener('click', function () {
            var nutritionFields = document.getElementById('nutritionFields');
            var newNutritionField = nutritionFields.cloneNode(true);
            nutritionFields.parentNode.appendChild(newNutritionField);
        });
    </script>
@endsection
