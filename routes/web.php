<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('customers', CustomerController::class);

Route::resource('customers.records', RecordController::class);

// 日付取得のための記録
Route::get('records-fetch-route', [RecordController::class, 'fetchByDate']);

// Route::get('/api/records/{start}/{end}', [RecordController::class, 'getRecordsByDateRange']);
Route::get('/api/{customerId}/records/{start}/{end}', [RecordController::class, 'getRecordsByDateRange']);

// カレンダー実装
Route::get('/api/records/{date}', 'RecordController@getRecordsByDate');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
