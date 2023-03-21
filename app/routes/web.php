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
    Route::get('/authors/edit/{id}','indexId');
    Route::post('/authors/delete/{id}','delete');
    Route::get('/authors', 'index');
    Route::get('/authors/edit','edit');
    Route::post('/authors/update/{id}','update');
});

Route::controller(BookController::class)->group(function(){
    Route::post('/books/create','store');
    Route::get('/books', 'index');
    Route::get('/books/edit/{id}','indexId');
    Route::get('/books/edit','edit');
    Route::post('/books/update/{id}','update');
    Route::post('/books/delete/{id}','delete');
});
// Route::post('/edit/book',[BookController::class,'store']);
