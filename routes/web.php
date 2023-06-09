<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[ProductController::class,'index'])->name('index');
Route::post('/',[ProductController::class,'store'])->name('product.store');
 Route::post('/update-product',[ProductController::class,'update'])->name('product.update');
 Route::get('/user',[UserController::class,'user'])->name('user');
 Route::get('/add-user',[UserController::class,'addUser']);
 Route::post('/add-user',[UserController::class,'add'])->name('add');

Route::get('/teacher',[TeacherController::class,'index'])->name('teacher.index');
Route::get('/teacher/create',[TeacherController::class,'create'])->name('teacher.create');
Route::post('/teacher/create',[TeacherController::class,'store'])->name('teacher.store');

