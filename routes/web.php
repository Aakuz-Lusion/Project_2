<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;  // ← ADD THIS LINE
use App\Http\Controllers\HomeController;     // ← ADD THIS LINE TOO

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/landing', function(){
    return view('landing');
})->middleware('auth');

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/landing');
    }
    return redirect('/login');
});

Route::get('/teacher', function(){
    return view('Teacher');
})->middleware('auth');

Route::get('/teachers', [TeacherController::class, 'index']);  // ← Now this works!

Route::get('/test', function() {
    return 'Hello World!';
});