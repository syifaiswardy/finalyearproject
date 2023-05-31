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
Route::get("/calendarForm",[bookingPage::class,"index2"]);
Route::post('fullcalenderAjax', [bookingPage::class, 'ajax']);

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
Route::get("/editBookType/{id}",[bookingTypeControl::class,"editBookType"]);
Route::post("/updateBookType",[bookingTypeControl::class,"updateBookType"]);
Route::get("/addBookTypes",[bookingTypeControl::class,"showAddBookTypes"]);
Route::post("/recordedBookTypes",[bookingTypeControl::class,"storeAddBookTypes"]);
Route::get("/deleteBookType/{id}",[bookingTypeControl::class,"deleteBookTypes"]);
Route::delete("/destroyBookType/{id}", [bookingTypeControl::class, "destroyBookTypes"])->name('destroyBookType');

Route::get("/room",[roomControl::class,"showRoom"]);
Route::get("/addRoom",[roomControl::class,"showAddRoom"]);
Route::post("/recordedRoom",[roomControl::class,"storeAddRoom"]);
Route::get("/editRoom/{id}",[roomControl::class,"editRoom"]);
Route::post("/updateRoom",[roomControl::class,"updateRoom"]);
Route::get("/deleteRoom/{id}",[roomControl::class,"deleteRoom"]);
Route::delete("/destroyRoom/{id}", [roomControl::class, "destroyRoom"])->name('destroyRoom');

Route::get("/equipment",[equipControl::class,"showEquip"]);
Route::get("/addEquipment",[equipControl::class,"showAddEquip"]);
Route::post("/recordedEquip",[equipControl::class,"storeAddEquip"]);
Route::get("/editEquip/{id}",[equipControl::class,"editEquip"]);
Route::post("/updateEquip",[equipControl::class,"updateEquip"]);
Route::get("/deleteEquip/{id}",[equipControl::class,"deleteEquip"]);
Route::delete("/destroyEquip/{id}", [equipControl::class, "destroyEquip"])->name('destroyEquip');


Route::get("/user",[customerControl::class,"showCust"]);
Route::get("/editUser/{id}",[customerControl::class,"editUser"]);
Route::post("/updateUser",[customerControl::class,"updateUser"]);

Route::get("/custbook",[custBookingControl::class,"showBook"]);
Route::get("/addCustBook",[custBookingControl::class,"showAddBook"]);
Route::get("/editCustBook/{id}",[custBookingControl::class,"editCustBook"]);
Route::post("/update",[custBookingControl::class,"updateCustBook"]);
Route::get("/deleteCustBook/{id}",[custBookingControl::class,"deleteCustBook"]);
Route::delete("/destroyCustBook/{id}", [custBookingControl::class, "destroyCustBook"])->name('destroyCustBook');




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
