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
                      <div  class="dataTable">{{$author->initial}}</div>
                      <div  class="dataTable">{{count($author->books)}}</div>
                  @endforeach
            </div>
        </div>

  <form class="groupAuthors" action=""> 
    @csrf
        <div style="display:flex;">
                <div>
                    Выбрать автора : 
                </div>
              <select name="id">
                    @foreach  ($authors as $author)
                          <option value="{{$author->id}}">{{$author->initial}}</option>
                    @endforeach
               </select>
        </div>
        <div>
                <button formaction="{{route('AuthorsIndexId','id')}}" type="submit">Редактировать</button>
                <button formaction="/authors/delete" formmethod="post" type="submit">Удалить</button>
        </div>
  </form>

  <form action="authors/edit" style="margin:15px;">
          <button type="submit">Добавить нового автора</button>
  </form>
</div>

@endsection
