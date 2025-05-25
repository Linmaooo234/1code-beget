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
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('style/addafiaha.css') }}">
</head>
<body>
   <h2 class="zagregist">Добавление афиши</h2>
<section class="sign">
    <div class="container">
        <form class="regist" enctype="multipart/form-data" action="{{route('tovar.creates')}}" method="post" name="sign-up">
            @csrf
            <div class="form-group">
                <label for="img">Добавьте картинку*:</label>
                <input type="file" class="reggg" id="img" name="img">
            </div>
             @error('img')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="nametov">Добавьте название афиши*:</label>
                <input class="reggg" type="text" name="nametov" placeholder="Название мероприятия">
            </div>
             @error('nametov')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="description">Добавьте описание афиши*:</label>
                <textarea class="reggg" name="description" rows="4" placeholder="Краткое описание мероприятия"></textarea>
            </div>
             @error('description')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="time">Добавьте время начала события*:</label>
                <input class="reggg" type="time" name="time">
            </div>
             @error('time')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="data">Добавьте дату события*:</label>
                <input class="reggg" type="date" name="data">
            </div>
             @error('data')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="nedelya">Добавьте день недели*:</label>
                <input class="reggg" type="text" name="nedelya" placeholder="Например, Понедельник">
            </div>
             @error('nedelya')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="chislo">Добавьте число*:</label>
                <input class="reggg" type="number" name="chislo" placeholder="Например, 06 или 24">
            </div>
             @error('chislo')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="year">Добавьте год*:</label>
                <input class="reggg" type="number" name="year" placeholder="Например, 2025">
            </div>
             @error('year')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="month">Добавьте месяц*:</label>
                <input class="reggg" type="text" name="month" placeholder="Например, Январь">
            </div>
             @error('month')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="status">Выберите статус*:</label>
                <select class="reggg" name="status">
                    <option value="active">Активный</option>
                    <option value="nonactive">Неактивный</option>
                </select>
            </div>
             @error('status')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form-group submit">
                <input class="reggg" type="submit" value="Добавить" name="sign-up">
            </div>
        </form>
    </div>
</section>

</body>
</html>
