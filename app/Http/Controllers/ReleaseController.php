<?php

namespace App\Http\Controllers;

use App\Models\Release;
use App\Models\Genre;
use App\Models\Track;

use Illuminate\Http\Request;
use App\Http\Resources\ReleaseResource;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
        Log::info($request->input("newRelease"));

        //validate the overall request
        $request->validate([
            "newRelease" => "required",
            "cover" => "required"
        ]);

        //convert the json release data to a php array
        $new_release_array = json_decode($request->input("newRelease"), true);

        //construct validator and validate the release data
        $release_validator = Validator::make($new_release_array, [
            "name" => "required",
            "description" => "required",
            "genre" => "required",
            "newRelease.tracks.*.name" => "required",
            "newRelease.tracks.*.bpm" => "required",
        ]);

        $release_validator->validate();

        //store image upload
        $path = $request->file("cover")->store("covers");

        //construct the Release
        $new_release = new Release;
        $new_release->name = $new_release_array["name"];
        $new_release->description = $new_release_array["description"];
        $new_release->cover_path = $path;
        $new_release->save();

        //attach the genre to the new release (using genre_release table) 
        $genre = Genre::find($new_release_array["genre"]);
        $genre->releases()->save($new_release);
        
        //construct each Track and link to the Release
        foreach ($new_release_array["tracks"] as $track) {
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
