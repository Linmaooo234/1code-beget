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
    <h2 class="zagregist">РЕДАКТИРОВАНИЕ АФИШИ</h2>
    <section class="sign">
        <div class="container">
            <div class="title-form"></div>
            <form class="regist" enctype="multipart/form-data" action="{{route('update' , $afisha->id)}}" method="post" name="sign-up">
                @csrf
         <div class="form-group">
                <label for="img">Добавьте картинку*:</label>
                <input type="file" class="reggg" id="img" name="img">
            </div>
            <div class="form-group">
                <label for="nametov">Добавьте название афиши*:</label>
                <input class="reggg" type="text" name="nametov" placeholder="Название мероприятия" value="{{ $afisha->nametov }}">
            </div>
            <div class="form-group">
                <label for="description">Добавьте описание афиши*:</label>
                <textarea class="reggg" name="description" rows="4" placeholder="Краткое описание мероприятия">{{ $afisha->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="time">Добавьте время начала события*:</label>
                <input class="reggg" type="time" name="time" value="{{ $afisha->time }}">
            </div>
            <div class="form-group">
                <label for="data">Добавьте дату события*:</label>
                <input class="reggg" type="date" name="data" value="{{ $afisha->data }}">
            </div>
            <div class="form-group">
                <label for="nedelya">Добавьте день недели*:</label>
                <input class="reggg" type="text" name="nedelya" placeholder="Например, Понедельник" value="{{ $afisha->nedelya }}">
            </div>
            <div class="form-group">
                <label for="chislo">Добавьте число*:</label>
                <input class="reggg" type="number" name="chislo" placeholder="Например, 06 или 24" value="{{ $afisha->chislo }}">
            </div>
            <div class="form-group">
                <label for="year">Добавьте год*:</label>
                <input class="reggg" type="number" name="year" placeholder="Например, 2025" value="{{ $afisha->year }}">
            </div>
            <div class="form-group">
                <label for="month">Добавьте месяц*:</label>
                <input class="reggg" type="text" name="month" placeholder="Например, Январь" value="{{ $afisha->month }}">
            </div>
            <div class="form-group">
                <label for="status">Выберите статус*:</label>
                <select class="reggg" name="status">
                    <option value="active">Активный</option>
                    <option value="nonactive">Неактивный</option>
                </select>
            </div>
            <div class="form-group submit">
                <input class="reggg" type="submit" value="Редактировать" name="sign-up">
            </div>
    </section>
</body>
</html>
