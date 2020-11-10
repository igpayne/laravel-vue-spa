<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use App\Http\Resources\TrackResource;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = TrackResource::collection(Track::all());

        return $tracks;
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
