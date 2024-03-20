@extends('layouts/main')

@section('content')
    <form action="contact.php" class="form">
        <label for="firstname">
            <input type="text" name="firstname" id="firstname" placeholder="NOM">
        </label>

        <label for="email">
            <input type="email" name="email" id="email" placeholder="EMAIL">
        </label>

        <label for="password">
            <input type="text" name="password" id="password" placeholder="MOT DE PASSE">
        </label>

        <input type="submit" class="btn" value="Envoyer">

    </form>
@endsection
