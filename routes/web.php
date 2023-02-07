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
    Route::post('/signup', [\App\Http\Controllers\Admin\AuthController::class, 'processAdminSignup']);
    Route::get('/forgot-password', [\App\Http\Controllers\Admin\AuthController::class, 'forgotPasswordForm']);
    Route::post('/confirm-otp', [\App\Http\Controllers\Admin\AuthController::class, 'confirmOtp']);
    Route::post('/forgot-password', [\App\Http\Controllers\Admin\AuthController::class, 'postForgotPassword']);
    Route::get('/reset-password', [\App\Http\Controllers\Admin\AuthController::class, 'resetPasswordForm']);
    Route::post('/reset-password', [\App\Http\Controllers\Admin\AuthController::class, 'postResetPassword']);

    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);

    Route::group(["prefix" => "doctors"], function () {
        Route::get("/", [\App\Http\Controllers\Admin\DoctorController::class, 'index']);
        Route::get("/add-doctor", [\App\Http\Controllers\Admin\DoctorController::class, 'addDoctorForm']);
        Route::get("/doctor-profile", [\App\Http\Controllers\Admin\DoctorController::class, 'doctorProfile']);
        Route::get("/doctor-calendar", [\App\Http\Controllers\Admin\DoctorController::class, 'doctorCalendar']);
        Route::group(["prefix" => "mailbox"], function () {
            Route::get("/", [\App\Http\Controllers\Admin\MailController::class, 'index']);
            Route::get("/compose", [\App\Http\Controllers\Admin\MailController::class, 'compose']);
            Route::get("/read-mail", [\App\Http\Controllers\Admin\MailController::class, 'read']);
        });
    });
    Route::group(["prefix" => "appointments"], function () {
        Route::get("/", [\App\Http\Controllers\Admin\AppointmentController::class, 'index']);
        Route::get("/add-appointment", [\App\Http\Controllers\Admin\AppointmentController::class, 'addAppointmentForm']);
        Route::get("/doctor-profile", [\App\Http\Controllers\Admin\AppointmentController::class, 'doctorProfile']);
    });
    Route::group(["prefix" => "patients"], function () {
        Route::get("/", [\App\Http\Controllers\Admin\PatientController::class, 'index']);
        Route::get("/add-patient", [\App\Http\Controllers\Admin\PatientController::class, 'addPatientForm']);
        Route::get("/patient-profile", [\App\Http\Controllers\Admin\PatientController::class, 'patientProfile']);
    });
    Route::group(["prefix" => "payments"], function () {
        Route::get("/", [\App\Http\Controllers\Admin\PaymentController::class, 'index']);
        Route::get("/add-payment", [\App\Http\Controllers\Admin\PaymentController::class, 'addPaymentForm']);
        Route::get("/patient-invoice", [\App\Http\Controllers\Admin\PaymentController::class, 'patientInvoice']);
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
