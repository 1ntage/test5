<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
<h1>Авторизация</h1>
<form action="{{route('login')}}" method="POST">
    @csrf
    <label for="email">Почта</label>
    <input type="text" id="email" name="email" required>
    <label for="password">Пароль</label>
    <input type="text" id="password" name="password" required>
    <button type="submit">Войти</button>
</form>
@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
</body>
</html>
