<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

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

// Load view đăng nhập
Route::get('/', function () {
    return view('front-end.index');
});

// Xử lý form đăng nhập
Route::post('/login_process', [AccountController::class, 'Login_Process']);

// Chuyển qua giao diện admin
Route::get('/admin/index', function () {
    return view('admin.index');
});
