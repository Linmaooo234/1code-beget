<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ренессанс</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/onetovar.css') }}">
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
</head>
@extends('layouts.app')
@section('pages')
<body>
        <div class="onetovar">
            <div class="afiha">
            <img class="katinphp" src="{{ asset('storage/' . $course->img) }}">
                <div class="text">
                    <h2 class="zagolovkdata"><span class="chislo">{{$course->chislo}}</span>{{$course->month}}</h2>
                    <p class="nazvanieafishi">{{$course->nametov}}</p>
                    <p class="opisaniefishi">{{$course->description}}</p>
                        @if(auth()->check() && auth()->user()->isUser())
                    <a href="{{ route('pages.schemezala', $course->id) }}"><button class="addkorzin">купить билеты</button></a>
                    @endif
                </div>
            </div>
        </div>
        <!-- блок одного афиша конец -->
    @endsection
</body>
</html>
