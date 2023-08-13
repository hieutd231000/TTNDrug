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
    return redirect()->to('/login');
});

Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'loginAdminForm'])->name('login');
Route::get('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'processAdminLogout']);
Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'processAdminLogin']);
//Route::get('/signup', [\App\Http\Controllers\Admin\AuthController::class, 'signupAdminForm']);
//Route::post('/signup', [\App\Http\Controllers\Admin\AuthController::class, 'processAdminSignup']);
Route::get('/forgot-password', [\App\Http\Controllers\Admin\AuthController::class, 'forgotPasswordForm']);
Route::post('/confirm-otp', [\App\Http\Controllers\Admin\AuthController::class, 'confirmOtp']);
Route::post('/forgot-password', [\App\Http\Controllers\Admin\AuthController::class, 'postForgotPassword']);
Route::get('/reset-password', [\App\Http\Controllers\Admin\AuthController::class, 'resetPasswordForm']);
Route::post('/reset-password', [\App\Http\Controllers\Admin\AuthController::class, 'postResetPassword']);
Route::post('/change-password', [\App\Http\Controllers\Admin\AuthController::class, 'changePassword']);

Route::middleware('auth')->group(function () {
    Route::middleware('isAdmin')->group(function () {
        Route::group(["prefix" => "admin"], function () {
            Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);
            Route::get('/sale-report', [\App\Http\Controllers\Admin\DashboardController::class, 'sale']);

            Route::group(["prefix" => "production-batch"], function () {
                Route::get("/", [\App\Http\Controllers\Admin\OrderController::class, 'productionBatchIndex']);
                Route::post("/add", [\App\Http\Controllers\Admin\OrderController::class, 'productionBatchIndexStore']);
                Route::post("/delete", [\App\Http\Controllers\Admin\OrderController::class, 'productionBatchIndexDestroy']);
                Route::post("/edit", [\App\Http\Controllers\Admin\OrderController::class, 'productionBatchIndexEdit']);
            });

            Route::group(["prefix" => "categories"], function () {
                Route::get("/", [\App\Http\Controllers\Admin\CategoryController::class, 'index']);
                Route::post("/add", [\App\Http\Controllers\Admin\CategoryController::class, 'store']);
                Route::post("/delete", [\App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
                Route::get("/info", [\App\Http\Controllers\Admin\CategoryController::class, 'detail']);
                Route::post("/edit", [\App\Http\Controllers\Admin\CategoryController::class, 'edit']);
            });

            Route::group(["prefix" => "users"], function () {
                Route::get("/", [\App\Http\Controllers\Admin\UserController::class, 'index']);
                Route::get("/add-user", [\App\Http\Controllers\Admin\UserController::class, 'addUserForm']);
                Route::post("/add-user", [\App\Http\Controllers\Admin\UserController::class, 'store']);
                Route::post("/delete", [\App\Http\Controllers\Admin\UserController::class, 'destroy']);
                Route::get("/{id}/edit", [\App\Http\Controllers\Admin\UserController::class, 'edit']);
                Route::post("/edit-user", [\App\Http\Controllers\Admin\UserController::class, 'handleEdit']);
                Route::post("/edit-info", [\App\Http\Controllers\Admin\UserController::class, 'handleEditInfo']);
                Route::post("/update-avatar", [\App\Http\Controllers\Admin\UserController::class, 'handleUpdateAvatar']);
            });
            Route::group(["prefix" => "suppliers"], function () {
                Route::get("/", [\App\Http\Controllers\Admin\SupplierController::class, 'index']);
                Route::get("/add-supplier", [\App\Http\Controllers\Admin\SupplierController::class, 'addSupplierForm']);
                Route::post("/add-supplier", [\App\Http\Controllers\Admin\SupplierController::class, 'store']);
                Route::get("/{id}/edit", [\App\Http\Controllers\Admin\SupplierController::class, 'edit']);
                Route::get("/{id}/detail", [\App\Http\Controllers\Admin\SupplierController::class, 'detail']);
                Route::post("/edit-supplier", [\App\Http\Controllers\Admin\SupplierController::class, 'handleEdit']);
                Route::post("/delete", [\App\Http\Controllers\Admin\SupplierController::class, 'destroy']);
                Route::get("/get-product", [\App\Http\Controllers\Admin\SupplierController::class, 'getAllProduct']);
                Route::post("/add-product", [\App\Http\Controllers\Admin\SupplierController::class, 'addSupplierProduct']);
                Route::post("/delete-product", [\App\Http\Controllers\Admin\SupplierController::class, 'deleteSupplierProduct']);
            });
            Route::group(["prefix" => "inventories"], function () {
                Route::get("/", [\App\Http\Controllers\Admin\InventoryController::class, 'index']);
                Route::get("/list-expired", [\App\Http\Controllers\Admin\InventoryController::class, 'listExpiredProduct']);
                Route::get("/out-of-stock", [\App\Http\Controllers\Admin\InventoryController::class, 'listOutOfStock']);
                Route::post("/ordered-success", [\App\Http\Controllers\Admin\InventoryController::class, 'orderedSuccess']);
                Route::post("/request-outofstock", [\App\Http\Controllers\Admin\InventoryController::class, 'requestOutOfStock']);
            });
            Route::group(["prefix" => "orders"], function () {
                Route::get('/{id}/product', [\App\Http\Controllers\Admin\OrderController::class, 'index']);
//            Route::get('/{id}/product/confirm', [\App\Http\Controllers\Admin\OrderController::class, 'confirmOrder']);
                Route::post('/add-order', [\App\Http\Controllers\Admin\OrderController::class, 'store']);
                Route::post('/verify-order', [\App\Http\Controllers\Admin\OrderController::class, 'verifyOrder']);
                Route::post('/un-confirm-order', [\App\Http\Controllers\Admin\OrderController::class, 'unConfirmOrder']);
                Route::post('/received-order', [\App\Http\Controllers\Admin\OrderController::class, 'receivedOrder']);
                Route::get("/list-expired", [\App\Http\Controllers\Admin\InventoryController::class, 'listExpiredProduct']);
                Route::get("/out-of-stock", [\App\Http\Controllers\Admin\InventoryController::class, 'listOutOfStock']);
            });
            Route::group(["prefix" => "list-orders"], function () {
                Route::get('/', [\App\Http\Controllers\Admin\OrderController::class, 'listOrder']);
//                Route::post('/add-order', [\App\Http\Controllers\Admin\OrderController::class, 'store']);
                Route::post('/verify-order', [\App\Http\Controllers\Admin\OrderController::class, 'verifyOrder']);
                Route::get("/list-expired", [\App\Http\Controllers\Admin\InventoryController::class, 'listExpiredProduct']);
                Route::get("/out-of-stock", [\App\Http\Controllers\Admin\InventoryController::class, 'listOutOfStock']);
            });
            Route::group(["prefix" => "products"], function () {
                Route::get("/", [\App\Http\Controllers\Admin\ProductController::class, 'index']);
                Route::get("/add-product", [\App\Http\Controllers\Admin\ProductController::class, 'addProductForm']);
                Route::get("/{id}/price-product", [\App\Http\Controllers\Admin\ProductController::class, 'priceProductIndex']);
                Route::get("/get-product-id", [\App\Http\Controllers\Admin\ProductController::class, 'getProductIdByProductCode']);
                Route::post("/add-product", [\App\Http\Controllers\Admin\ProductController::class, 'store']);
                Route::post("/update-price", [\App\Http\Controllers\Admin\ProductController::class, 'updatePrice']);
                Route::get("/{id}/edit", [\App\Http\Controllers\Admin\ProductController::class, 'edit']);
                Route::post("/edit-product", [\App\Http\Controllers\Admin\ProductController::class, 'handleEdit']);
                Route::get("/detail", [\App\Http\Controllers\Admin\ProductController::class, 'detail']);
                Route::post("/delete", [\App\Http\Controllers\Admin\ProductController::class, 'destroy']);
            });
        });
    });

    //Router User
    Route::get("/production-batch", [\App\Http\Controllers\Admin\OrderController::class, 'productionBatchIndex']);
    Route::get("/categories", [\App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::group(["prefix" => "inventories"], function () {
        Route::get("/", [\App\Http\Controllers\Admin\InventoryController::class, 'index']);
        Route::get("/list-expired", [\App\Http\Controllers\Admin\InventoryController::class, 'listExpiredProduct']);
        Route::get("/out-of-stock", [\App\Http\Controllers\Admin\InventoryController::class, 'listOutOfStock']);
    });
    Route::group(["prefix" => "customer"], function () {
        Route::get("/", [\App\Http\Controllers\PosController::class, 'index']);
        Route::post("/add", [\App\Http\Controllers\PosController::class, 'addCustomer']);
        Route::post("/edit/{id}", [\App\Http\Controllers\PosController::class, 'editCustomer']);
        Route::get("/delete", [\App\Http\Controllers\PosController::class, 'deleteCustomer']);
        Route::get("/search", [\App\Http\Controllers\PosController::class, 'searchCustomer']);
    });
    Route::post("/admin/inventories/ordered-success", [\App\Http\Controllers\Admin\InventoryController::class, 'orderedSuccess']);
    Route::post("/admin/inventories/request-outofstock", [\App\Http\Controllers\Admin\InventoryController::class, 'requestOutOfStock']);

    Route::get("/products", [\App\Http\Controllers\Admin\ProductController::class, 'index']);
    Route::get("/suppliers", [\App\Http\Controllers\Admin\SupplierController::class, 'index']);
    Route::get("/admin/suppliers/{id}/detail", [\App\Http\Controllers\Admin\SupplierController::class, 'detail']);
    Route::get("/admin/suppliers/get-product", [\App\Http\Controllers\Admin\SupplierController::class, 'getAllProduct']);

    Route::get('/user-profile', [\App\Http\Controllers\Admin\UserController::class, 'userProfile']);
    Route::get('/pos', [\App\Http\Controllers\PosController::class, 'index']);
    Route::get('/pos/search', [\App\Http\Controllers\PosController::class, 'search']);
    Route::post('/read-notification', [\App\Http\Controllers\Admin\OrderController::class, 'readNotification']);

    Route::get('/admin/orders/{id}/product', [\App\Http\Controllers\Admin\OrderController::class, 'index']);
    Route::post('/admin/orders/add-order', [\App\Http\Controllers\Admin\OrderController::class, 'store']);

    Route::post("/admin/users/edit-info", [\App\Http\Controllers\Admin\UserController::class, 'handleEditInfo']);
    Route::post("/admin/users/update-avatar", [\App\Http\Controllers\Admin\UserController::class, 'handleUpdateAvatar']);
});
