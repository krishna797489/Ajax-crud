<?php

use App\Http\Controllers\StudentController;
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
    return view('welcome');
});
Route::get('/add-student', function () {
    return view('form');
});
Route::get('get-students', function () {
    return view('students');
});
Route::post('add-student',[StudentController::class,'addStudent'])->name('addStudent');
Route::get('list-student',[StudentController::class,'listStudent'])->name('listStudent');
