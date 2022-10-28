<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\TfdataController;
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

Route::get('run-migrations', [HelperController::class, 'run_migrations']);
Route::get('run-migrations-refresh', [HelperController::class, 'run_migrations_refresh']);
Route::get('run-db-seed', [HelperController::class, 'run_db_seed']);