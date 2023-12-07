@extends('layouts.app') 
@include('partials._navbar')
@section('content')
    <div class="container mt-5">
        <h1>Recipes</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ul class="list-group">
            @forelse($recipes as $recipe)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $recipe->name }}</strong>
                    </div>
                    <div class="btn-group" role="group" aria-label="Recipe Actions">
                        <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-info">View</a>
                        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this recipe?')">Delete</button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="list-group-item">
                    <p class="mb-0">No recipes found.</p>
                </li>
            @endforelse
        </ul>

        <a href="{{ route('recipes.create') }}" class="btn btn-primary mt-3">Create Recipe</a>

        <div class="mt-5">
            <h2>Comments and Favorites (In Progress)</h2>

        </div>
    </div>
@endsection
