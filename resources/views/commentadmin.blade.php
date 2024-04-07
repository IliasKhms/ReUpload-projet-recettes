@extends('layouts/main')
@section('content')
<div class="columns is-multiline">
    @foreach ($comments as $comment)
        <div class="column is-4 mb-5">
            <span><small class="has-text-grey-dark">{{ $comment->created_at->format('d M Y H:i') }}</small></span>
            <h2 class="mt-2 mb-2 is-size-3 is-size-4-mobile has-text-weight-bold">
            de :
            {{ $comment->pseudo }}</h2>
        <div>
            <p>{{ $comment->content }}</p>
            <p><strong>Recette :</strong> {{ $comment->recipe_id }}</p>
                  
            <form method="POST" action="{{ route('comment.destroy', $comment->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </div>
        </div>
    @endforeach
</div>
@endsection