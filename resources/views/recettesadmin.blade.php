@extends('layouts/main')

@section('content')
<div class="columns is-multiline">
    @foreach($recipes as $recipe)
      <div class="column is-4 mb-5">
        <span><small class="has-text-grey-dark">{{ $recipe->updated_at->format('d M Y H:i') }}</small></span>
        <h2 class="mt-2 mb-2 is-size-3 is-size-4-mobile has-text-weight-bold"><a href="/recettes/{{ $recipe->url }}" style="color : black">{{ $recipe->title }}</a></h2>
        <p><strong> {{ $recipe->user->name }} </strong></p>
        <p> {{ $recipe->ingredients }}</p>
        <p class="subtitle has-text-grey">
            <?php
            $content = $recipe->content;
            $content = strlen($content) > 100 ? substr($content, 0, 100) . "..." : $content;
            echo $content;
            ?>
        </p>
        <input type="submit" class="btn" value="Modifier/Supprimer">
       
      </div>
    @endforeach
  </div>
  <h1>Publier une nouvelle recette</h1>
@endsection