<?php

use App\Controllers\AdminController;
use App\Controllers\LoginController;
use App\Controllers\TaskController;
use App\Routes\Route;

//Admin Controller
Route::get("/",[AdminController::class,"index"]);
Route::get("/tasksta",[AdminController::class,"kanban"]);

//Login Controller
Route::get("/login",[LoginController::class,"loginPage"]);
Route::get("/logout",[LoginController::class,"logout"]);
Route::get("/register",[LoginController::class,"registerPage"]);

Route::post("/login",[LoginController::class,"login"]);
Route::post("/register",[LoginController::class,"register"]);

//Task Controllers
Route::get("/add",[TaskController::class,"index"]);
Route::post("/add",[TaskController::class,"create"]);
Route::post("/accept",[TaskController::class,"accept"]);
Route::post("/reject",[TaskController::class,"changeStatus"]);
Route::post("/start",[TaskController::class,"changeStatus"]);

