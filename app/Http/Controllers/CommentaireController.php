<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\Recipe;  

class CommentaireController extends Controller
{
    public function store(Request $request,Recipe $recipe)
    {
        // Validation du formulaire
        $request->validate([
            'pseudo' => 'required',
            'content' => 'required',
            'recipe_id' => 'required|exists:recipes,id'
        ]);

        $pseudo = $request->input('pseudo');
        $content = $request->input('content');
        $recipeId = $request->input('recipe_id'); // Assurez-vous que le nom du champ dans le formulaire est correct
    
        // Enregistrement du commentaire dans la base de données
        $commentaire = new Commentaire;
        $commentaire->pseudo = $pseudo;
        $commentaire->content = $content;
        $commentaire->recipe_id = $recipeId;
        $commentaire->save();
    
        // Redirection de l'utilisateur avec un message de succès
        return back()->with('success', 'Votre commentaire a bien été ajouté');
    }

}
