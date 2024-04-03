@extends('layouts/main')

@section('content')
<form action="{{ route('adminrecipes.store') }}" method="POST" class="form">
    @csrf
    <div class="form-group">
        <label for="title">Nom</label>
        <input type="text" id="title" name="title" value="">

        <label for="ingredients">Ingrédients</label>
        <input type="text" id="ingredients" name="ingredients" value="Ingredient1, Ingredient2, Ingredient3">

        <label for="content">Préparation</label>
        <textarea type="text" name="content" id="content" placeholder=""></textarea>

    </div>
    <input type="submit" class="btn"value ="Créer recette"></input>
</form>
@endsection
