<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ</title>
</head>
<body>
<h1>Оскорбительные сообщения</h1>
@foreach ($offensiveMessages as $message)
    <div>
        <p>{{ $message->text }} - <a href="{{ route('users.show', $message->user_id) }}">{{ $message->nickname }}</a></p>
        <form action="{{ route('messages.remove_offensive', $message) }}" method="POST">
            @csrf
            <button type="submit">Снять метку</button>
        </form>
        <form action="{{ route('messages.destroy', $message) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Удалить</button>
        </form>
    </div>
@endforeach
@if(session())
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
</body>
</html>
