@extends('welcome')
    @section('content')
    <div class="wrapperEditBooks"> 
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h1>{{$queryId ? 'Изменение книги' : 'Добавление новой книги'}}</h1>
        <form class="mainEditBooks" action= '{{$queryId ? "/books/update/$books->id" : "create"}}' method="post" >
            @csrf
            <div class="dataEdit">
                <div   style="margin-right: 10px;">Название :</div>
                <input id="nameBook" minlength="2" type="text" required value='{{$books ? $books->name : old("name") }}' name="name"/>
            </div>
            <div class="dataEdit">
                <div   style="margin-right: 10px;">Год издания : </div>
                <input minlength="3" type="number" required value='{{$books ? $books->yearsPublic : old("yearsPublic")  }}' name="yearsPublic"/>
                <div>{{ $authors->contains(fn($val)=> $val->initial < '22')}}</div>
            </div>
            <div class="dataEdit">
                <div style="margin-right: 10px;">Авторы :</div>
                <select multiple=true name="authors[]">
                @foreach ($authors as $author)
                    <option {{
                        $queryId 
                        && ($books->authors->contains('id',$author->id) 
                                ? 'selected' 
                                : '') 
                        
                         }} value="{{$author->id}}">{{$author->initial}}</option>
                @endforeach
                </select>
            </div>
            <button style="margin-top: 10px;" type="submit">{{$queryId ? 'Сохранить' : 'Добавить'}}</button>
        </form>
    @if($queryId)
        <form action="/books/delete/{{$books->id}}" method="post">
            @csrf
            <!-- <x-prompt :message='$books->name'/> -->
            <button id="delete" style="margin-top: 10px;" type="submit">Удалить</button>
        </form>
    @endif
    </div>
    <script>
        const del = document.getElementById('delete');
        const name = document.getElementById('nameBook');
        console.log(name.value)
        del.addEventListener('click',()=>{
          let quest = confirm(`Вы точно хотите удалить ${name.value} ?`)
          return quest
        })
    </script>
    @endsection