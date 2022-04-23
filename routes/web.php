<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\Admin\Beranda;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\Datacontroller;
use App\Http\Controllers\Admin\PenulisController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MoviesController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [BerandaController::class,'index'])->name('home');
Route::get('/buku', [BerandaController::class,'buku'])->name('search');
Route::get('cari', [BerandaController::class,'loadData']);
Route::get('/buku/{id}', [BerandaController::class,'show'])->name('buku');

Route::get('/categories', [CategoryController::class,'index'])->name('categories');
Route::get('/categories/{category:slug}', [CategoryController::class,'show'])->name('category');


Route::post('/buku/pinjam/{id}', [BerandaController::class,'pinjam'])->name('buku.pinjam')->middleware('auth:sanctum');

Route::resource('movies', MoviesController::class);
Route::resource('actors', ActorsController::class);
Route::get('/actors/page/{page?}', [ActorsController::class,'index']);




Route::group(['prefix' => 'admin','middleware' => ['role:admin']], function () {
    Route::get('/', [Beranda::class,'index'])->name('beranda');
    Route::get('penulis', [PenulisController::class,'index'])->name('penulis.index');
    Route::get('penulis/create', [PenulisController::class,'create'])->name('penulis.create');
    Route::get('penulis/{penuli:slug}/edit', [PenulisController::class,'edit'])->name('penulis.edit');
    Route::patch('penulis/{penuli:slug}/update', [PenulisController::class,'update'])->name('penulis.update');
    Route::delete('penulis/{penuli:slug}/destroy', [PenulisController::class,'destroy'])->name('penulis.destroy');
    // Route::resource('penulis', PenulisController::class);
    Route::resource('buku', BooksController::class);
    Route::get('penulis/data', [Datacontroller::class,'penulis'])->name('penulis.data');

    Route::get('daftarpinjam', [Beranda::class,'daftar_pinjam'])->name('daftarpinjam');
    Route::get('listpinjam', [Beranda::class,'list_pinjam'])->name('listpinjam');
    Route::get('history_borrow', [Beranda::class,'history_borrow'])->name('history');
    Route::get('history_user', [Beranda::class,'history_user'])->name('history_user');
    Route::patch('returnBook/{id}', [Beranda::class,'returnBook'])->name('returnBook');

    Route::get('absensi', [AbsensiController::class,'index'])->name('absensi');
    Route::post('absensi', [AbsensiController::class,'store'])->name('attendance');
    // Route::resource('absensi', AbsensiController::class);
});


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');