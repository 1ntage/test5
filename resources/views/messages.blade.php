<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форум</title>
</head>
<body>
<p><a href="/register">Зарегистрироваться</a></p>
<form action="{{route('logout')}}" method="POST">
    @csrf
    <button type="submit">Выйти</button>
</form>
@foreach($messages as $message)
    <a href="{{route('profile')}}">{{$message->nickname}}</a>
    <p>{{$message->text}} {{$message->created_at}} {{$message->status}}</p>
    <form action="{{route('message_offensive')}}" method="POST">
        @csrf
        <button type="submit">Оскорбительное</button>
    </form>
@endforeach

<h1>Оставить сообщение</h1>
<form action="{{route('message_store')}}" method="POST">
    @csrf
    <label for="nickname">Автор</label>
    <input type="text" name="nickname" id="nickname">
    <label for="text">Текст сообщения</label>
    <input type="text" name="text" id="text">
    <button type="submit">Оставить сообщение</button>
</form>

@if(session())
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
</body>
</html>
