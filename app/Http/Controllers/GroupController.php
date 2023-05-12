<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $groups = Group::get();
        // return view('admin.home', ['groups' => $groups]);
        // $groups = Group::all();
        // return view('admin.home')->with('groups',$groups);
        // $groups = Group::all();
        // return view('admin.home', ['groups' => $groups]);
        // $groups = DB::table('groups')->get();
        // return view('admin.home')->with('groups', $groups);
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
            'name' => ['required', 'string', 'max:255'],
        ]);

        $grp = new Group();
        $grp->name = $request->name;
        $grp->level = $request->level;
        $grp->field = $request->field;

        $grp->save();

        return redirect()->back()->with('success', 'Group is added successfuly');
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
