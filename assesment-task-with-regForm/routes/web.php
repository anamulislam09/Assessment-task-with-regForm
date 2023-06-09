<?php

use App\Http\Controllers\RegistrationController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[RegistrationController::class,'index']);
Route::post('/getDistrict',[RegistrationController::class,'getDistrict']);
Route::post('/getUpozilla',[RegistrationController::class,'getUpozilla']);
//__Registration route__//
Route::post('/register',[RegistrationController::class,'store'])->name('register');

Route::post('/editemployee/{id}',[RegistrationController::class,'edit'])->name('editemployee');
Route::post('/update-employee',[RegistrationController::class,'update'])->name('updateemployee');

Route::delete('/delete-employee/{id}',[RegistrationController::class,'destroy'])->name('deleteemployee');
