<?php

namespace App\Http\Controllers;

use App\Models\Painting;
use App\Models\Artwork;
use Illuminate\Http\Request;

class PaintingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $paintings = Painting::leftJoin('artworks', 'artworks.id', '=', 'paintings.artwork_id')
        //     ->select('artworks.*')
        //     ->get();
        
        // return response()->json([
        //     'paintings' => $paintings
        // ], 200);

        return Painting::get();
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
            $painting = new Painting();
            $painting -> style = $request -> style;
            $painting -> width = $request -> width;
            $painting -> height = $request -> height;
            $painting -> image_url = $request -> image_url;
            $painting -> artwork_id = $created_artwork->id;
            $painting -> save();
            
            if ($painting->wasRecentlyCreated) {
                return response()->json([
                    'message' => 'Successfully created artwork and painting'
                ], 201);
            } else {
                $artwork->delete();
                return response()->json([
                    'message' => 'Failed to create painting'
                ], 400);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Painting $painting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Painting $painting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Painting $painting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Painting $painting)
    {
        //
    }
}
