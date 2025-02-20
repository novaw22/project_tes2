<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.dashboard')->name('welcome');
});

Route::name("auth.")->group(function () {
    Route::middleware(["guest"])->group(function() {
        Route::get("/login", [AuthController::class, "login"])->name("login");
        Route::get("/register", [AuthController::class, "register"])->name("register");
        Route::post("/authenticate", [AuthController::class, "authenticate"])->name("authenticate");
        Route::post("/register/process", [AuthController::class, "registerProcess"])->name("register.process");
    });
    Route::post("/logout", [AuthController::class, "logout"])->middleware(["auth"])->name("logout");
});

Route::middleware("auth")->name("user.")->group(function () {
    Route::get("/dashboard", [DashboardController::class, "dashboard"])->name("dashboard");
    Route::get("/profile", [DashboardController::class, "profile"])->name("profile");
    Route::patch('/{user}/profile/save', [DashboardController::class, 'profileSave'])->name("profile.save");

    Route::prefix("complaint")->name("complaint.")->group(function () {
        Route::get("/create", [ComplaintController::class, "create"])->name("create");
        Route::post("/", [ComplaintController::class, "store"])->name("store");
    });
});

