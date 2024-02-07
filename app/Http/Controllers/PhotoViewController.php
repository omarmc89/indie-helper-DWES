<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Artwork;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

use Debugbar;


class PhotoViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $artists = $user->roles()->where('role', 'Artist')->artist;
        Debugbar::info($artists);
        return Inertia::render('Artworks/Prueba');
        
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
        $user_id = Auth::user()->id;
        $user_selected = User::where('id', '=', $user_id)->first();

        $artwork = new Artwork();
        $artwork->title = $request->title;
        $artwork->description = $request->description;
        $artwork->image_url = $request->image_url;
        
        $artwork->artist_id = $user_selected->id;

        $artwork->save();

        $photo = new Photo();
        $photo->style = $request->style;
        $photo->artwork_id = Artwork::where('artist_id','=',$user_selected->id)->where('title',   $request->title)->first()->id;
        $photo->save();


        
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
