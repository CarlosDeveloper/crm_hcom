<?php

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
})->middleware('translate');

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */
//require __DIR__.'/auth.php';



Route::get('/lang/{language}', function ($language) {
    Session::put('language',$language);
    return redirect()->back();
})->name('language');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('translate');
Route::resource('companies',  App\Http\Controllers\CompanieController::class)->middleware('translate');

Route::resource('employees', App\Http\Controllers\EmployeeController::class)->middleware('translate');
