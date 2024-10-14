<?php

use App\Controllers\AuthenticationController;
use App\Controllers\JanrController;
use App\Controllers\MuallifController;
use App\Controllers\KitoblarController;
use App\Routes\Route;

#Janr aloqador linklar
Route::get('/', [JanrController::class, 'index']);
Route::get('/notfound404', [JanrController::class, 'notfound']);
Route::get('/notfound403', [JanrController::class, 'notAllowed']);

Route::post('/jcreate', [JanrController::class, 'createJanr']);
Route::post('/jncreate', [JanrController::class, 'create']);
Route::post('/jdelete', [JanrController::class, 'delete']);
// Route::post('/jshow',[JanrController::class,'show']);
Route::post('/jedit', [JanrController::class, 'edit']);
Route::post('/jupdate', [JanrController::class, 'update']);

