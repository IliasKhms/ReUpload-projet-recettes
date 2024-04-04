<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Recipe;
use Illuminate\Support\Facades\Log;

    class RatingController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
        Log::info('Données reçues dans la requête POST :', $request->all());
        $request->validate([
            'recipe_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // TODO: if user authentication and a user is logged in
        //$userId = auth()->user()->id;

        // Update or create the rating
        Rating::create(
            ['recipe_id' => $request->recipe_id, 'rating' => $request->rating], 
        );

        // Calculer la nouvelle moyenne des notes pour la recette et la mettre dans la table recipes
        $recipe = Recipe::find($request->recipe_id);
        $ratings = Rating::where('recipe_id', $request->recipe_id)->get();
        $averageRating = $ratings->avg('rating');
        
        // Mettre à jour la recette avec la nouvelle moyenne des notes
        $recipe->rate_avg = $averageRating;
        $recipe->save();


        return redirect()->back()->with('success', 'Note ajoutée avec succès.');
}

}
?>

