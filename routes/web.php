<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin', function () {
    return view('admin.index');
})->middleware('auth');

Route::get('/loandetails',[App\Http\Controllers\LoanDetailsController::class,'index']);
Route::get('/emidetails',[App\Http\Controllers\EmiDetailsController::class,'index']);
Route::post('/loanprocess',[App\Http\Controllers\LoanDetailsController::class,'processData'])->name('loan.processData');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/loanprocess',[App\Http\Controllers\LoanDetailsController::class,'processDataView']);

Route::get('/custom-login', [App\Http\Controllers\Auth\LoginController::class, 'loginView']);
Route::post('/custom-login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('custom-login');