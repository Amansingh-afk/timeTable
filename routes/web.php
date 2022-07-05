<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\RoomController;
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

Route::get('/', function () {
    return view('auth.login');
});
//Auth routes -->
Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('registration', [AuthController::class, 'registration'])->name('register');

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


//Dashboards routes -->
Route::resource('room',RoomController :: class);

Route::resource('course',CoursesController :: class);

Route::resource('professor',ProfessorController :: class);

Route::resource('class',ClassesController::class);

Route::resource('period',PeriodController::class);

