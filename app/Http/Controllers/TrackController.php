<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Release;
use Illuminate\Http\Request;
use App\Http\Resources\TrackResource;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();

        if (request("release")) 
        {
            $tracks = Release::where("id", request("release"))->firstOrFail()->tracks;
            
            return TrackResource::collection($tracks);
        }

        return TrackResource::collection($tracks);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Track $track)
    {
        return new TrackResource($track);
    }

    public function update(Request $request, Track $track)
    {
        //
    }

    public function destroy(Track $track)
    {
        //
    }
}
