<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Artwork;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Photo::get();
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
        $artwork = new Artwork();
        $artwork->title = $request->title;
        $artwork->description = $request->description;
        $artwork->artist_id = $request->artist_id;
        $artwork->save();
    
        $created_artwork= Artwork::where('title', '=', $request->title)->where('artist_id', '=', $request->artist_id)->first();
        if (!$artwork->wasRecentlyCreated) {
            return response() -> json([
                'message' => 'Failed to create artwork'
            ], 400);
        } else {
            $photo = new Photo();
            $photo -> style = $request -> style;
            $photo -> image_url = $request -> image_url;
            $photo -> artwork_id = $created_artwork->id;
            $photo -> save();
            
            if ($photo->wasRecentlyCreated) {
                return response()->json([
                    'message' => "Successfully created artwork " . $artwork->id . " and photo " . $photo->title
                ], 201);
            } else {
                $artwork->delete();
                return response()->json([
                    'message' => 'Failed to create photo'
                ], 400);
            }
        }
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
