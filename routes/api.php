<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
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

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/articles-1', function() {
        // If the Content-Type and Accept headers are set to 'application/json', 
        // this will return a JSON structure. This will be cleaned up later.
        return '{"a":"articles"}';
    });
});

Route::get('/run-migrations', function () {
    return Artisan::call('migrate', ["--force" => true ]);
});

Route::get('/run-db-seed', function () {
    return Artisan::call('db:seed');
});

Route::get('articles',[ArticleController::class, 'index']);
Route::get('articles/{id}', [ArticleController::class, 'show']);
