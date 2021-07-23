<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\FacultyControllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\StudentExamController;
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
Route::get('/',[UniversityController::class,'index']);
Route::get('/login',[UserController::class,'login']);
Route::get('/logout',[UserController::class,'logout']);
Route::get('/check',[UserController::class,'loginCheck']);
Route::get('/users/create/{fid}', [UserController::class,'createStudent']);
Route::resource('/universities',UniversityController::class);
Route::resource('/faculties',FacultyControllers::class);
Route::resource('/departments',DepartmentController::class);
Route::resource('/users',UserController::class);
Route::resource('/courses',CourseController::class);
Route::resource('/news',NewsController::class);
Route::resource('/exams',ExamController::class);
Route::resource('/studentexams',StudentExamController::class);

