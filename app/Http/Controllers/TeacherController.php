<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stagiaire;
use App\Models\Group;
use App\Models\Absence;
use App\Models\Seance;
use Carbon\Carbon;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data =[
            'stagiaires' => Stagiaire::get(),
            'groups' => Group::get(),
        ];
        return view('teacher.dashboard', $data);
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
    /**
 * Update the absence values for the specified resource in storage.
 */
    public function updateAbsence(Request $request)
    {
        // Get the absence data from the request
        $absenceData = $request->input('absence');
        
        // Loop through the absence data and create Absence records
        foreach ($absenceData as $stagiaireId => $absenceValues) {
            foreach ($absenceValues as $seanceId) {
                // Find the seance with the given ID
                $seance = Seance::find($seanceId);

                // If the seance doesn't exist, return an error
                if (!$seance) {
                    return redirect()->back()->with('error', 'Seance not found');
                }

                // Create the Absence record
                $absence = new Absence;
                $absence->abs_date = date('Y-m-d');
                $absence->stagiaire_id = $stagiaireId;
                $absence->seance_id = $seance->id;
                $absence->save();
            }
        }

        return redirect()->back()->with('success', 'Absences have been saved successfully.');
    }




}
