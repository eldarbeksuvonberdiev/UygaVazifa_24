<?php

use App\Controllers\AdminController;
use App\Routes\Route;

Route::get("/",[AdminController::class,"index"]);


