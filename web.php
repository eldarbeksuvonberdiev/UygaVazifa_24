<?php

use App\Controllers\AdminController;
use App\Controllers\LoginController;
use App\Routes\Route;

Route::get("/",[AdminController::class,"index"]);
Route::get("/kanban",[AdminController::class,"kanban"]);

Route::get("/login",[LoginController::class,"loginPage"]);
Route::get("/logout",[LoginController::class,"logout"]);
Route::get("/register",[LoginController::class,"registerPage"]);

Route::post("/login",[LoginController::class,"login"]);
Route::post("/register",[LoginController::class,"register"]);

