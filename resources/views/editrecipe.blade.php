@extends('layouts/main')

@section('content')
<form action="{{ route('adminrecipes.update', $recipe->id) }}" method="POST" class="form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Nom</label>
        <input type="text" id="title" name="title" value="{{ old('title', $recipe->title) }}" required>

        <div id="ingredients-container">
            @foreach ($recipe->ingredients as $index => $ingredient)
            <div class="ingredient">
                <br> <br>
                <label>Nom de l'ingrédient:</label>
                <input type="text" name="ingredient_name[]" value="{{ old('ingredient_name.' . $index, $ingredient->ingredients) }}" required>
                <label>Quantité (par personne):</label>
                <input type="number" name="ingredient_quantity[]" value="{{ old('ingredient_quantity.' . $index, $ingredient->quantitee) }}" required>
                <label>Type (gramme, cuillère, etc.):</label>
                <input type="text" name="ingredient_type[]" value="{{ old('ingredient_type.' . $index, $ingredient->type) }}" required>
                <button type="button" class="remove-ingredient" style="margin-left: auto; margin-right: auto; display: block;">Supprimer</button>
            </div>
            @endforeach
        </div>
        <br>
        <button type="button" id="add-ingredient" style="margin-left: auto; margin-right: auto; display: block;">Ajouter un ingrédient</button>
        <br>
        <label for="content">Préparation</label>
        <textarea type="text" name="content" id="content" required>{{ old('content', $recipe->content) }}</textarea>

    </div>
    <label for="image">Ajoutez une image</label>
        <input type="file" id="image" name="image" accept="image/*">
    <input type="submit" class="btn" value="Mettre à jour"></input>
</form>

<script>
    // JavaScript pour ajouter et supprimer des champs d'ingrédients dynamiquement
    document.getElementById('add-ingredient').addEventListener('click', function() {
        var ingredient = document.querySelector('.ingredient').cloneNode(true);
        ingredient.querySelectorAll('input').forEach(function(input) {
            input.value = '';
        });
        document.getElementById('ingredients-container').appendChild(ingredient);
    });

    document.getElementById('ingredients-container').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-ingredient')) {
            if (document.querySelectorAll('.ingredient').length > 1) { // Vérifier s'il y a plus d'un ingrédient avant de permettre la suppression
                event.target.closest('.ingredient').remove();
            }
        }
    });
</script>
@endsection
