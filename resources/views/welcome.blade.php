@extends('layouts/main')

@section('content')

  {{-- Affichage des 3 dernières recettes --}}
  <div class="columns is-multiline">
    @foreach($recipes->take(3) as $recipe)
      <div class="column is-4 mb-5">
        <span><small class="has-text-grey-dark">{{ $recipe->updated_at->format('d M Y H:i') }}</small></span>
        <h2 class="mt-2 mb-2 is-size-3 is-size-4-mobile has-text-weight-bold"><a href="/recettes/{{ $recipe->url }}" style="color : black">{{ $recipe->title }}</a></h2>
        <p><strong> {{ $recipe->user->name }} </strong></p>
        <p> {{ $recipe->ingredients }}</p>
        <p class="subtitle has-text-grey">{{ $recipe->content }}</p>
        <a href="/recettes/{{ $recipe->url }}">Read More</a>
      </div>
    @endforeach
  </div>

@endsection
