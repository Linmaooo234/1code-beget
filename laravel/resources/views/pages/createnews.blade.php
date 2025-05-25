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
   <h2 class="zagregist">Добавление новости</h2>
<section class="sign">
    <div class="container">
        <form class="regist" enctype="multipart/form-data" action="{{route('tovar.createsnews')}}" method="post" name="sign-up">
            @csrf
            <div class="form-group">
                <label for="img">Добавьте картинку*:</label>
                <input type="file" class="reggg" id="img" name="img">
            </div>
               @error('img')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="name">Введите название новости*:</label>
                <input class="reggg" type="text" name="name" placeholder="Название новости">
            </div>
               @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="description">Введите содержание*:</label>
                <textarea class="reggg" name="description" rows="4" placeholder="Содержание новости"></textarea>
            </div>
               @error('description')
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
