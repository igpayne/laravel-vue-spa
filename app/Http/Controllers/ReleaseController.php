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

    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            "name" => "required",
            "description" => "required",
            "genre" => "required",
            "tracks.*.name" => "required",
            "tracks.*.bpm" => "required"
        ]);

        //construct the Release
        $new_release = new Release;
        $new_release->name = $request->input("name");
        $new_release->description = $request->input("description");
        $new_release->save();

        //attach the genre to the new release (using genre_release table) 
        $genre = Genre::find($request->input("genre"));
        $genre->releases()->save($new_release);
        
        //construct each Track and link to the Release
        foreach ($request->input("tracks") as $track) {
            Log::info("reached");
            $new_track = new Track();
            $new_track->release_id = $new_release->id;
            $new_track->name = $track["name"];
            $new_track->bpm = $track["bpm"];
            $new_track->save();
        }
    }

    public function show(Release $release)
    {
        return new ReleaseResource($release);
    }

    public function update(Request $request, Release $release)
    {
        //
    }

    public function destroy(Release $release)
    {
        Release::destroy($release);
    }
}
