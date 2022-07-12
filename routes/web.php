<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TimetableController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});

//Auth routes -->
Auth::routes();

// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


Route::get('student/dashboard', [HomeController::class, 'isStudent'])->name('student');

Route::get('teacher/dashboard', [HomeController::class, 'isTeacher'])->name('teacher');

Route::get('admin/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('is_admin'); 

Route::get('logout', [HomeController::class, 'logout'])->name('logout');


Route::post('room/action', [RoomController::class, 'action'])->name('room.action');


//Dashboards routes -->
Route::resource('room',RoomController :: class);

Route::resource('course',CoursesController :: class);

Route::resource('professor',ProfessorController :: class);

Route::resource('class',ClassesController::class);

Route::resource('period',PeriodController::class);

// TimeTable generation -- routes
Route::resource('timetable',TimetableController::class);

