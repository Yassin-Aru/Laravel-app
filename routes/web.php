<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\SeanceController;

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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('home', [AdminController::class, 'index'])->name('adminHome');
});

Route::group(['prefix' => 'teacher', 'as' => 'teacher.'], function () {
    Route::get('dash', [TeacherController::class, 'index'])->name('TeachDash');
    Route::post('update-absence', [TeacherController::class, 'updateAbsence'])->name('update-absence');


});



Route::resource('admin',AdminController::class)->except([
    'create', 'edit', 'update', 'index'
]);
// This one is for updating
Route::put('admin', [AdminController::class, 'update'])->name('admin.update');
Route::post('/excuse/update/{id}', [AdminController::class, 'updateExcuse'])->name('update_excuse');




// Routes for Groups
Route::resource('group',GroupController::class)->except([
    'create', 'edit', 'update','index'
]);


// Route for Seance
Route::resource('seance',SeanceController::class)->except([
    'create', 'edit', 'update','index'
]);

// For Stagiaires
// Routes for Groups
Route::resource('stagiaire',StagiaireController::class)->except([
    'create', 'edit', 'update','index'
]);
Route::post('/stagiaire/update/{id}', [StagiaireController::class, 'update'])->name('update_stagiaire');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Page not found
Route::fallback(function () {
    return view('page404');
});