<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stagiaire;

class StagiaireController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //For inserting to table stagiaire
        $request->validate([
            'ctf' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required','digits:10'],
            'email' => ['required', 'string', 'max:255'],
            'birthDate' => ['required', 'date'],
        ]);

        $stagiaire = new Stagiaire();
        $stagiaire->ctf = $request->ctf;
        $stagiaire->nom = $request->nom;
        $stagiaire->prenom = $request->prenom;
        $stagiaire->telephone = $request->telephone;
        $stagiaire->email = $request->email;
        $stagiaire->birthDate = $request->birthDate;
        $stagiaire->group_id = $request->group_id;

        $stagiaire->save();

        return redirect()->back()->with('success', 'Stagiaire is added successfuly');
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
        // Find the Stagiaire with the given ID
        $stagiaire = Stagiaire::find($id);

        // If the Stagiaire doesn't exist, return a 404 error
        if (!$stagiaire) {
            abort(404);
        }

        // Validate the request data
        $request->validate([
            'ctf' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required','digits:10'],
            'email' => ['required', 'string', 'max:255'],
            'birthDate' => ['required', 'date'],
            'status_id' => ['required', 'integer'],
            'group_id' => ['required', 'integer'],
        ]);

        // Update the Stagiaire model with the new data
        $stagiaire->ctf = $request->input('ctf');
        $stagiaire->nom = $request->input('nom');
        $stagiaire->prenom = $request->input('prenom');
        $stagiaire->email = $request->input('email');
        $stagiaire->birthDate = $request->input('birthDate');
        $stagiaire->status_id = $request->input('status_id');
        $stagiaire->telephone = $request->input('telephone');
        $stagiaire->group_id = $request->input('group_id');
        // Update other fields here

        // Save the Stagiaire model to the database
        if (!$stagiaire->save()) {
            // If there's an error, redirect back with an error message
            return redirect()->back()->with('error', 'Error updating the Stagiaire');
        }

        // If everything is successful, redirect back with a success message
        return redirect()->route('admin.adminHome')->with('success', 'Stagiaire updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
