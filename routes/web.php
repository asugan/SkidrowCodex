<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;

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

Route::get('/',[App\Http\Controllers\CategoryController::class, 'index'])->name('welcome');
Route::get('/about', function () {return view('about');})->name('about');
Route::get('/FAQ', function () {return view('FAQ');})->name('FAQ');
Route::get('/contact', function () {return view('contact');})->name('contact');
Route::get('search',[App\Http\Controllers\SearchController::class, 'Search'])->name('search');
Route::get('/category/{categoryid}',[App\Http\Controllers\CategoryController::class, 'catcat'])->name('category');
Route::get('/{post}',[App\Http\Controllers\CategoryController::class, 'show'])->name('postname');
Route::post('/store/{post}/{id}',[App\Http\Controllers\CategoryController::class, 'save_comment']);