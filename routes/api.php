<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\OrganiserController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\PaintingController;
use App\Http\Controllers\PhotoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Showing resources routes
Route::apiResource('/paintings', PaintingController::class);
Route::apiResource('/photos', PhotoController::class);
Route::apiResource('/users', UserController::class);
Route::apiResource('/artists', ArtistController::class);
Route::apiResource('/organisers', OrganiserController::class);
Route::apiResource('/roles', RoleController::class);
Route::apiResource('/artworks', ArtworkController::class);

// Creating resources routes
Route::apiResource('/createRole', RoleController::class);
Route::apiResource('/createArtist', ArtistController::class);
Route::apiResource('/createOrganiser', OrganiserController::class);
Route::apiResource('/createPainting', PaintingController::class);
Route::apiResource('/createPhoto', PhotoController::class);