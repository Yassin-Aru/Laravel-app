<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stagiaire;
use App\Models\Group;
use App\Models\Excuse;
use App\Models\Status;
use App\Models\Absence;

use Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        // $teacher = User::where('isAdmin', '!=', true)->get();
        // return view('admin.home', ['teacher' => $teacher]);
        // $groups = Group::get();
        // return view('admin/home', ['groups' => $groups]);
        $data =[
            'stagiaires' => Stagiaire::get(),
            'groups' => Group::get(),
            'excuses' => Excuse::get(),
            'statuses' => Status::get(),
            'absences' => Absence::get(),
        ];
        return view('admin/home', $data);
        
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
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $prof = new User();
        $prof->nom = $request->nom;
        $prof->prenom = $request->prenom;
        $prof->email = $request->email;
        $prof->password = Hash::make($request->password);

        $prof->save();

        return redirect()->back()->with('success', 'Prof is added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show()
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
    public function update(Request $request)
    {
        //
        
        

    }

    public function updateExcuse(Request $request, string $id)
    {
        // Find the Stagiaire with the given ID
        $absence = Absence::find($id);

        // If the Stagiaire doesn't exist, return a 404 error
        if (!$absence) {
            abort(404);
        }

        // Validate the request data
        $request->validate([
            'excuse_id' => ['required', 'integer'],
        ]);

        $absence->excuse_id = $request->input('excuse_id');
        // Update other fields here

        // Save the Stagiaire model to the database
        if (!$absence->save()) {
            // If there's an error, redirect back with an error message
            return redirect()->back()->with('error', 'Error updating the excuse');
        }

        // If everything is successful, redirect back with a success message
        return redirect()->route('admin.adminHome')->with('success', 'Absence updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
