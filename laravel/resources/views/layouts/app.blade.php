<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ренессанс</title>
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    @include('include.header')
    @yield('pages')
    @include('include.footer')
<script>
document.addEventListener("DOMContentLoaded", function() {
    @if(session('success'))
        Swal.fire({
            // Меняем стандартные параметры для персонализации алерта
            position: 'bottom-end',          // Расположение сверху справа
            backgroundColor: 'transparent',   // Фоновые цвета
            color: '#3c3c3b',             // Цвет текста
            width: 300,                   // Ширина окна
            padding: '1rem',              // Внутренний отступ от границ
            customClass: {                // Дополнительные классы для кастомизации
                popup: 'my-custom-popup'
            },
            icon: 'false',              // Тип иконки
            title: '{{ session('success') }}',  // Заголовок
            showConfirmButton: false,     // Кнопка подтверждения отсутствует
            timer: 1500,                  // Таймер автоматического закрытия
            timerProgressBar: true       // Показываем прогресс бар обратного отсчета
        });
    @endif
});
</script>
</body>
</html>
