<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

    Route::apiResource('abonnees', 'App\Http\Controllers\Api\AbonneesController');
    Route::apiResource('admins', 'App\Http\Controllers\Api\AdminController');
    Route::apiResource('vannes', 'App\Http\Controllers\Api\VanneController');
    Route::apiResource('tuyaux90s', 'App\Http\Controllers\Api\Tuyaux90Controller');
    Route::apiResource('tuyaux25de1000mdbrs', 'App\Http\Controllers\Api\Tuyaux25de1000mdbrController');
    Route::apiResource('adeqgis', 'App\Http\Controllers\Api\AdeqgisController');
    Route::apiResource('empchateaus', 'App\Http\Controllers\Api\EmpchateauController');
    Route::apiResource('tablepointsinteros', 'App\Http\Controllers\Api\TablepointsinteroController');
    Route::apiResource('abonnes', 'App\Http\Controllers\Api\AbonneController');
    Route::apiResource('sites', 'App\Http\Controllers\Api\SiteController');

Route::middleware('auth:sanctum')->group(function () {    
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
});


Route::apiResource('sites', 'App\Http\Controllers\Api\SiteController');
Route::apiResource('adeqgis2', 'App\Http\Controllers\Api\Adeqgis2Controller');
