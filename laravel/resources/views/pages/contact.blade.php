<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ренессанс</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/contact.css') }}">
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
</head>
<body>
 @extends('layouts.app')
    @section('pages')
    <!-- блок наши контакты начало -->
        <div class="contacts">
            <div class="kontact">
                <h2 class="zagolovokcontact">КОНТАКТНАЯ ИНФОРМАЦИЯ</h2>
                <div class="infos">
                <div class="infocontact">
                    <p class="infozaolov">Обратная связь</p>
                    <p class="infopodzag">+7 960 033-71-74</p>
                    <p class="infopodzag">renaissance@mail.ru</p>
                </div>

                <div class="infocontact">
                    <p class="infozaolov">Сотрудничество</p>
                    <p class="infopodzag">+7 250 456-71-75</p>
                    <p class="infopodzag">renaissancebuiz@mail.ru</p>
                </div>
                </div>

                <iframe class="infokart" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2242.9841876797636!2d49.1047154773895!3d55.793512473099305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415ead3d54e12f23%3A0x5f33871f37f61e37!2z0KLQtdCw0YLRgCDQvdCwINCR0YPQu9Cw0LrQtQ!5e0!3m2!1sru!2sru!4v1730902297659!5m2!1sru!2sru" width="1445" height="263" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    <!-- блок наши контакты конец -->
@endsection

</body>
</html>
