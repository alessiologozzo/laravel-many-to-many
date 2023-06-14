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
    Route::get("/", [ProjectController::class, "redirectIndex"])->name("dashboard");

    Route::get("/project/create", [ProjectController::class, "create"])->name("project.create");
    Route::get("/project/{name}", [ProjectController::class, "index"])->name("project.index");
    Route::get("/project/edit/{slug}", [ProjectController::class, "edit"])->name("project.edit");
    Route::delete("/project/delete/{name}", [ProjectController::class, "destroy"])->name("project.destroy");
    Route::put("/project/update/{id}", [ProjectController::class, "update"])->name("project.update");
    Route::post("/project/store", [ProjectController::class, "store"])->name("project.store");

    Route::get("/profile/{name}", [ProfileController::class, "index"])->name("profile.index");
    Route::put("/profile/update", [ProfileController::class, "update"])->name("profile.update");

    Route::get("/account/{name}", [AccountController::class, "index"])->name("account.index");
    Route::put("/account/update", [AccountController::class, "update"])->name("account.update");
    Route::delete("/account/destroy", [AccountController::class, "destroy"])->name("account.destroy");
    
});

require __DIR__.'/auth.php';
