<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\Recipe;  

class CommentaireController extends Controller
{
    public function store(Request $request,Recipe $recipe)
    {

        //dd(request()->all());
       // Validation du formulaire
    $request->validate([
        'pseudo' => 'required',
        'content' => 'required',
        'recipe_id' => 'required|exists:recipes,id',
        'g-recaptcha-response' => 'required',
    ]);

    $pseudo = $request->input('pseudo');
    $content = $request->input('content');

    // Vérification de la réponse reCAPTCHA
    $recaptchaResponse = $request->input('g-recaptcha-response');
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfUGrIpAAAAADQjtc11ZLJElCihqv92J0fUpUtV&response=".$recaptchaResponse);
    $response = json_decode($response);

    if (!$response->success) {
        return back()->withErrors(['captcha' => 'Erreur de reCAPTCHA. Veuillez réessayer.']);
    }

    // Enregistrement du commentaire dans la base de données
    $commentaire = new Commentaire;
    $commentaire->pseudo = $pseudo;
    $commentaire->content = $content;
    $commentaire->recipe_id = $recipe->id;
    $commentaire->save();

    // Redirection de l'utilisateur avec un message de succès
    return back()->with('success', 'Votre commentaire a bien été ajouté');
    }

}
