<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NodeController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//TODO add namespace and move version 1 controller to an appropiate folder under v1


Route::prefix("/v1/")->group(function() {
    Route::prefix("/node/{node_id}")->group(function() {
        Route::get("/children", [NodeController::class, "children"]);    
        Route::get("/parents", [NodeController::class, "parents"]);
    });
});

