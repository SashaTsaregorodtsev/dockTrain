<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('app.css')}}">
        <title>Laravel</title>
    </head>
    <body class="Main">
    <div class="navBar" >
        <a href="/books">Список книг</a>
        <a  href="/authors">Список авторов</a>
        <a  href="/books/edit">Создание книги</a>
        <a  href="/authors/edit">Создание автора</a>
    </div>
<div>
    @yield('content')
</div>
    </body>
</html>