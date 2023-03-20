@extends('welcome')
@section('content')
<div>
<div class="table">
      <div class="tHeadBook">
                  <h2>id</h2>
                  <h2>Название</h2>
                  <h2>Автор(ы)</h2>
                  <h2>Год издания</h2>
      </div>
      <div class="tBodyBook">
          @foreach ($books as $book)
                  <div class="dataTable">{{$book->id}}</div>
                  <div  class="dataTable">{{$book->name}}</div>
                  <div  class="dataTable">
            @foreach($book->authors as $authorBook)
                  {{$authorBook->initial}} 
            @endforeach
                  </div>
                  
                  <div  class="dataTable">{{$book->yearsPublic}}</div>
                  @endforeach
                  
      </div>
</div>

<div class="filter">
  <form action="books" method="get" style="display: flex; margin:15px;"> 
    <div>
      Фильтр по автору :
    </div>
    <div>
      <select style="margin-left:5px;"  name="authors">
        @foreach ($authors as $author)
        <option  selected="{{$selected}}" >{{$author->initial}}</option>
        @endforeach
      </select>
    </div>
    <div style="margin-left:10px;">
      <button type="submit">Применить фильтр</button>
    </div>
  </form>
  <form action="/books">
    <button type="submit">Cбросить фильтр</button>
  </form>
</div>


<div style="display: flex;">
<form style="display: flex; margin-left:15px;"   action="" method="get">
@csrf
    <div>
      Выберите книгу :
    </div>
  <div >
      <select   name="id">
        @foreach ($books as $book)
          <option  value="{{$book->id}}" >{{$book->name}}</option>
        @endforeach
      </select>
    <button type="submit" formmethod="get" formaction="{{route('BooksIndexId','id')}}">Редактировать</button>
    <button formmethod="post" formaction="books/delete" type="submit">Удалить</button>
  </form>
</div>

 <form action="books/edit" method="get">
@csrf
 </div>
   <button  type="submit" style="margin:15px;">Добавить новую книгу</button>
 </form>
</div>
@endsection
