<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ренессанс</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/login.css') }}">
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
</head>
<body>
    @extends('layouts.app')
    @section('pages')
        <!-- блок формы начало -->
        <div class="bg">
        <h2 class="zagregist">ВХОД</h2>
        <section class="sign">
            <div class="container">
                <div class="title-form"></div>
                <form action="{{ route('login') }}" method="POST" class="regist">
                @csrf
                <label for="email">Введите почту*:</label>
                <input class="reggg" type="text" name="email"placeholder="Введите почту" value="">
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror
                 <label for="password">Введите пароль*:</label>
                <input class="reggg" type="password" name="password"placeholder="Введите пароль">
                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror
                <input class="reggg" type="submit" value="Войти в аккаунт" name="sign-up">
            <p class="ssilka">Еще нет аккаунта?<a class="videl" href="{{ route('pages.register') }}">Зарегистрироваться</a></p>
        </form>
            </div>
        </section>
            </div>
        <!-- блок формы конец -->
        @endsection
</body>
</html>
