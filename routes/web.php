<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\adminControllers\AdminController;
use App\Http\Controllers\adminControllers\AdminManagementController;
use App\Http\Controllers\adminControllers\OrganisationModulaireController;
use App\Http\Controllers\adminControllers\PfeExemplesController;
use App\Http\Controllers\adminControllers\PfeTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::post('sendEmail', [SendEmailController::class, 'send'])->name('sendEmail');
Route::get('pfe_exemples/view_pdf/{pfe_exemple}',  [PfeExemplesController::class, 'view_pdf'])->name('view_pdf');

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('', AdminController::class)->name('index');
    Route::resource('pfe_exemples', PfeExemplesController::class);
    Route::resource('pfe_types', PfeTypeController::class);
    Route::resource('organisation_modulaire', OrganisationModulaireController::class);
    Route::get('admin_management', [AdminManagementController::class, 'index'])
        ->name('admin_management.index');;

    Route::get('admin_management/create', [RegisteredUserController::class, 'create'])
        ->name('admin_management.create');

    Route::post('admin_management', [RegisteredUserController::class, 'store'])
        ->name('admin_management.store');;
});




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';