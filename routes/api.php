<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TaskController;

Route::get('/companies', [CompanyController::class, 'index']);

Route::post('/tasks/create', [TaskController::class, 'store']);


Route::get('/test', function () {
    return response()->json(['message' => 'Test successful']);
});
