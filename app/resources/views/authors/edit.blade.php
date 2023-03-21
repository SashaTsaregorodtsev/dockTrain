@extends('welcome')
    @section('content')
    <div class="wrapperEditBooks">
        <h1>{{ $queryId ? 'Изменение автора' : 'Добавление нового автора' }}</div>
    @if ($errors->any())
        <div  class="mainEditBooks">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form class="mainEditBooks" action='{{$queryId ? "/authors/update/$authors->id" : "/authors/create"}}' method="post" >
            @csrf
            <div>
                <label>ФИО :</label>
                <input id="nameAuthor" minlength="8"  type="text" required value='{{ $queryId ? $authors->initial : old("initial") }}' name="initial" />
            </div>
            <button style="margin-top: 10px;">{{$queryId ? 'Сохранить' : 'Добавить'}}</button>
        </form>
    @if($queryId)
        <form style="margin-top:10px;"  class="mainEditBooks"  action="/authors/delete/{{$authors->id}}" method="post">
            @csrf
            <button id="delete" type="submit">Удалить</button>
        </form>
    @endif
    </div>
    <script>
        const del = document.getElementById('delete');
        const name = document.getElementById('nameAuthor');
        console.log(name.value)
        del.addEventListener('click',()=>{
          let quest = confirm(`Вы точно хотите удалить ${name.value} ?`)
          return quest
        })
    </script>
    @endsection