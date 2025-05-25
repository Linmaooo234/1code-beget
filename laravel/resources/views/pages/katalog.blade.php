<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ренессанс</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Подключение flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="{{ asset('style/katalog.css') }}">
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
</head>
<body>
    @extends('layouts.app')
    @section('pages')
    <!-- блок слайдер начало -->
    <div class="slider">
        <div class="list">
            <div class="item active">
                <img class="picture" src="/storage/media/onee.jpg">
                <div class="content">
                    <p>01</p>
                    <h2>ДРАКОН</h2>
                    <p>
                        Зрителям предоставлена увлекательная возможность угадывать в персонажах черты реальных властителей, да и свои собственные.
                    </p>
                </div>
            </div>
            <div class="item">
                <img class="picture" src="/storage/media/two.jpg">
                <div class="content">
                    <p>02</p>
                    <h2>ПИКОВАЯ ДАМА</h2>
                    <p>
                        Главным героем «Пиковой дамы» становится петербургский свет – яркая, роскошно одетая, холодная массовка. В этом отношении трактовка режиссера ничуть не расходится с авторской.
                    </p>
                </div>
            </div>
            <div class="item">
                <img class="picture"  src="/storage/media/three.jpg">
                <div class="content">
                    <p>03</p>
                    <h2>ГАМЛЕТ</h2>
                    <p>
                        Трагедия Уильяма Шекспира в пяти актах, одна из самых известных его пьес и одна из самых знаменитых пьес в мировой драматургии.
                    </p>
                </div>
            </div>
            <div class="item">
                <img class="picture" src="/storage/media/four.jpg">
                <div class="content">
                    <p>04</p>
                    <h2>РЕВИЗОР</h2>
                    <p>
                        Ревизор этот наша проснувшаяся совесть, которая заставит нас вдруг и разом взглянуть во все глаза на самих себя. Перед этим ревизором ничего не укроется
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="/storage/media/five.jpg">
                <div class="content">
                    <p>05</p>
                    <h2>ЧУЖОЙ РЕБЕНОК</h2>
                    <p>
                        «Чужой ребенок» - самая известная пьеса Василия Шкваркина - была написана в 1933 году, и в первый же сезон побила все рекорды по числу постановок. 500 театров захотели включить ее в свой репертуар.
                    </p>
                </div>
            </div>
        </div>

        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>

        <div class="thumbnail">
            <div class="item active">
                <img class="pic" src="/storage/media/one.jpg">
                <div class="content">
                    Дракон
                </div>
            </div>
            <div class="item">
                <img src="/storage/media/two.jpg">
                <div class="content">
                    Пиковая дама
                </div>
            </div>
            <div class="item">
                <img src="/storage/media/three.jpg">
                <div class="content">
                    Гамлет
                </div>
            </div>
            <div class="item">
                <img src="/storage/media/four.jpg">
                <div class="content">
                    Ревизор
                </div>
            </div>
            <div class="item">
                <img src="/storage/media/five.jpg">
                <div class="content">
                    Чужой ребенок
                </div>
            </div>
        </div>
    </div>
    <!-- блок слайдер конец -->

<script>
let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let thumbnails = document.querySelectorAll('.thumbnail .item');


let countItem = items.length;
let itemActive = 0;

next.onclick = function(){
    itemActive = itemActive + 1;
    if(itemActive >= countItem){
        itemActive = 0;
    }
    showSlider();
}

prev.onclick = function(){
    itemActive = itemActive - 1;
    if(itemActive < 0){
        itemActive = countItem - 1;
    }
    showSlider();
}

let refreshInterval = setInterval(() => {
    next.click();
}, 5000)
function showSlider(){

    let itemActiveOld = document.querySelector('.slider .list .item.active');
    let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
    itemActiveOld.classList.remove('active');
    thumbnailActiveOld.classList.remove('active');


    items[itemActive].classList.add('active');
    thumbnails[itemActive].classList.add('active');


    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => {
        next.click();
    }, 5000)
}


thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
        itemActive = index;
        showSlider();
    })
})
</script>


        <!-- блок афиша начало -->

      <form class="filtrat" method="GET" action="{{ route('page.catalog') }}">
    <label for="date_range">Выберите период:</label>
    <input class="reggg" type="text" id="date_range" name="date_range" placeholder="Выберите даты..." value="{{ request()->input('date_range') }}">

    <button class="filtr" type="submit">Фильтровать</button>
</form>

<script>


document.addEventListener("DOMContentLoaded", () => {
    flatpickr("#date_range", {
        mode: "range",
        dateFormat: "Y-m-d",
        defaultDate: "{{ request()->input('date_range') }}",
        locale: "ru"
    });
});


window.onload = function () {
    let scrollPosition = localStorage.getItem('scrollPosition');
    if (scrollPosition !== null) window.scrollTo(0, parseInt(scrollPosition));
};

window.onbeforeunload = function () {
    localStorage.setItem('scrollPosition', window.pageYOffset || document.documentElement.scrollTop);
};
</script>

   <div class="afisha">
    <div class="catalogg">
        <!-- Используем цикл foreach для вывода всех курсов -->
        @foreach($courses as $course)
            <div class="catalogcard">
                <div class="card">
                    <img src="{{ asset('storage/' . $course->img) }}" class="cardimg">
                    <div class="date">
                        <div class="yes">
                            <h2 class="mainchislo">{{ $course->chislo }}</h2>
                            <div class="chisla">
                                <p class="monthname">{{ $course->month }}</p>
                                <p class="monthname">{{ $course->nedelya }}</p>
                                <p class="monthname">{{ $course->year }}</p>
                            </div>
                        </div>
                        <div class="nazvanieopis">
                            <h2 class="nameafisha">{{ $course->nametov }}</h2>
                            <div class="stick"></div>
                            <a href="{{ route('pages.show', $course->id) }}" class="cardf"><p class="podrobnee"> подробнее-> </p></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Добавляем постраничную навигацию -->

    </div>
</div>

  <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center custom-pagination">
              <!-- Стрелка назад -->
              @if($courses->onFirstPage())
                  <li class="page-item disabled">
                      <span class="page-link prev-btn">←</span>
                  </li>
              @else
                  <li class="page-item">
                      <a class="page-link prev-btn" href="{{ $courses->previousPageUrl() }}">←</a>
                  </li>
              @endif

              <!-- Номер страницы -->
              @for ($i = 1; $i <= $courses->lastPage(); $i++)
                  <li class="page-item {{ ($courses->currentPage() === $i ? 'active' : '') }}">
                      <a class="page-link num-page" href="{{ $courses->url($i) }}">{{ $i }}</a>
                  </li>
              @endfor

              <!-- Стрелка вперёд -->
              @if($courses->hasMorePages())
                  <li class="page-item">
                      <a class="page-link next-btn" href="{{ $courses->nextPageUrl() }}">→</a>
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
