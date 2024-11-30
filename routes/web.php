<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Middleware\ValidateContentLength;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('welcome');
});
Route::post('/upload', [FileUploadController::class, 'uploadFile'])->middleware(ValidateContentLength::class);
