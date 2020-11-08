<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ReleaseController;
use \App\Http\Controllers\TrackController;
use \App\Http\Controllers\GenreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/releases", [ReleaseController::class, "index"]);
Route::get("/releases/featured", [ReleaseController::class, "featured"]);
Route::get("/releases/{release}", [ReleaseController::class, "show"]);

Route::get("/tracks", [TrackController::class, "index"]);
Route::get("/tracks/{track}", [TrackController::class, "show"]);

Route::get("/genres", [GenreController::class, "index"]);
