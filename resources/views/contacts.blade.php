@extends('layouts/main')

@section('content')
    <form  method="POST" action = "/contacts" class="form">
        @csrf
       
        <label for="firstname">
            <input type="text" name="nom" id="nom" placeholder="Nom">
        </label>

        <label for="lastname">
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
        </label>

        <label for="email">
            <input type="email" name="mail" id="mail" placeholder="Mail">
        </label>

        <label for="message">
            <textarea type="text" name="message" id="message" placeholder="Veuillez saisir votre message"></textarea>
        </label>

        <input type="submit" class="btn" value="Envoyer">

    </form>
@endsection
