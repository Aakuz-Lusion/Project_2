<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route ::get('landing',function(){
    return view('landing');
})->middleware('auth');

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/landing');
    }
    return redirect('/login');
});