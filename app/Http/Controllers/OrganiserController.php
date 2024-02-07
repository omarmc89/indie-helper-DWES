<?php

namespace App\Http\Controllers;

use App\Models\Organiser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OrganiserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Organiser::get();
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
        $user = new User();
        $user->name = $request -> artistForm['name'];
        $user -> email = $request -> artistForm['email'];
        $user -> password = $request -> artistForm["password"];
        $user -> save();

        $organiser = new Organiser();
        $organiser->location = $request->location;
        $organiser->enterprise = $request->enterprise;
        $organiser->role_id = $request->role_id;
        $organiser->save();

        $user->roles()->attach($organiser->role_id);
        
        return response() -> json([
            "meesage" => "Organiser " . $user->name . " created"
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Organiser $organiser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organiser $organiser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organiser $organiser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organiser $organiser)
    {
        //
    }
}
