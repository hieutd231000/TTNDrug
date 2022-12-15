<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix" => "admin"], function () {
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'loginAdminForm']);
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'processAdminLogin']);
    Route::get('/signup', [\App\Http\Controllers\Admin\AuthController::class, 'signupAdminForm']);
    Route::get('/forgot-password', [\App\Http\Controllers\Admin\AuthController::class, 'forgotPasswordForm']);

    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);

    Route::group(["prefix" => "doctors"], function () {
        Route::get("/", [\App\Http\Controllers\Admin\DoctorController::class, 'index']);
    });
//    Route::group(["prefix" => "users"], function () {
//        Route::get("/", [\App\Http\Controllers\Admin\UserController::class, 'index']);
//        Route::post("/delete", [\App\Http\Controllers\Admin\UserController::class, 'destroy']);
//    });
//
//    Route::group(["prefix" => "news"], function () {
//        Route::get("/", [\App\Http\Controllers\Admin\NewsController::class, 'index']);
//        Route::get("/delete/{id}", [\App\Http\Controllers\Admin\NewsController::class, 'destroy']);
//        Route::get("/{id}/edit",[\App\Http\Controllers\Admin\NewsController::class, 'edit']);
//        Route::post("/{id}/update",[\App\Http\Controllers\Admin\NewsController::class, 'update']);
//        Route::get("/add", [\App\Http\Controllers\Admin\NewsController::class, 'createForm']);
//        Route::post("/store", [\App\Http\Controllers\Admin\NewsController::class, 'store']);
//    });
});
