@extends('layouts/main')

@section('content')
<form action="{{ route('admin.recipes.update', $recipe->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        
    <label for="title">Nom</label>
        <input type="text" id="title" name="title" value="{{ old('title', $recipe->title) }}">

    <label for="ingredients">Ingrédients</label>
        <input type="text" id="ingredients" name="ingredients" value="{{ old('ingredients', $recipe->ingredients) }}">
    
    <label for="content">Préparation</label>
        <input type="text" id="content" name="content" value="{{ old('content', $recipe->content) }}">

    </div>
    <button type="submit">Mettre à jour</button>
</form>
@endsection



















