@extends('layouts.app')

@section('content')
<div>
    <h2>Recipe Management</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @forelse($recipes as $recipe)
            <li>
                <strong>{{ $recipe->name }}</strong>
                - <a href="{{ route('recipes.show', $recipe) }}">View</a>
                - <a href="{{ route('recipes.edit', $recipe) }}">Edit</a>
                -
                <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this recipe?')">Delete</button>
                </form>
            </li>
        @empty
            <p>No recipes found.</p>
        @endforelse
    </ul>

    <a href="{{ route('recipes.create') }}">Create Recipe</a>
</div>
@endsection