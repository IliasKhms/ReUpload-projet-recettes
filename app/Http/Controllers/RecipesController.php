<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function show($recipe_url) {
        $recipes = \App\Models\Recipe::where('url',$recipe_url)->first(); //get first recipe with recipe_nam == $recipe_name
        $users = \App\Models\User::all(); //get all users
        return view('recettessingle',
            array('recipes' => $recipes),
            array('users' => $users)
        );
     }
}
