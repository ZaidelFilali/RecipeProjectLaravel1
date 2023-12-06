<!-- resources/views/home/welcome.blade.php -->
@extends('layouts.app')
@include('partials._navbar')
@section('content')
    <div class="container mt-5">
        <h1>Welcome to the Recipe App</h1>

        <h2>Featured Recipes</h2>
        <ul class="list-group">
            @forelse($featuredRecipes as $recipe)
                <li class="list-group-item">
                    <strong>{{ $recipe->name }}</strong>
                </li>
            @empty
                <li class="list-group-item">
                    <p class="mb-0">No featured recipes found.</p>
                </li>
            @endforelse
        </ul>

        <a href="{{ route('home.index') }}" class="btn btn-primary mt-3">View All Recipes</a>
    </div>
@endsection
