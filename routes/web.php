<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
//homeController
Route::get('/',[HomeController::class,"index"]);
Route::get('/home',[HomeController::class,"redirect"])->middleware('auth','verified');
Route::post('/appontment',[HomeController::class,"appontment"]);
Route::get('/myappointment',[HomeController::class,"myappointment"]);
Route::get('/cancel_appointment/{id}',[HomeController::class,"cancel_appointment"]);


// AdminController
Route::get("/add_new_doctors",[AdminController::class,"add_new_doctors"]);
Route::post('/add_doctor',[AdminController::class,"add_doctor"]);
// Route::get('/add_doctor',[AdminController::class,"show_doctor"]);
Route::get('/delect_doctor/{id}',[AdminController::class,"delect_doctor"]);
Route::get('/update_doctor/{id}',[AdminController::class,"update_doctor"]);
Route::post('/edit_update_doctor/{id}',[AdminController::class,"edit_update_doctor"]);
Route::get('/appointment',[AdminController::class,"appointment"]);
Route::get('/remove_appointment/{id}',[AdminController::class,"remove_appointment"]);
Route::get('/approve/{id}',[AdminController::class,"approve"]);
Route::get('/cancel/{id}',[AdminController::class,"cancel"]);
Route::get('/email/{id}',[AdminController::class,"email"]);
Route::post('/send_email/{id}',[AdminController::class,"send_email"]);









Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
