<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class,'signupForm'])->name('signupform');
Route::post('/signup', [AuthController::class,'signup'])->name('signup');
Route::get('/signin', [AuthController::class,'signinForm'])->name('signinform');
Route::post('/signin', [AuthController::class,'signin'])->name('login');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/addproject',[ProjectController::class,'addproject'])->name('addproject')->middleware('auth');
Route::post('/storeproject',[ProjectController::class,'storeproject'])->name('storeproject')->middleware('auth');
Route::get('/addtask',[TaskController::class,'addTask'])->name('addtask')->middleware('auth');
Route::post('/storetask',[TaskController::class,'storeTask'])->name('storetask')->middleware('auth');
Route::get('/edit_project/{id}',[ProjectController::class,'edit_project'])->name('edit_project')->middleware('auth');
Route::put('/update_project/{id}',[ProjectController::class,'update_project'])->name('update_project')->middleware('auth');
Route::get('/delete_project/{id}',[ProjectController::class,'delete_project'])->name('delete_project')->middleware('auth');
Route::get('/edit_task/{id}',[TaskController::class,'edit_task'])->name('edit_task')->middleware('auth');
Route::put('/update_task/{id}',[TaskController::class,'update_task'])->name('update_task')->middleware('auth');
Route::get('/delete_task/{id}',[TaskController::class,'delete_task'])->name('delete_task')->middleware('auth');
Route::get('/change_tenant/{id}',[TenantController::class,'changeTenant'])->name('change_tenant')->middleware('auth');
Route::post('/store',[UserController::class,'store'])->name('users.store')->middleware('auth');
Route::get('invitations/{token}',[UserController::class,'acceptInvitation'])->name('invitations.accept');