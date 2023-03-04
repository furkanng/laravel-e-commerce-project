<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AddressController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/users", UserController::class);
Route::get("/users/{user}/change-password", [UserController::class, "passwordForm"]);
Route::post("/users/{user}/change-password", [UserController::class, "changePassword"]);

Route::resource("/users/{user}/addresses", AddressController::class);
