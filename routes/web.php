<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});


*/
// Route::view('/', 'welcome');

Route::get('/', function () {
    return view('welcome');
})->name('begin');

// Route::get('/dash', function () {
//     return view('teacher.dashboard');
// });



// Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
//     Route::get('home', 'AdminController@index')->name('adminHome');
//     Route::get('absence', 'AdminController@absence')->name('adminAbsence');
// });

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::view('home', 'auth.home')->name('adminHome');
    Route::view('absence', 'auth.absence')->name('adminAbsence');
});

Route::group(['prefix' => 'teacher', 'as' => 'teacher.'], function () {
    Route::get('dash', [TeacherController::class, 'index'])->name('TeachDash');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Page not found
Route::fallback(function () {
    return view('page404');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
