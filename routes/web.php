<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use App\Http\Controllers\TfdataController;


/*
 |--------------------------------------------------------------------------
 | Web Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register web routes for your application. These
 | routes are loaded by the RouteServiceProvider within a group which
 | contains the "web" middleware group. Now create something great!
 |
 */

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('users', UserController::class);

// Route::get('/token', function (Request $request) {
//     session()->regenerate();
//     return response()->json([
//         "token" => csrf_token()],
//         200);
// });
Route::group(['middleware' => ['auth.basic.once']], function () {
    Route::get('/tfstate', [TfdataController::class, 'fetched']);
    Route::post('/tfstate', [TfdataController::class, 'updated']);
    Route::delete('/tfstate', [TfdataController::class, 'purged']);
    Route::match ("LOCK", '/tfstate/lock', [TfdataController::class, 'lock']);
    Route::match ("UNLOCK", '/tfstate/lock', [TfdataController::class, 'unlock']);
});