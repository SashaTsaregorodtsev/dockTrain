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
        <form class="mainEditBooks" action="{{$queryId ? route('AuthorsUpdate',$authors->id) : '/authors/create'}}" method="post" >
            @csrf
            <div>
                <label>ФИО :</label>
                <input minlength="8"  type="text" required value="{{ $queryId ? $authors->initial : '' }}" name="initial" />
            </div>
            <button style="margin-top: 10px;">{{$queryId ? 'Сохранить' : 'Добавить'}}</button>
        </form>
    </div>
    @endsection