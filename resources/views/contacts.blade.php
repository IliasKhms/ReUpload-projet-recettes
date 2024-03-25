@extends('layouts/main')

@section('content')
    <form action="contact.php" class="form">
        <label for="firstname">
            <input type="text" name="firstname" id="firstname" placeholder="Nom">
        </label>

        <label for="lastname">
            <input type="text" name="lastname" id="lastname" placeholder="Prénom">
        </label>

        <label for="email">
            <input type="email" name="email" id="email" placeholder="Email">
        </label>

        <label for="message">
            <textarea type="text" name="message" id="message" placeholder="Veuillez saisir votre message"></textarea>
        </label>

        <input type="submit" class="btn" value="Envoyer">

    </form>
@endsection
