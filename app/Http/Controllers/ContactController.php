<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index() {
        $recipes = \App\Models\Recipe::all(); //get all recipes
        $users = \App\Models\User::all(); //get all users
        return view('contacts',
            array('recipes' => $recipes),
            array('users' => $users)
        );
    }
}
