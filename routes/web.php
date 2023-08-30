<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Customer;

Route::get('/', function () {
    return view('welcome');
});
//product dashboard
Route::get('product-list', [ProductController::class, 'index']);
Route::get('product-add', [ProductController::class, 'add']);
Route::get('product-delete/{id}', [ProductController::class, 'delete']);
Route::get('product-edit', [ProductController::class, 'edit']);
Route::post('product-update', [ProductController::class, 'update']);
Route::post('product-save', [ProductController::class, 'save'] );

//admin dashboard
Route::get('admin/index', [AdminController::class, 'dashboard']);
Route::get('admin/login', [AdminController::class, 'login']);
Route::get('admin/login', [AdminController::class, 'login'])->name('admin-login');
Route::post('admin/loginProcess', [AdminController::class, 'loginProcess']);

//category dashboard
Route::get('category-list', [CategoryController::class, 'index']);
Route::get('category-add', [CategoryController::class, 'add']);
Route::get('category-delete/{id}', [CategoryController::class, 'delete']);
Route::get('category-edit', [CategoryController::class, 'edit']);
Route::post('category-update', [CategoryController::class, 'update']);
Route::post('category-save', [CategoryController::class, 'save'] );

//branch dashboard
Route::get('branch-list', [BranchController::class, 'index']);
Route::get('branch-add', [BranchController::class, 'add']);
Route::get('branch-delete/{id}', [BranchController::class, 'delete']);
Route::get('branch-edit', [BranchController::class, 'edit']);
Route::post('branch-update', [BranchController::class, 'update']);
Route::post('branch-save', [BranchController::class, 'save']);

// //customer dashboard
Route::get('customer/index', [CustomerController::class, 'index'] );
Route::get('customer-add', [CustomerController::class, 'add']);
Route::get('customer-edit/{id}', [CustomerController::class, 'edit']);
Route::get('customer-update', [CustomerController::class, 'update']);
Route::get('customer-delete/{id}', [CustomerController::class, 'delete']);
Route::get('customer/login', [CustomerController::class, 'login']);
Route::get('customer/register', [CustomerController::class, 'register']);
Route::post('customer/loginProcess', [CustomerController::class, 'loginProcess'] )->name('customer-processlogin');
Route::post('register-save', [CustomerController::class, 'registersave'] )->name('customer-registersave');
Route::get('admin/customer-list', [CustomerController::class, 'customer']);
