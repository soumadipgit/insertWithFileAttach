<?php

use App\Http\Controllers\Usercontroller;
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



Route::get('/',[Usercontroller::class,'userLoad']);
Route::post('/user-add',[Usercontroller::class,'userAdd'])->name('userAdd');
Route::get('mailtest',[Usercontroller::class,'mailTest']);
