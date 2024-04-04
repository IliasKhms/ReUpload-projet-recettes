<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = \App\Models\Recipe::all(); //get all recipes
        $users = \App\Models\User::all(); //get all users
        return view('recettesadmin',
            array('recipes' => $recipes),
            array('users' => $users)
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createrecipe');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $recipe = new \App\Models\Recipe();
    $recipe->title = $request->title;
    $recipe->content = $request->content;
    $recipe->owner_id = 1;
    $recipe->url = $request->title;
    $recipe->save();

    foreach ($request->ingredient_name as $key => $ingredientName) {
        $ingredient = new \App\Models\Ingredient();
        $ingredient->ingredients = $ingredientName;
        $ingredient->idrecipe = $recipe->id;
        $ingredient->quantitee = $request->ingredient_quantity[$key];
        $ingredient->type = $request->ingredient_type[$key];
        $ingredient->save();
    }

    return redirect('/admin/recipes');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recipe = \App\Models\Recipe::findOrFail($id);
        return view('editrecipe', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $recipe = \App\Models\Recipe::findOrFail($id);
        $recipe->title = $request->title;
        $recipe->content = $request->content;
        $recipe->save();

        $recipe->ingredients()->delete();


        foreach ($request->ingredient_name as $key => $ingredientName) {
            $ingredient = new \App\Models\Ingredient();
            $ingredient->ingredients = $ingredientName;
            $ingredient->idrecipe = $recipe->id;
            $ingredient->quantitee = $request->ingredient_quantity[$key];
            $ingredient->type = $request->ingredient_type[$key];
            $ingredient->save();
        }

        return redirect('/admin/recipes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = \App\Models\Recipe::where('id',$id)->first();
        $recipe->delete();
        return redirect('/admin/recipes');
    }
}
