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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

// Route::middleware('auth:api')->post('checklist', 'App\Http\Controllers\Api\ChecklistController@create');
// Route::middleware('auth:api')->delete('checklist/{checklistId}', 'App\Http\Controllers\Api\ChecklistController@delete');
// Route::middleware('auth:api')->get('checklist', 'App\Http\Controllers\Api\ChecklistController@checklist');

Route::middleware('auth:api')->apiResource('/checklist', App\Http\Controllers\Api\ChecklistController::class);
Route::middleware('auth:api')->resource('checklist.item', 'App\Http\Controllers\Api\ChecklistItemController');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
