<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ренессанс</title>
    <link rel="stylesheet" href="{{ asset('style/onenew.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
</head>
<body>
 @extends('layouts.app')
@section('pages')
<div class="onenew">
    <img class="onenewimg" src="{{ asset('storage/'.$news->img) }}" alt="{{ $news->name }}">
    <h1 class="zaglolownews">{{ $news->name }}</h1>
    <p class="descnews">{{ $news->description }}</p>
</div>
@endsection
</body>
</html>
