<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BookController extends Controller
{
   public function checkIn($text){
      if($text){
         
      }
   }

   public function index(Request $req)
   {
      $filtredAuth = $req->authors;
      $authros = Authors::get();
      $books = Books::get();
      $filtredBooks = $filtredAuth ? Books::whereHas('authors',function(Builder $query) use($filtredAuth){
            $query->where('authors.id','like',$filtredAuth);
      })->get() : null;

      return view('books.index',
      [
      'books'=>$filtredAuth  ?  $filtredBooks : $books ,
      'authors'=>$authros ,
      'selectedAuth'=>$filtredAuth ? $filtredAuth : false 
      ]);
   }
   
   public function edit(Request $req)
   {
      return view('books.edit',['books'=>false,'authors'=>Authors::get(),'queryId'=>false]);
   }

   public function indexId(Request $req,$id)
   {
      return view('books.edit',['books'=>Books::find($req->id),'authors'=>Authors::get(),'queryId'=>true]);
   }

   public function store(Request $req)
   {
         $req->validate([
            'name' => 'min:3|required|max:100|alpha',
            'yearsPublic'=> 'required|min:3|numeric'
         ],[
            'name.alpha' => "Поле 'имя' дожно состоять из буквенных символов",
            'name.max' => "Поле 'имя' дожно состоять максимум из 100 символов",
            'yearsPublic.min' =>  "Поле 'год издания' дожно состоять из минимум из 3 символов",
            'name.min' =>  "Поле 'имя' дожно состоять из минимум из 3 символов"
         ]);

            $newBook = Books::create(
               [
                  'name'=>$req->name,
                  'yearsPublic'=>$req->yearsPublic
               ]);
               
               $bookIndex = Books::find($newBook->id);
               foreach($req->authors as $author){
                  $bookIndex->authors()->attach((int)$author);
               }
               
               return redirect('/books');
   }

   public function delete(Request $req)
   {
      $book = Books::find($req->id);
      $book->authors()->detach();
      $book->delete();
      return redirect('/books');
   }

   public function update(Request $req)
   { 

      $req->validate([
         'name' => 'min:3|required|max:100|alpha',
         'yearsPublic'=> 'required|min:3|numeric'
      ],[
         'name.alpha' => "Поле 'имя' дожно состоять из буквенных символов",
         'name.max' => "Поле 'имя' дожно состоять максимум из 100 символов",
         'yearsPublic.min' =>  "Поле 'год издания' дожно состоять из минимум из 3 символов",
         'name.min' =>  "Поле 'имя' дожно состоять из минимум из 3 символов"
      ]);
      
      $book = Books::find($req->id);
      $book->name = $req->name;
      $book->yearsPublic = $req->yearsPublic;
      $book->authors()->detach();
      if($req->authors){
         foreach($req->authors as $author){
            $book->authors()->attach((int)$author);
         }
      }
      $book->save();
      return redirect('/books');
   }
}
