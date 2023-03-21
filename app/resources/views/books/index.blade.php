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
                  <a href="/books/edit/{{$book->id}}" class="dataTable">{{$book->name}}</a>
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
        <option {{ $selectedAuth == "$author->id" ? "selected" : ""}} value="{{$author->id}}" >{{$author->initial}}</option>
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


  <form action="books/edit" method="get">
    @csrf
  <button  type="submit" style="margin:15px;">Добавить новую книгу</button>
</form>
</div>
@endsection
