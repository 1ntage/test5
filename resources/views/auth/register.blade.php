<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}"
    <title>Регистрация</title>
</head>
<body>
    <h1>Регистрация</h1>
    <form action="{{route('register')}}" method="POST" class="auth_form">
        @csrf
        <label for="name">Имя</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Почта</label>
        <input type="text" id="email" name="email" required>
        <label for="password">Пароль</label>
        <input type="text" id="password" name="password" required>
        <label for="password_confirmation">Подтвердить пароль</label>
        <input type="text" id="password_confirmation" name="password_confirmation" required>
        <button type="submit">Зарегистрироваться</button>
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
