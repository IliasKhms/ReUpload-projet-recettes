@extends('layouts/main')

@section('content')
    <div>
        <span><small class="has-text-grey-dark">{{ $recipe->updated_at->format('d M Y H:i') }}</small></span>
        <h2 class="mt-2 mb-2 is-size-3 is-size-4-mobile has-text-weight-bold"><a href="/recettes/{{ $recipe->url }}"
                style="color : black">{{ $recipe->title }}</a></h2>
        <p><strong> {{ $recipe->user->name }} </strong></p>
        <br>
        <label for="nb_persons">Nombre de personnes :</label>
        <br>
        <input type="number" name="nb_persons" id="nb_persons" min="1" max="20" value="2" readonly>
        <button type="button" id="decrement">-</button>
        <button type="button" id="increment">+</button>
        <p>
            <br>

            @foreach ($recipe->ingredients as $ingredient)
                <span id="ingredient_{{ $loop->index }}">
                    {{ $ingredient->ingredients }} : <span class="ingredient-quantity" data-original-quantity="{{ $ingredient->quantitee }}">{{ $ingredient->quantitee*2 }}</span> {{ $ingredient->type }} <br>
                </span>
            @endforeach
            <br>
        </p>
        <p class="subtitle has-text-grey">{{ $recipe->content }}</p>
    </div>

    <script>
        // Mettre à jour les quantités d'ingrédients lorsque le nombre de personnes change
        document.getElementById('increment').addEventListener('click', function() {
            document.getElementById('nb_persons').stepUp();
            updateIngredientQuantities();
        });

        document.getElementById('decrement').addEventListener('click', function() {
            document.getElementById('nb_persons').stepDown();
            updateIngredientQuantities();
        });

        function updateIngredientQuantities() {
            var nbPersons = parseInt(document.getElementById('nb_persons').value);
            var ingredientQuantities = document.querySelectorAll('.ingredient-quantity');
            ingredientQuantities.forEach(function(ingredientQuantity) {
                var originalQuantity = parseFloat(ingredientQuantity.getAttribute('data-original-quantity'));
                ingredientQuantity.textContent = originalQuantity * nbPersons;
            });
        }
    </script>
@endsection
