<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;

class AuthorController extends Controller
{
    public function index()
   {
      return view('authors.index',['authors'=>Authors::get()]);
   }

   public function edit()
   {
      return view('authors.edit',['authors'=>Authors::get(),'queryId'=>false]);
   }

   public function store(Request $req)
   {
      $validatedData = $req->validate([
         'initial'=> 'required|max:100|min:8|alpha'
      ],[
         'initial.alpha'=>'Поле "ФИО" дожно состоять из буквенных символов',
         'initial.min'=>'Поле "ФИО" дожно состоять минимум из 8 символов',
      ]);
      Authors::create(["initial"=>$req->initial]);
      return redirect('/authors');
   }

   public function update(Request $req)
   {
      $author = Authors::find($req->id);
      $author->initial = $req->initial;
      $author->save();
      return redirect('/authors');
   }

   public function indexId(Request $req)
   {
      return view('authors.edit',['authors'=>Authors::find($req->id),'queryId'=>true]);
   }
   
   public function delete(Request $req)
   {  
      $author = Authors::find($req->id);
      $author->books()->detach();
      $author->delete();
      return redirect('/authors');
   }
}
