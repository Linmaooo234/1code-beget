<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>
<body>

<header>
    <img class="logotipadaptiv" src="/storage/media/logo.svg">
    <input type="checkbox" name="" id="burger">
    <label for="burger"></label>
    <nav>
        <a href="{{ route('pages.index') }}" class="headerpunkt">Главная</a>
        <a href="{{ route('indexnews') }}" class="headerpunkt">Новости</a>
        <img class="logotip" src="/storage/media/logo.svg">
        <a href="{{ route('page.catalog') }}" class="headerpunkt">Афиша</a>
        <a href="{{ route('pages.contact') }}" class="headerpunkt">Контакты</a>
        <div class="buttonvhod">
        @auth
        @if(auth()->check() && auth()->user()->isAdmin())
        <a href="{{ route('admin.index') }}" class="cabinet">Личный кабинет</a>
        @endif
        @if(auth()->check() && auth()->user()->isUser())
        <a href="{{ route('pages.useracc') }}" class="cabinet">Личный кабинет</a>
        @endif
            <form class="exit222" action="{{ route('logout') }}" method="get">
                <button type="submit" class="exittt2">Выход</button>
            </form>
        @endauth
        @if(!auth()->user())
            <a href="{{ route('pages.login') }}"><button class="exittt">ВОЙТИ</button></a>
        @endif
        </div>
    </nav>
</header>
</body>
</html>
