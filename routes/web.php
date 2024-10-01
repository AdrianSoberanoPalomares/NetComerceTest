<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/companies', [CompanyController::class, 'index']);

/* Route::post('/tasks/create', [TaskController::class, 'store']); */
Route::post('/tasks/create', [TaskController::class, 'store'])->middleware('api');


Route::get('/test', function () {
    return response()->json(['message' => 'Test successful']);
});
