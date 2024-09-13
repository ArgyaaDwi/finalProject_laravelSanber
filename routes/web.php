<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;

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
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    // Route untuk CRUD buku
    Route::get('/book/create',  [BookController::class, 'addBook'])->name('book.create');
    Route::post('/book',  [BookController::class, 'saveBook'])->name('book.store');
    Route::get('/book/{id}/edit',  [BookController::class, 'editBook'])->name('book.edit');
    Route::put('/book/{id}',  [BookController::class, 'updateBook'])->name('book.update');
    Route::delete('/book/{id}',  [BookController::class, 'deleteBook'])->name('book.destroy');
    // Route untuk CRUD kategori
    Route::get('/category/create', [CategoryController::class, 'addCategory'])->name(name: 'category.create');
    Route::post('/category',  [CategoryController::class, 'saveCategory'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'editCategory'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'deleteCategory'])->name('category.destroy');
    // Rpute untuk profile
    Route::resource('profile', ProfileController::class)->only(['index', 'update']);
    // Route untuk pinjam
    Route::post('/pinjam', [BorrowsController::class, 'storeBorrow'])->name('borrow.store');
});
// Route untuk show book & detail
Route::get('/book', [BookController::class, 'viewAllBooks'])->name('book.index');
Route::get('/book/{id}', [BookController::class, 'detailBook'])->name('book.show');
// Route untuk show category & detail
Route::get('/category', [CategoryController::class, 'viewAllCategories'])->name(name: 'category.index');
Route::get('/category/{id}', [CategoryController::class, 'detailCategory'])->name(name: 'category.show');
