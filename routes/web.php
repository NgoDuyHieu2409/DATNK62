<?php

use App\Http\Controllers\TableWaitingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookTableController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageBillController;

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


// Route::get('/datban', [TableWaitingController::class, 'index'])->middleware(['auth'])->name('datban');
Route::get('/datban', [TableWaitingController::class, 'index'])->name('datban');

Route::get('/danhsach/{id?}',[BookTableController::class, 'index'])->name('danhsach');
Route::post('/danhsach/{id?}',[BookTableController::class, 'store'])->name('saveproduct');

Route::post('/getProduct', [BookTableController::class, 'getProduct']);
Route::get('/getProduct', [BookTableController::class, 'getProduct']);

require __DIR__.'/auth.php';

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    
    Route::get('admin-books', [AdminBookController::class, 'index'])->name('admin.book');
    Route::get('list',[ManageBillController::class, 'getProduct']);
    Route::post('update/{id?}',[ManageBillController::class, 'update'])->name('update');
    Route::get('/manage-bills',[ManageBillController::class, 'index'])->name('voyager.manage-bills.index');
    Route::post('/manage-bills/update/{id?}',[ManageBillController::class, 'UOrderDetail'])->name('admin.manage-bills.updateOrderDetail');
    


    Route::get('/active/{id?}/{tableId?}', [ManageBillController::class, 'active'])->name('cate.active');
    // Route::get('/unacive/{cate_id}', [CategoryController::class, 'unactive'])->name('cate.unactive');
    
    // Route::get('/', [DashboardController::class, 'index']);

});
