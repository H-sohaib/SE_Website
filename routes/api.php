<?php

use App\Http\Controllers\adminControllers\OrganisationModulaireController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::patch('modules_update', [OrganisationModulaireController::class, 'update_all_modules']);
Route::patch('matieres_update', [OrganisationModulaireController::class, 'update_all_matieres']);