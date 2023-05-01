<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepageControl;
use App\Http\Controllers\bookingPage;
use App\Http\Controllers\bookingTypeControl;
use App\Http\Controllers\roomControl;
use App\Http\Controllers\equipControl;
use App\Http\Controllers\customerControl;
use App\Http\Controllers\custBookingControl;

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

//guest
Route::get("/",[homepageControl::class,"index"]);
//customer and guest
Route::get("/booking",[bookingPage::class,"index2"]);
// Route::get("/bookform",[bookingPage::class,"add_data"]);

//admin
Route::get("/bookingtype",[bookingTypeControl::class,"show"]);
Route::get("/room",[roomControl::class,"showRoom"]);
Route::get("/equipment",[equipControl::class,"showEquip"]);
Route::get("/customer",[customerControl::class,"showCust"]);
Route::get("/custbook",[custBookingControl::class,"showBook"]);


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
