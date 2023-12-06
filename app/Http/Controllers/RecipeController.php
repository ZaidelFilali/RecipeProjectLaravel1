<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Nutrition;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('admin.dashboard', compact('recipes'));
    }

    public function create()
    {
        return view('admin.recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'minutes' => 'required|integer',
            'instructions' => 'required|string',
            'nutrition_values' => 'required|string',
            'picture' => 'required|string',
            'ingredients' => 'required|array|min:1',
            'ingredients.*.name' => 'required|string|max:255',
            'ingredients.*.quantity' => 'required|numeric',
            'ingredients.*.units' => 'required|string|max:255',
            'nutritions' => 'array',  
            'nutritions.*.name' => 'required|string|max:255',  
            'nutritions.*.quantity' => 'required|numeric', 
            'nutritions.*.units' => 'required|string|max:255',  
        ]);

        $recipe = Recipe::create($request->only([
            'name', 'description', 'minutes', 'instructions', 'nutrition_values', 'picture'
        ]));
    
        foreach ($request->input('ingredients') as $ingredientData) {
            $ingredient = new Ingredient($ingredientData);
            $recipe->ingredients()->save($ingredient);
        }
    
        foreach ($request->input('nutritions') as $nutritionData) {
            $nutrition = new Nutrition($nutritionData);
            $recipe->nutritions()->save($nutrition);
        }
    
        return redirect()->route('admin.dashboard')->with('success', 'Recipe created successfully.');
    }

    public function show(Recipe $recipe)
    {
        $ingredients = Ingredient::where('recipe_id', $recipe->id)->get();
        $nutritions = Nutrition::where('recipe_id', $recipe->id)->get();
        return view('admin.recipes.show', compact('recipe', 'ingredients', 'nutritions'));
    }

    public function edit(Recipe $recipe)
    {
        return view('admin.recipes.edit', compact('recipe'));
    }
    

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'minutes' => 'required|integer',
            'instructions' => 'required|string',
            'nutrition_values' => 'required|string',
            'picture' => 'required|string',
            'ingredients' => 'array', 
        ]);
    
        $recipe->update($request->only(['name', 'description', 'minutes', 'instructions', 'nutrition_values', 'picture']));
    
        if ($request->has('ingredients') && is_array($request->input('ingredients'))) {
            foreach ($request->input('ingredients') as $ingredientId => $ingredientData) {
                $ingredient = Ingredient::findOrFail($ingredientId);
                $ingredient->update($ingredientData);
            }
        }
    
        return redirect()->route('admin.dashboard')->with('success', 'Recipe updated successfully.');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->ingredients()->delete();

        $recipe->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Recipe deleted successfully.');
    }

    public function welcome()
    {
    $featuredRecipes = Recipe::limit(3)->get(); 
    return view('home.welcome', compact('featuredRecipes'));
    }
}
