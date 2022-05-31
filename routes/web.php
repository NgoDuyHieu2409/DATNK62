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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/gioithieu', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('a');

// Route::get('/dichvu', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('b');


Route::get('/dashboard#service', function(){
    return view('dashboard');
})->middleware(['auth'])->name('a');
Route::get('/dashboard#dichvu', function(){
    return view('dashboard');
})->middleware(['auth'])->name('b');

Route::get('/datban', function(){
    return view('dashboard');
})->middleware(['auth'])->name('datban');

require __DIR__.'/auth.php';

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
