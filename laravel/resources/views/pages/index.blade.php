<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Ренессанс</title>
    <link rel="stylesheet" href="{{ asset('style/index.css') }}">
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
</head>
<body>
    @extends('layouts.app')
    @section('pages')
     <!-- баннер начало -->
     <div class="banner">
        <div class="banner-content">
            <h1 class="bannerzagolovok">Ренессанс</h1>
            <h1 class="bannerzagolovok2">Ренессанс</h1>
            <p class="subtitle">новый театр в России</p>
            <img class="arrow" src="/storage/media/arrowdown.png">
        </div>
    </div>
    <!-- баннер конец -->

    <!-- о нас начало -->
    <div class="about-us" id="aboutusss">
        <div class="aboutuss">
        <img src="/storage/media/aboutuspic1.png" alt="Описание изображения" class="about-image">
        <div class="about-text">
        <div class="text-nadzag">
            <a href="../pages/design.php"><p class="nadzag">о нас</p></a>
        </div>
            <h2>ТЕАТР Ренессанс</h2>
            <p class="opisanie">Высокохудожественный репертуар, основанный на лучших произведениях русской и мировой классики и современной драматургии; профессиональная стабильная труппа, в составе которой много крупных мастеров сцены; остросовременная режиссура и сценография, не чуждые духу поисков и экспериментов, жанровое разнообразие постановок делают театр привлекательным и интересным самым широким слоям публики как у себя в городе, так и далеко за его пределами.</p>
            <a href="{{ route('pages.design') }}"><p class="opisanie">Подробнее -> </p></a>
        </div>
        </div>
    </div>
    <!-- о нас конец -->

    <!-- блок афиша начало -->
   <div class="afisha">
    <div class="afish">
        <h2 class="zagalovafiha">АФИША</h2>
    </div>
    <div class="catalogg">
        @foreach($latestAfishas as $afisha)
            <div class="catalogcard">
                <div class="card">
                    <!-- Используем путь к изображению -->
                    <img src="{{ asset('storage/' . $afisha->img) }}" class="cardimg">

                    <div class="date">
                        <div class="yes">
                            <h2 class="mainchislo">{{ $afisha->chislo }}</h2>

                            <div class="chisla">
                                <p class="monthname">{{ $afisha->month }}</p>
                                <p class="monthname">{{ $afisha->nedelya }}</p>
                                <p class="monthname">{{ $afisha->year }}</p>
                            </div>
                        </div>

                        <div class="nazvanieopis">
                            <h2 class="nameafisha">{{ $afisha->nametov }}</h2>
                            <div class="stick"></div>
                             <a href="{{ route('pages.show', $afisha->id) }}" class="cardf"><p class="podrobnee"> подробнее-> </p></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="arrownext">
            <img src="/storage/media/arrownext.png">
        </div>
    </div>
</div>
    <!-- блок афиша конец -->

    <!-- блок новости начало -->
        <div class="newss">
            <h2 class="zagolovokknovost">НОВОСТИ</h2>
            <div class="neww">
    @foreach($latestNews as $news)
                <div class="novostt">
                    <img class="novostpic" src="{{ asset('storage/' . $news->img) }}">
                    <p class="zagolovoknovosot">{{ $news->name }}</p>
                    <a href="{{ route('news.show', $news->id) }}"><p class="pordrobneenovost">подробнее -></p></a>
                </div>
@endforeach
            </div>
        </div>
    <!-- блок новости конец -->

    <!-- блок аккордеон начало -->
    <div class="faq">
        <div class="accardeon">
        <div class="faq__item">
            <div class="zagolovok">
            <img class="arrowdow" src="storage/media/down-arrow (1).png">
            <h3 class="zagolovacc">Сколько потребовалось лет чтобы открыть театр?</h3>
            </div>
            <p class="opisacc">На открытие театра, ушло более 5 лет, это была огромная работа с большими денежными вложениями, но мы сделали максимально эстетично прекрасное и комфортное место, где каждый может насладится любимым выступлением.</p>
        </div>
        <div class="faq__item">
            <div class="zagolovok">
                <img class="arrowdow" src="/storage/media/down-arrow (1).png">
                <h3 class="zagolovacc">Как вам пришла идея сделать театр где такое разнообразие?</h3>
                </div>
            <p class="opisacc">Все привыкли то что в театрах есть только один определенный концепт только оперы, балета и т.п. Но в нашем театре нет никаких ограничений и границ в творчестве.</p>
        </div>
        </div>
    </div>

    <script>
        let menuElems = document.querySelectorAll('.menu__elem')

menuElems.forEach(menuElem=>{
    let submenu = menuElem.querySelector('.submenu');
    let btn = menuElem.querySelector('.menu__btn');

    menuElem.addEventListener('mouseenter',function(){
        submenu.classList.add('active');
        btn.classList.add('active');
    })
    menuElem.addEventListener('mouseleave',function(){
        submenu.classList.remove('active');
        btn.classList.remove('active');
    })
})

document.querySelector('.faq').addEventListener('click', function(event){
    let target = event.target.closest('.faq__item');
    if(!target) return;

    target.classList.toggle('active');
    let p = target.querySelector('p');

    if(target.classList.contains('active')){
        p.style.height = p.scrollHeight + 'px';
    }else{
        p.style.height = '';
    }
})

    </script>
    <!-- блок аккардеорн конец -->
    @endsection

  
</body>
</html>
