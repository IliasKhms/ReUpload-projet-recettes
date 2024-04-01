@extends('layouts/main')

@section('content')
<form action="/recettes/{{ $recipe->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" value="{{ old('name', $recipe->name) }}">
    </div>
    <!-- Faites de même pour les autres champs... -->
    <button type="submit">Mettre à jour</button>
</form>
@endsection



















