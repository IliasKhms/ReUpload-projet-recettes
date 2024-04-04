@extends('layouts/main')

@section('content')
    <div>
        <span><small class="has-text-grey-dark">{{ $recipe->updated_at->format('d M Y H:i') }}</small></span>
        <h2 class="mt-2 mb-2 is-size-3 is-size-4-mobile has-text-weight-bold"><a href="/recettes/{{ $recipe->url }}"
                style="color : black">{{ $recipe->title }}</a></h2>
        <p><strong> {{ $recipe->user->name }} </strong></p>
        <p> {{ $recipe->ingredients }}</p>
        <p class="subtitle has-text-grey">{{ $recipe->content }}</p>
    </div>

    <div class="star_rating">
        <span class="fas fa-star star" data-star="1" data-recipe-id="{{ $recipe->id }}"></span>
        <span class="fas fa-star star" data-star="2" data-recipe-id="{{ $recipe->id }}"></span>
        <span class="fas fa-star star" data-star="3" data-recipe-id="{{ $recipe->id }}"></span>
        <span class="fas fa-star star" data-star="4" data-recipe-id="{{ $recipe->id }}"></span>
        <span class="fas fa-star star" data-star="5" data-recipe-id="{{ $recipe->id }}"></span>
        &nbsp; note: <span id="note">-</span>
        <span > étoiles</span> 
    </div> 
       
@endsection


