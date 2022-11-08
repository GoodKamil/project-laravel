<?php

use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\SuperEmployee\TaskController as EmployeeTask;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SuperEmployee\UserController as EmployeeUser;
use App\Http\Controllers\Auth\CheckEmailController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Home\MainPage;
use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware'=>['auth']],function(){
    Route::group(['middleware'=>['can:isAdmin']],function(){
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
        Route::get('/taskStore',[TaskController::class,'create'])
            ->name('admin.task.create');
        Route::post('/taskStore',[TaskController::class,'store'])
            ->name('admin.task.store');
        Route::get('/taskShow',[TaskController::class,'index'])
            ->name('admin.task.index');
        Route::get('/taskUpdate/{idT}',[TaskController::class,'edit'])
            ->name('admin.task.edit');
        Route::post('/taskUpdate/{idT}',[TaskController::class,'update'])
            ->name('admin.task.update');
    });

    Route::group(['middleware'=>['can:isSuperEmployee']],function(){
        Route::get('/task',[EmployeeTask::class,'index'])
            ->name('super.task.index');
        Route::get('/taskCreate',[EmployeeTask::class,'create'])
            ->name('super.task.create');
        Route::post('/taskCreate',[EmployeeTask::class,'store'])
            ->name('super.task.store');
        Route::get('/users',[EmployeeUser::class,'index'])
            ->name('super.users.index');

    });


    Route::get('/', [MainPage::class,'__invoke'])
        ->name('home.mainPage')
        ->middleware('auth');
});





Route::group(['middleware'=>'guest'],function(){
Route::get('/checkEmail',[CheckEmailController::class,'showCheckEmailForm'])->name('admin.checkEmail');
Route::post('/checkEmail',[CheckEmailController::class,'checkEmailIsExists'])->name('auth.checkEmailIsExists');
Route::post('/register',[RegisterController::class,'register'])->name('auth.register');
});

Auth::routes();

