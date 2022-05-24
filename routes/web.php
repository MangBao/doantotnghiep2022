<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\GiangVien;
use App\Http\Controllers\LichThiSVController;


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

Route::get('/', [
    'as' => 'homepage',
    'uses' => LichThiSVController::class . '@homepage'
]);

Route::get('/logout', function () {
    GiangVien::find(Auth::user()->id)->update([
        'trangthaihoatdong' => 0,
    ]);
    Auth::logout();
    return redirect('/');
});

Route::view('home', 'home')
	->name('home')
	->middleware(['auth']);

Route::view('profile', 'profile.edit')
	->name('profile.edit')
	->middleware(['auth']);
