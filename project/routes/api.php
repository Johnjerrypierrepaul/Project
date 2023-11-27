<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CrudController;
use App\Http\Controllers\API\formlogController;
use App\Http\Controllers\API\FormconnectionController;

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
Route::apiResource("formlogs",formlogController::class);
Route::apiResource("Formconnection",FormconnectionController::class);
Route::apiResource("cruds",CrudController::class);