<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepageControl;
use App\Http\Controllers\bookingPage;
use App\Http\Controllers\bookingTypeControl;
use App\Http\Controllers\roomControl;
use App\Http\Controllers\equipControl;
use App\Http\Controllers\customerControl;
use App\Http\Controllers\custBookingControl;
use App\Http\Controllers\profilePage;
use App\Http\Controllers\calendarControl;

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
// Route::get("/booking",[bookingPage::class,"show"]);
Route::get("/bookform",[bookingPage::class,"show"])->middleware('auth');
Route::post("/recorded",[bookingPage::class,"store"]);
// Route::get('/profile', [profilePage::class, 'showProfile']);
Route::get('/profile', [profilePage::class, 'showBooking'])->middleware('auth');
// Route::post('/uploadfile', [profilePage::class, 'storeFile'])->middleware('auth');
Route::get('/upload/{id}',[profilePage::class,'edit']);
Route::put('/update/{id}',[profilePage::class,'uploadFile']);

//admin
Route::get("/bookingtype",[bookingTypeControl::class,"show"]);
Route::get("/room",[roomControl::class,"showRoom"]);
Route::get("/equipment",[equipControl::class,"showEquip"]);
Route::get("/user",[customerControl::class,"showCust"]);
Route::get("/editUser/{id}",[customerControl::class,"editUser"]);
Route::post("/updateUser",[customerControl::class,"updateUser"]);

Route::get("/custbook",[custBookingControl::class,"showBook"]);
Route::get("/addCustBook",[custBookingControl::class,"showAddBook"]);
Route::get("/editCustBook/{id}",[custBookingControl::class,"editCustBook"]);
Route::post("/update",[custBookingControl::class,"updateCustBook"]);

Route::post("/recordedAdmin",[custBookingControl::class,"store"]);

Route::get("/calendar",[calendarControl::class,"showCalendar"]);


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
