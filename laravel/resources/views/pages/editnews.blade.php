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
    <link rel="stylesheet" href="{{ asset('style/addafiaha.css') }}">
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
</head>
<body>
    <h2 class="zagregist">РЕДАКТИРОВАНИЕ НОВОСТИ</h2>
    <section class="sign">
        <div class="container">
            <div class="title-form"></div>
            <form class="regist" enctype="multipart/form-data" action="{{route('updatenews' , $news->id)}}" method="post" name="sign-up">
                @csrf
         <div class="form-group">
                <label for="img">Добавьте картинку*:</label>
                <input type="file" class="reggg" id="img" name="img">
            </div>
            <div class="form-group">
                <label for="name">Введите название новости*:</label>
                <input class="reggg" type="text" name="name" placeholder="Название новости" value="{{ $news->name }}">
            </div>
            <div class="form-group">
                <label for="description">Введите содержание*:</label>
                <textarea class="reggg" name="description" rows="4" placeholder="Содержание новости">{{ $news->description }}</textarea>
            </div>
            <div class="form-group submit">
                <input class="reggg" type="submit" value="Редактировать" name="sign-up">
            </div>
    </section>
</body>
</html>
