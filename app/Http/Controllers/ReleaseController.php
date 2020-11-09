<?php

namespace App\Http\Controllers;

use App\Models\Release;
use App\Models\Genre;
use App\Models\Track;

use Illuminate\Http\Request;
use App\Http\Resources\ReleaseResource;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Log;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $releases = Release::latest()->get();

        if (request("genre")) 
        {
            $releases = Genre::where("id", request("genre"))->firstOrFail()->releases;
            
            return ReleaseResource::collection($releases);
        }
    
        return ReleaseResource::collection($releases);
    }

    public function featured()
    {
        $featuredReleases = $this->index()->take(3);

        return $featuredReleases;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request);

        $request->validate([
            "name" => "required",
            "description" => "required",
            "genre" => "required",
            "tracks.*.name" => "required",
            "tracks.*.bpm" => "required"
        ]);

        Log::info("reached");

        $new_release = new Release;
        $new_release->name = $request->input("name");
        $new_release->description = $request->input("description");
        $new_release->save();

        Log::info("reached");

        $genre = Genre::find($request->input("genre"));
        $genre->releases()->save($new_release);

        //$new_release->genres()->save($genre);
        
        foreach ($request->input("tracks") as $track) {
            Log::info("reached");
            $new_track = new Track();
            $new_track->release_id = $new_release->id;
            $new_track->name = $track["name"];
            $new_track->bpm = $track["bpm"];
            $new_track->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function show(Release $release)
    {
        return new ReleaseResource($release);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Release $release)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function destroy(Release $release)
    {
        Release::destroy($release);
    }
}
