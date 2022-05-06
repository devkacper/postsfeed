<?php

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

Route::group(['prefix' => 'post'], function() {

    $c = \App\Http\Controllers\Api\PostController::class;

    Route::get('/{id}', [$c, 'show']);
    Route::post('/store', [$c, 'store']);
    Route::post('/update/{postId}', [$c, 'update']);
    Route::delete('/delete/{id}', [$c, 'delete']);
});
