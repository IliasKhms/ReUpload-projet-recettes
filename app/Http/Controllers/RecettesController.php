<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecettesController extends Controller
{
    function index() {
        $recipes = \App\Models\Recipe::all(); //get all recipes
        $users = \App\Models\User::all(); //get all users
        $images = \App\Models\Image::all(); //get all images
        return view('recettes',
            array('recipes' => $recipes),
            array('users' => $users),
        );
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $recipes = Recipe::where('title', 'like', "%{$search}%")
            ->orWhere('content', 'like', "%{$search}%")
            ->orWhereHas('ingredients', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->get();

        return view('recettes', compact('recipes'));
    }
}
