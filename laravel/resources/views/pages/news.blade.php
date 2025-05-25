<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ренессанс</title>
    <link rel="stylesheet" href="{{ asset('style/news.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
</head>
<body>
 @extends('layouts.app')
    @section('pages')

     <div class="banner">
        <div class="banner-content">
            <h1 class="bannerzagolovok">НОВОСТИ</h1>
            <h1 class="bannerzagolovok2">НОВОСТИ</h1>
        </div>
    </div>
<div class="newss">
    @foreach ($news as $item)
        <div class="neww">
            <div class="novostt">
                <img class="novostpic" src="{{ asset('storage/' . $item->img) }}">
                <p class="zagolovoknovosot">{{ $item->name }}</p>
                <a href="{{ route('news.show', $item->id) }}"><p class="pordrobneenovost">подробнее -></p></a>
            </div>
        </div>
    @endforeach
</div>

  <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center custom-pagination">
              <!-- Стрелка назад -->
              @if($news->onFirstPage())
                  <li class="page-item disabled">
                      <span class="page-link prev-btn">←</span>
                  </li>
              @else
                  <li class="page-item">
                      <a class="page-link prev-btn" href="{{ $news->previousPageUrl() }}">←</a>
                  </li>
              @endif

              <!-- Номер страницы -->
              @for ($i = 1; $i <= $news->lastPage(); $i++)
                  <li class="page-item {{ ($news->currentPage() === $i ? 'active' : '') }}">
                      <a class="page-link num-page" href="{{ $news->url($i) }}">{{ $i }}</a>
                  </li>
              @endfor

              <!-- Стрелка вперёд -->
              @if($news->hasMorePages())
                  <li class="page-item">
                      <a class="page-link next-btn" href="{{ $news->nextPageUrl() }}">→</a>
                  </li>
              @else
                  <li class="page-item disabled">
                      <span class="page-link next-btn">→</span>
                  </li>
              @endif
          </ul>
      </nav>

 <!-- блок афиша конец -->
    @endsection
</body>
</html>
