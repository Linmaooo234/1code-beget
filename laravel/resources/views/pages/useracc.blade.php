<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ренессанс</title>
    <link rel="stylesheet" href="{{ asset('style/useracc.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
</head>
<body>
@extends('layouts.app')
@section('pages')

 <div class="useracc">
        @if(isset($user))
            <div class="user">
                <img class="userphoto" src="/storage/media/useracc.png">
                <div class="opisuser">
                    <h3 class="nickname"> {{ $user->name }}</h3>
                    <p class="emailuser">{{ $user->email }}</p>
                </div>
                <div class="btnexit">
                    <img src="/storage/media/exit.png">
                </div>
            </div>
        @endif
</div>


<h1 class="ticketzagalov">Мои билеты:</h1>
<div class="container">
    @if(count($tickets) > 0)
        <div class="tickets">
            @foreach($tickets as $ticket)
                <div class="bilet" style="margin-bottom: 1em; padding: 10px;">
                    <strong>Название мероприятия:</strong> {{ $ticket->afisha->nametov }}<br>
                    <strong>Дата начала:</strong> {{ date("d.m.Y", strtotime($ticket->afisha->data)) }}<br>
                    <strong>Время начала:</strong> {{ date("H:i", strtotime($ticket->afisha->time)) }}<br>
                    <strong>Место:</strong> Ряд {{ $ticket->row_number }}, № {{ $ticket->seat_number }}<br>
                    <strong>Цена:</strong> {{ number_format($ticket->price, 2, '.', '') }} руб.<br>
                </div>
            @endforeach
        </div>
    @else
        <p>У вас ещё нет купленных билетов.</p>
    @endif
</div>
@endsection
</body>
</html>
