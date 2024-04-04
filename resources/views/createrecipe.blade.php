@extends('layouts/main')

@section('content')
<form action="{{ route('adminrecipes.store') }}" method="POST" class="form">
    @csrf
    <div class="form-group">
        <label for="title">Nom</label>
        <input type="text" id="title" name="title" value="" required>

        <div id="ingredients-container">

            <div class="ingredient">
                <br> <br>
                <label>Nom de l'ingrédient:</label>
                <input type="text" name="ingredient_name[]" required>
                <label>Quantité (par personne):</label>
                <input type="number" name="ingredient_quantity[]" required>
                <label>Type (gramme, cuillère, etc.):</label>
                <input type="text" name="ingredient_type[]" required>

                <button type="button" class="remove-ingredient" style="margin-left: auto; margin-right: auto; display: block;">Supprimer</button>
            </div>
        </div>
        <br>
        <button type="button" id="add-ingredient" style="margin-left: auto; margin-right: auto; display: block;">Ajouter un ingrédient</button>
        <br>
        <label for="content">Préparation</label>
        <textarea type="text" name="content" id="content" placeholder="" required></textarea>

    </div>
    <input type="submit" class="btn" value="Créer recette"></input>
</form>

<script>
    document.getElementById('add-ingredient').addEventListener('click', function() {
        // Cloner le champ d'ingrédient initial
        var ingredient = document.querySelector('.ingredient').cloneNode(true);

        // Effacer les valeurs des champs clonés
        ingredient.querySelectorAll('input').forEach(function(input) {
            input.value = '';
        });

        // Ajouter le nouveau champ d'ingrédient à la fin du conteneur
        document.getElementById('ingredients-container').appendChild(ingredient);
    });

    // Suppression d'un ingrédient
    document.getElementById('ingredients-container').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-ingredient')) {
            if (document.querySelectorAll('.ingredient').length > 1) {
                event.target.closest('.ingredient').remove();
            }
        }
    });
</script>
@endsection
