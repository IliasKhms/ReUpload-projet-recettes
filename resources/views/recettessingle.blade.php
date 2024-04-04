@extends('layouts/main')

@section('content')
    <div>
        <span><small class="has-text-grey-dark">{{ $recipe->updated_at->format('d M Y H:i') }}</small></span>
        <h2 class="mt-2 mb-2 is-size-3 is-size-4-mobile has-text-weight-bold"><a href="/recettes/{{ $recipe->url }}"
                style="color : black">{{ $recipe->title }}</a></h2>
        <p><strong> {{ $recipe->user->name }} </strong></p>
        <p>
            <br>
            @foreach ($recipe->ingredients as $ingredient)
                {{ $ingredient->ingredients }} : {{ $ingredient->quantitee }} {{ $ingredient->type }} <br> @if (!$loop->last)@endif
            @endforeach
            <br>
        </p>
        <p class="subtitle has-text-grey">{{ $recipe->content }}</p>
    </div>
@endsection
