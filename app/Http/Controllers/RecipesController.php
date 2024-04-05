<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function show($recipe_url) {
        $recipe = \App\Models\Recipe::where('url', $recipe_url)->first(); // Récupérer la recette correspondant à l'URL
        $users = \App\Models\User::all(); // Récupérer tous les utilisateurs
        $comments = \App\Models\Commentaire::where('recipe_id', $recipe->id)->get(); // Récupérer tous les commentaires associés à cette recette
    
        return view('recettessingle', [
            'recipe' => $recipe,
            'users' => $users,
            'comments' => $comments
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
