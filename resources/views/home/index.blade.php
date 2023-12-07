@extends('layouts.app')
@include('partials._navbar')
@section('content')
    <div class="container mt-5">
        <h1>Recipes</h1>

        <ul class="list-group">
            @forelse($recipes as $recipe)
                <li class="list-group-item">
                    <strong>{{ $recipe->name }}</strong>
                </li>
            @empty
                <li class="list-group-item">
                    <p class="mb-0">No recipes found.</p>
                </li>
            @endforelse
        </ul>
    </div>
@endsection
