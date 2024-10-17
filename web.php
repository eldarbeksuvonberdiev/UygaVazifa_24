<?php

use App\Controllers\AdminController;
use App\Controllers\LoginController;
use App\Controllers\TaskController;
use App\Controllers\UserController;
use App\Routes\Route;

//Admin Controller
Route::get("/",[AdminController::class,"index"]);
Route::get("/notfound404",[AdminController::class,"notfound"]);
Route::get("/users",[AdminController::class,"users"]);

//Login Controller
Route::get("/login",[LoginController::class,"loginPage"]);
Route::get("/logout",[LoginController::class,"logout"]);
Route::get("/register",[LoginController::class,"registerPage"]);

Route::post("/login",[LoginController::class,"login"]);
Route::post("/register",[LoginController::class,"register"]);

//Task Controllers
Route::get("/add",[TaskController::class,"index"]);

Route::get("/given",[TaskController::class,"given"]);
Route::get("/in_progress",[TaskController::class,"in_progress"]);
Route::get("/done",[TaskController::class,"done"]);
Route::get("/rejected",[TaskController::class,"rejected"]);
Route::get("/ready",[TaskController::class,"ready"]);

Route::post("/add",[TaskController::class,"create"]);
Route::post("/given",[TaskController::class,"togiven"]);
Route::post("/accept",[TaskController::class,"accept"]);
Route::post("/reject",[TaskController::class,"reject"]);
Route::post("/start",[TaskController::class,"changeStatus"]);

//user controller
Route::post("/activate",[UserController::class,"changeStatus"]);
Route::post("/disactivate",[UserController::class,"changeStatus"]);

