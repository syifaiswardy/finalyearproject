<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepageControl;
use App\Http\Controllers\bookingPage;
use App\Http\Controllers\calendarTest;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get("/",[homepageControl::class,"index"]);
Route::get("/booking",[bookingPage::class,"index2"]);
Route::get("/bookform",[bookingPage::class,"add_data"]);

Route::get("/redirect",[homepageControl::class,"redirectFunct"]);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
