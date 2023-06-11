<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ProjectController;
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

Route::get('/', function () {
    return view('home');
})->name("home");

Route::middleware(["auth", "verified"])->name("admin.")->prefix("admin")->group(function () {
    Route::get("/", [ProjectController::class, "index"])->name("dashboard");

    // Route::resource("/project", ProfileController::class);
    Route::get("/project/{name}", [ProjectController::class, "index"])->name("project.index");
    Route::delete("/project/delete/{id}", [ProjectController::class, "destroy"])->name("project.destroy");

    Route::get("/profile/{name}", [ProfileController::class, "index"])->name("profile.index");
    Route::put("/profile/update", [ProfileController::class, "update"])->name("profile.update");

    Route::get("/account/{name}", [AccountController::class, "index"])->name("account.index");
    Route::put("/account/update", [AccountController::class, "update"])->name("account.update");
    Route::delete("/account/destroy", [AccountController::class, "destroy"])->name("account.destroy");
    
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
