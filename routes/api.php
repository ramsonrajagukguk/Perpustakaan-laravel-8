<?php

use App\Http\Controllers\Api\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route::get('/books', [BookController::class,'index'])->name('books');

Route::get('/books/search/{judul}', [BookController::class,'search'])->name('search');
Route::resource('books',BookController::class);

Route::get('/books/{book}', [BookController::class,'show'])->name('books.show');
Route::post('/books', [BookController::class,'store'])->name('books.store');
Route::middleware(['auth:sanctum'])->group(function () {
    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});