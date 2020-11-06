<?php

namespace App\Http\Controllers;

use App\Models\Release;
use Illuminate\Http\Request;
use App\Http\Resources\ReleaseResource;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $releases = ReleaseResource::collection(Release::orderBy("release_date", "desc")->get());

        return $releases;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input("name");
        $artist_name = $request->input("artist name");
        $description = $request->input("description");
        $release_date = $request->input("release date");

        $new_release = Release::create([
            "name" => $name,
            "artist_name" => $artist_name,
            "description" => $description,
            "release date" => $release_date
        ]);

        $new_release->save();
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
