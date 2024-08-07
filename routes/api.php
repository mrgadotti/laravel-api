<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group([
    "middleware" => "auth:sanctum"
], function () {
    Route::get('userprofile', [AuthController::class, 'userProfile']);
    Route::get('logout', [AuthController::class, 'logout']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/loginapi', [AuthController::class, 'loginApi']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::group([
        "middleware" => "auth:api"
    ], function () {
        // needs the bearer token
        // url/api/auth/upload
        Route::post('/upload', [FileController::class, 'imageUpload']);
    });

});

Route::group([
    'middleware' => 'api',
], function () {
    Route::group([
        "middleware" => "auth:api"
    ], function () {
        // needs the bearer token
        // url/api/upload
        Route::post('/upload', [FileController::class, 'imageUpload']);
        Route::post('/upload_file', [FileController::class, 'fileUpload']);
    });

});
