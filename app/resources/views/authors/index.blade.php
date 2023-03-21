@extends('welcome')
@section('content')
<div>
  <div>
        <div class="table" >
            <div class="tHeader">
                        <h2>id</h2>
                        <h2>ФИО</h2>
                        <h2>Количество кинг</h2>
            </div>
            <div class="tBody">
                @foreach  ($authors as $author)
                      <div class="dataTable">{{$author->id}}</div>
                      <a href="/authors/edit/{{$author->id}}" class="dataTable">{{$author->initial}}</a>
                      <div  class="dataTable">{{count($author->books)}}</div>
                  @endforeach
            </div>
        </div>
  <form action="authors/edit" style="margin:15px;">
          <button type="submit">Добавить нового автора</button>
  </form>
</div>

@endsection
