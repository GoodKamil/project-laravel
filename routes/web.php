<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\MainPage;
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

Route::get('/', [MainPage::class,'__invoke'])
    ->name('home.mainPage');

Route::get('/user',[UserController::class,'index'])
    ->name('admin.index');

Route::get('/edit/{idU}',[UserController::class,'edit'])
    ->name('admin.edit');

Route::get('/show/{idU}',[UserController::class,'show'])
    ->name('admin.show');

Route::get('/delete',[UserController::class,'delete'])
    ->name('admin.delete');

Route::get('/create',[UserController::class,'create'])
    ->name('admin.addUser');

Route::post('/store',[UserController::class,'store'])
    ->name('admin.store');

Route::post('/update/{idU}',[UserController::class,'update'])
    ->name('admin.update');
