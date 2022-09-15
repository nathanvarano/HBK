<?php

use App\Http\Controllers\MovieReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/movie-review')->group( function () {
    Route::get('/{id}', [MovieReviewController::class, 'show']);
    Route::post('/store', [MovieReviewController::class, 'store']);
    Route::post('/{id}', [MovieReviewController::class, 'update']);
});