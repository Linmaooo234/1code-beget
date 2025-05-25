<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ваш билет</title>
    <style type="text/css">

    @font-face {
    font-family: "Bergamasco Bold";
    src:
      local("Bergamasco Bold"),
      url("../fonts/Bergamasco\ Bold.otf")
  }

@font-face {
    font-family: "Bergamasco Light";
    src:
      local("Bergamasco Light"),
      url("../fonts/Bergamasco\ Light.otf")
  }

@font-face {
    font-family: "Bergamasco Regular";
    src:
      local("Bergamasco Regular"),
      url("../fonts/Bergamasco\ Regular.otf")
  }
        body {
             background-image: url('/storage/media/mainpagebanner.jpg');
            color: black;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            max-width: 600px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            text-align: center;
            position: relative;
            z-index: 1;
        }

        h1 {
             font-family: 'Bergamasco Light';
            font-size: 2em;
            color: #68191F;
            margin-bottom: 20px;
        }

        p {
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
            font-size: 1.1em;
        }

        strong {
            color: #68191F;
        }

        /* Фон с изображением */
        body::before {
            content: ''';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/storage/media/mainpagebanner.jpg');
            background-size: cover;
            opacity: 0.3;
            filter: blur(5px); /* размытие фона */
            z-index: -1;
        }
    </style>
</head>
<body>
<div class="container">
 <h1>Ваши билеты успешно забронированы!</h1>
<p>Вы приобрели следующие места:</p>

<!-- Начинаем цикл вывода билетов -->
@foreach($allTicketsDetails as $ticketDetail)
<div style="border-bottom: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
    <p><strong>Мероприятие:</strong> {{ $ticketDetail['eventName'] }}<br>
       <strong>Дата и время:</strong> {{ $ticketDetail['eventDate'] }} {{ $ticketDetail['eventTime'] }}<br>
       <strong>Ряд:</strong> {{ $ticketDetail['rowNumber'] }}<br>
       <strong>Место:</strong> {{ $ticketDetail['seatNumber'] }}
       <a href="">Скачать билет</a>
    </p>
</div>
@endforeach

<p>Спасибо за покупку! Наслаждайтесь мероприятиями.</p>
</div>
</body>
</html>
