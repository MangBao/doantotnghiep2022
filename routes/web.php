<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\GiangVien;
use App\Http\Controllers\LichThiSVController;
use App\Http\Controllers\SendMailController;


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
Route::get('/homepage', [
    'as' => 'homepage',
    'uses' => LichThiSVController::class . '@homepage'
]);
Route::get('/logout', function () {
    if(isset(Auth::user()->id)){
        unset(Auth::user()->route_name);
        unset(Auth::user()->route_active);
        GiangVien::find(Auth::user()->id)->update([
            'trangthaihoatdong' => 0,
        ]);
    }

    Auth::logout();
    return redirect('/homepage');
});

Route::get('/send', [
    'as' => 'send',
    'uses' => SendMailController::class . '@send'
]);

Route::view('lienhe', 'lienhe')->name('lienhe');

Route::view('home', 'home')
	->name('home')
	->middleware(['auth', 'sinhvien']);

Route::view('profile', 'profile.edit')
	->name('profile.edit')
	->middleware(['auth', 'sinhvien']);
