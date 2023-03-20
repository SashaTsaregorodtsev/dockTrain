<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Models\Books;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;

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
Route::get('/',[BookController::class,'index']);

Route::controller(AuthorController::class)->group(function(){
    Route::post('/authors/create','store');
    Route::get('/authors/edit/{id}','indexId')->name('AuthorsIndexId');
    Route::post('/authors/delete','delete');
    Route::get('/authors', 'index');
    Route::get('/authors/edit','edit')->name('AuthorsEdit');
    Route::post('/authors/update/{id}','update')->name('AuthorsUpdate');
});

Route::controller(BookController::class)->group(function(){
    Route::post('/books/create','store');
    Route::get('/books', 'index');
    Route::get('/books/edit/{id}','indexId')->name('BooksIndexId');
    Route::get('/books/edit','edit');
    Route::post('/books/update/{id}','update')->name('BooksUpdate');
    Route::post('/books/delete','delete');
});
// Route::post('/edit/book',[BookController::class,'store']);
