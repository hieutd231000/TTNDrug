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
    return response('Hello World', 200)->header('Content-Type', 'text/plain');
});

Route::group(["prefix" => "admin"], function () {
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'loginAdminForm']);
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'processAdminLogin']);
    Route::get('/signup', [\App\Http\Controllers\Admin\AuthController::class, 'signupAdminForm']);
    Route::post('/signup', [\App\Http\Controllers\Admin\AuthController::class, 'processAdminSignup']);
    Route::get('/forgot-password', [\App\Http\Controllers\Admin\AuthController::class, 'forgotPasswordForm']);
    Route::post('/confirm-otp', [\App\Http\Controllers\Admin\AuthController::class, 'confirmOtp']);
    Route::post('/forgot-password', [\App\Http\Controllers\Admin\AuthController::class, 'postForgotPassword']);
    Route::get('/reset-password', [\App\Http\Controllers\Admin\AuthController::class, 'resetPasswordForm']);
    Route::post('/reset-password', [\App\Http\Controllers\Admin\AuthController::class, 'postResetPassword']);

    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);

    Route::get('/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index']);

    Route::group(["prefix" => "categories"], function () {
        Route::get("/", [\App\Http\Controllers\Admin\CategoryController::class, 'index']);
        Route::post("/add", [\App\Http\Controllers\Admin\CategoryController::class, 'store']);
        Route::post("/delete", [\App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
        Route::get("/info", [\App\Http\Controllers\Admin\CategoryController::class, 'detail']);
        Route::post("/edit", [\App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    });

    Route::group(["prefix" => "units"], function () {
        Route::get("/", [\App\Http\Controllers\Admin\UnitController::class, 'index']);
        Route::post("/add", [\App\Http\Controllers\Admin\UnitController::class, 'store']);
        Route::post("/delete", [\App\Http\Controllers\Admin\UnitController::class, 'destroy']);
        Route::get("/info", [\App\Http\Controllers\Admin\UnitController::class, 'detail']);
        Route::post("/edit", [\App\Http\Controllers\Admin\UnitController::class, 'edit']);
    });

    Route::group(["prefix" => "users"], function () {
        Route::get("/", [\App\Http\Controllers\Admin\UserController::class, 'index']);
        Route::get("/add-user", [\App\Http\Controllers\Admin\UserController::class, 'addUserForm']);
        Route::post("/add-user", [\App\Http\Controllers\Admin\UserController::class, 'store']);
        Route::post("/delete", [\App\Http\Controllers\Admin\UserController::class, 'destroy']);
        Route::get("/{id}/edit", [\App\Http\Controllers\Admin\UserController::class, 'edit']);
        Route::post("/edit-user", [\App\Http\Controllers\Admin\UserController::class, 'handleEdit']);
        Route::get("/user-profile", [\App\Http\Controllers\Admin\UserController::class, 'userProfile']);
        Route::get("/user-calendar", [\App\Http\Controllers\Admin\UserController::class, 'userCalendar']);
//        Route::group(["prefix" => "mailbox"], function () {
//            Route::get("/", [\App\Http\Controllers\Admin\MailController::class, 'index']);
//            Route::get("/compose", [\App\Http\Controllers\Admin\MailController::class, 'compose']);
//            Route::get("/read-mail", [\App\Http\Controllers\Admin\MailController::class, 'read']);
//        });
    });
    Route::group(["prefix" => "appointments"], function () {
        Route::get("/", [\App\Http\Controllers\Admin\AppointmentController::class, 'index']);
        Route::get("/add-appointment", [\App\Http\Controllers\Admin\AppointmentController::class, 'addAppointmentForm']);
        Route::get("/doctor-profile", [\App\Http\Controllers\Admin\AppointmentController::class, 'doctorProfile']);
    });
    Route::group(["prefix" => "suppliers"], function () {
        Route::get("/", [\App\Http\Controllers\Admin\SupplierController::class, 'index']);
        Route::get("/add-supplier", [\App\Http\Controllers\Admin\SupplierController::class, 'addSupplierForm']);
        Route::get("/patient-profile", [\App\Http\Controllers\Admin\PatientController::class, 'patientProfile']);
    });
    Route::group(["prefix" => "payments"], function () {
        Route::get("/", [\App\Http\Controllers\Admin\PaymentController::class, 'index']);
        Route::get("/add-payment", [\App\Http\Controllers\Admin\PaymentController::class, 'addPaymentForm']);
        Route::get("/patient-invoice", [\App\Http\Controllers\Admin\PaymentController::class, 'patientInvoice']);
    });
//    Route::group(["prefix" => "usersss"], function () {
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
