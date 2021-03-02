<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BookingController;
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
    return redirect('/address');
});

Route::get('/address', [AddressController::class, 'index'])->name('address');
Route::post('/address/store', [ AddressController::class, 'store' ]);
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
