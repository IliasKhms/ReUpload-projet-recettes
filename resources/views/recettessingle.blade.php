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

    <div class="star_rating">
    <br></br>
    <form action="/recettes/{{ $recipe->url }}" method="post">
        @csrf
        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
        <input type="hidden" name="rating" id="rating">

        <span class="fas fa-star star" data-star="1" data-recipe-id="{{ $recipe->id }}"></span>
        <span class="fas fa-star star" data-star="2" data-recipe-id="{{ $recipe->id }}"></span>
        <span class="fas fa-star star" data-star="3" data-recipe-id="{{ $recipe->id }}"></span>
        <span class="fas fa-star star" data-star="4" data-recipe-id="{{ $recipe->id }}"></span>
        <span class="fas fa-star star" data-star="5" data-recipe-id="{{ $recipe->id }}"></span>
        &nbsp; note: <span id="note">-</span>
        <span > étoile(s)</span> 
        <button type="submit">Valider</button>
    </form>
    <br></br>
        <p> Note : {{ number_format($recipe->rate_avg, 1) }}/5 </p>
    <br></br>
    </div> 
       
    @if (session('success'))
        <div class="notification is-success">
            {{ session('success') }}
        </div>
    @endif
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

    <br>
    <h2 class="is-size-4">Commentaires</h2>
    <br>
    @foreach ($comments as $comment)
    @if ($comment->recipe_id == $recipe->id)
        <div class="box">
            <p><strong>{{ $comment->pseudo }}</strong></p>
            <p>{{ $comment->content }}</p>
            @if ($comment->created_at) <!-- Vérifie si la date de création est non nulle -->
                <p><small class="has-text-grey-dark">{{ $comment->created_at->format('d M Y H:i') }}</small></p>
            @endif
        </div>
    @endif
@endforeach
    <br>
    <form action="{{ route('comment.store', ['recipe' => $recipe->id]) }}" method="post">
        @csrf
        <input class= "input" type="hidden" name="recipe_id" value="{{ $recipe->id }}">
        <div class="field">
            <label class="label">Pseudo</label>
            <div class="control">
                <input class="input" type="text" name="pseudo" placeholder="Votre pseudo">
            </div>
        </div>
        <div class="field">
            <label class="label">Commentaire</label>
            <div class="control">
                <textarea class="textarea" name="content" placeholder="Votre commentaire"></textarea>
            </div>
        </div>
        <div class="field">
        <div class="g-recaptcha" data-sitekey="6LfUGrIpAAAAAFpiMcHr7eJpumWQFL3NzKU8xQeW"></div>
            <div class="control">
                <button class="button is-link">Envoyer</button>
            </div>
        </div>
    </form>
    


@endsection


