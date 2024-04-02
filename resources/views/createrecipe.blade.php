@extends('layouts/main')

@section('content')
<form action="{{ route('adminrecipes.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Nom</label>
        <input type="text" id="title" name="title" value="">

        <label for="ingredients">Ingrédients</label>
        <input type="text" id="ingredients" name="ingredients" value="">

        <label for="content">Préparation</label>
        <input type="text" id="content" name="content" value="">
    </div>
    <button type="submit">Créer recette</button>
</form>
@endsection