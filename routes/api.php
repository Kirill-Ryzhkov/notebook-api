<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotebookController;

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

Route::prefix('v1')->group(function () {
    Route::get('notebook', [NotebookController::class, 'getAll']);
    Route::post('notebook', [NotebookController::class, 'setNew']);
    Route::get('notebook/{id}', [NotebookController::class, 'getById']);
    Route::post('notebook/{id}', [NotebookController::class, 'updateById']);
    Route::delete('notebook/{id}', [NotebookController::class, 'deleteById']);
});