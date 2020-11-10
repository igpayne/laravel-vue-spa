<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Release;
use Illuminate\Http\Request;
use App\Http\Resources\GenreResource;

class GenreController extends Controller
{
    public function index()
    {
        $genres = GenreResource::collection(Genre::orderBy("name", "asc")->get());

        if (request("release")) 
        {
            $genres = Release::where("id", request("release"))->firstOrFail()->genres;
            
            return GenreResource::collection($genres);
        }

        return $genres;
    }
}
