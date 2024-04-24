<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvItemController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/items', [InvItemController::class, 'index'])->name('items.index');
Route::get('/items/getItemCode/{bu_id}', [InvItemController::class, 'getItemCode']);
Route::get('/items/getData/{bu_id}', [InvItemController::class, 'getData']);
Route::post('/items', [InvItemController::class, 'store'])->name('items.store');
