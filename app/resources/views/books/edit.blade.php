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
        <form class="mainEditBooks" action="{{$queryId ? route('BooksUpdate',$books->id): 'create'}}" method="post" >
            @csrf
            <div class="dataEdit">
                <div   style="margin-right: 10px;">Название :</div>
                <input minlength="2" type="text" required value="{{$books ? $books->name : '' }}" name="name"/>
            </div>
            <div class="dataEdit">
                <div   style="margin-right: 10px;">Год издания : </div>
                <input minlength="3" type="number" required value="{{$books ? $books->yearsPublic : ''  }}" name="yearsPublic"/>
            </div>
            <div class="dataEdit">
                <div style="margin-right: 10px;">Авторы :</div>
                <select required multiple=true name="authors[]">
                @foreach ($authors as $author)
                    <option  value="{{$author->id}}">{{$author->initial}}</option>
                @endforeach
                </select>
            </div>
            <button style="margin-top: 10px;" type="submit">{{$queryId ? 'Сохранить' : 'Добавить'}}</button>
        </form>
    </div>

    @endsection