<?php

use App\Http\Controllers\AdminOrSuperEmployee\TaskController;
use App\Http\Controllers\AdminOrSuperEmployee\UserController;
use App\Http\Controllers\Users\UserDataController;
use App\Http\Controllers\Employee\UserController as Employee;
use App\Http\Controllers\Employee\TaskController as EmployeeTasks;
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

    Route::group(['middleware'=>['can:isAdmin']],function() {
         Route::delete('/delete/{id}',[UserController::class,'delete']);
    });


    Route::group(['middleware'=>['can:isAdminOrSuperEmployee']],function(){
        Route::get('/user',[UserController::class,'index'])
            ->name('AdminOrSuperEmployee.index');
        Route::get('/show/{idU}',[UserController::class,'show'])
            ->name('AdminOrSuperEmployee.show');
        Route::get('/create',[UserController::class,'create'])
            ->name('AdminOrSuperEmployee.addUser');
        Route::post('/store',[UserController::class,'store'])
            ->name('AdminOrSuperEmployee.store');
        Route::post('/update/{idU}',[UserController::class,'update'])
            ->name('AdminOrSuperEmployee.update');
        Route::get('/taskStore',[TaskController::class,'create'])
            ->name('AdminOrSuperEmployee.task.create');
        Route::post('/taskStore',[TaskController::class,'store'])
            ->name('AdminOrSuperEmployee.task.store');
        Route::get('/taskShow',[TaskController::class,'index'])
            ->name('AdminOrSuperEmployee.task.index');
        Route::delete('/deleteTask/{id}',[TaskController::class,'delete']);
        Route::get('/taskUpdate/{idT}',[TaskController::class,'edit'])
            ->name('AdminOrSuperEmployee.task.edit');
        Route::post('/taskUpdate/{idT}',[TaskController::class,'update'])
            ->name('AdminOrSuperEmployee.task.update');
        Route::get('/edit/{idU}',[UserController::class,'edit'])
            ->name('AdminOrSuperEmployee.edit');
    });



    Route::group(['middleware'=>['can:isSuperEmployee']],function() {
        Route::get('/delete', [UserController::class, 'delete'])
            ->name('AdminOrSuperEmployee.delete');
    });


   Route::group(['middleware'=>['can:isEmployee']],function(){
      Route::get('/userTasks',[EmployeeTasks::class,'index'])
          ->name('employee.task.index');
       Route::get('/showTask/{id}',[EmployeeTasks::class,'show'])
           ->name('employee.task.show');
       Route::post('/handOverTheTask',[EmployeeTasks::class,'handOverTheTask'])
           ->name('employee.task.handOverTheTask');
   });


    Route::get('/showProfile',[UserDataController::class,'show'])
        ->name('users.data.show');
    Route::get('/userDataShow',[UserDataController::class,'updateDataUser'])
        ->name('users.data.updateDataUser');
    Route::post('/userDataShow',[UserDataController::class,'doUpdateDataUser'])
        ->name('users.data.doUpdateDataUser');
    Route::post('/createUserDataShow',[UserDataController::class,'store'])
        ->name('users.data.store');
    Route::get('/createUserDataShow',[UserDataController::class,'create'])
        ->name('users.data.createDataUser');


    Route::get('/', [MainPage::class,'__invoke'])
        ->name('home.mainPage');
});





Route::group(['middleware'=>'guest'],function(){
Route::get('/checkEmail',[CheckEmailController::class,'showCheckEmailForm'])->name('admin.checkEmail');
Route::post('/checkEmail',[CheckEmailController::class,'checkEmailIsExists'])->name('auth.checkEmailIsExists');
Route::post('/register',[RegisterController::class,'register'])->name('auth.register');
});

Auth::routes();

