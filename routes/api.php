<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Middleware\ValidateContentLength;

Route::post('/upload', [FileUploadController::class, 'uploadFile'])->middleware(ValidateContentLength::class);
;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
