@extends('layouts/main')

@section('content')
<form action="{{ route('adminrecipes.update', $recipe->id) }}" method="POST" class="form">
    @csrf
    @method('PUT')
    <div class="form-group">
        
    <label for="title">Nom</label>
        <input type="text" id="title" name="title" value="{{ old('title', $recipe->title) }}">

    <label for="ingredients">Ingrédients</label>
        <input type="text" id="ingredients" name="ingredients" value="{{ old('ingredients', $recipe->ingredients) }}">
    
    <label for="content">Préparation</label>
        <textarea  type="text" id="content" name="content" value="{{ old('content', $recipe->content) }}"></textarea>

    </div>
    <input type="submit" class="btn"value ="Mettre à jour"></input>
</form>
@endsection



















