<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index() {
        return view('contacts',
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
        $request->validate([
            'nom' => 'required', // Assurez-vous que le champ nom est requis
            'prenom' => 'required',
            'mail' => 'required|email',
            'message' => 'required',
        ]);

        Contact::create([
                'nom' => $request->input('nom'), // Assurez-vous que la valeur du champ nom est fournie
                'prenom' => $request->input('prenom'),
                'mail' => $request->input('mail'),
                'message' => $request->input('message'),
            ]);
        
            return redirect('/contacts')->with('success', 'Contact ajouté avec succès.');
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
}
