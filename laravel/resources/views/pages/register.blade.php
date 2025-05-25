<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ренессанс</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/register.css') }}">
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
</head>
<body>
    @extends('layouts.app')
    @section('pages')
    <div class="bg">
        <h2 class="zagregist">РЕГИСТРАЦИЯ</h2>
        <section class="sign">
            <div class="container">
                <form class="regist" action="{{ route('register') }}" method="POST" name="sign-up">
                    @csrf
                    <label for="password">Введите имя*:</label>
            <input class="reggg" type="text" name="name" placeholder="Введите имя" >
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
            <label for="password">Введите почту*:</label>
        <input class="reggg" type="text" name="email" placeholder="Введите почту" value="">
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
        <label for="password">Введите пароль*:</label>
        <input class="reggg" type="password" name="password"placeholder="Придумайте пароль">
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror
        <label for="password">Повторите пароль*:</label>
        <input class="reggg" type="password" name="password_confirmation" placeholder="Подтвердить пароль">

        <input class="reggg" type="submit" value="Зарегистрироваться" name="sign-up">
        <p class="ssilka">Уже есть аккаунт?<a class="videl" href="{{ route('pages.login') }}">Войти</a></p>
            </div>
        </form>

            </div>
        </section>

    </div>

    @endsection
</body>
</html>
