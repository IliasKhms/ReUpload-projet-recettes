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

        return response()->json(['message' => 'Mise à jour reussie du classement']);
    }
}
?>

