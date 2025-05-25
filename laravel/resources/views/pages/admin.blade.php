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
    <link rel="stylesheet" href="{{ asset('style/adminacc.css') }}">
 <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>


    <div class="admin-panel">
        <header class="useracc">
            <div class="user">

                <div class="opisuser">
                    <a href="{{ route('pages.create') }}"><button class="addtovar">Добавить афишу</button></a>
                    <a href="{{ route('pages.createnews') }}"><button class="addtovar">Добавить новости</button></a>
                </div>
                <div class="btnexit">
                    <a href="{{ route('pages.index') }}"><p>Вернутся на сайт</p></a>
                    <a href="#one"><p>Представления</p></a>
                    <a href="#two"><p>Новости</p></a>
                    <a href="#three"><p>Билеты</p></a>
                    <a href="#four"><p>Статистика</p></a>
                </div>
            </div>
        </header>

<h1 class="ticketzagalov" id="one">Все представления:</h1>
<table class="afisha-table">
    <thead>
        <tr>
            <th>Картинка</th>
            <th>Название события</th>
            <th>Дата и время</th>
            <th>Письменное значение</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
            <tr>
                <td><img src="{{ asset('storage/' . $course->img) }}" class="imagekat"></td>
                <td>{{ $course->nametov }}</td>
                <td>{{ $course->data }}, {{ $course->time }}</td>
                <td>{{ $course->chislo }}, {{ $course->month }}, {{ $course->nedelya }}, {{ $course->year }}</td>
                <td>
                    <!-- Редактирование -->
                    <a href="{{ route('tovar.edit', $course->id) }}"><button class="edit-btn">Редактировать</button></a>

                    <!-- Форма для удаления -->
                    <form action="{{ route('destroy', $course->id) }}" method="POST" style="display: inline-block;" id="delete-form-course-{{ $course->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn confirm-delete" data-id="{{ $course->id }}">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Новости -->
<h1 class="ticketzagalov" id="two">Все новости:</h1>
<table class="afisha-table">
    <thead>
        <tr>
            <th>Картинка</th>
            <th>Название новости</th>
            <th>Описание</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news as $new)
            <tr>
                <td><img src="{{ asset('storage/' . $new->img) }}" class="imagekat"></td>
                <td>{{ $new->name }}</td>
                <td class="descnews">{{ $new->description }}</td>
                <td>
                    <!-- Редактирование -->
                    <a href="{{ route('tovar.editnews', $new->id) }}"><button class="edit-btn">Редактировать</button></a>

                    <!-- Форма для удаления -->
                    <form action="{{ route('destroynews', $new->id) }}" method="POST" style="display: inline-block;" id="delete-form-news-{{ $new->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn confirm-delete" data-id="{{ $new->id }}">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



     <div>
    <h1 class="ticketzagalov" id="three">Все купленные билеты:</h1>
    @if(count($tickets) > 0)
        <table class="afisha-table">
            <thead>
                <tr>
                    <th>Пользователь</th>
                    <th>Мероприятие</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Ряд/Место</th>
                    <th>Цена</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr data-ticket-id="{{ $ticket->id }}">
                        <td>{{ $ticket->user ? $ticket->user->name : 'НЕТ' }}</td>
                        <td>{{ $ticket->afisha->nametov ?? '' }}</td>
                        <td>{{ date("d.m.Y", strtotime($ticket->afisha->data)) }}</td>
                        <td>{{ date("H:i", strtotime($ticket->afisha->time)) }}</td>
                        <td>Ряд {{ $ticket->row_number }}, № {{ $ticket->seat_number }}</td>
                        <td>{{ number_format($ticket->price, 2, '.', '') }} руб.</td>
                        <td><button class="deleteees" onclick="returnTicket({{ $ticket->id }})">Вернуть билет</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Нет купленных билетов.</p>
    @endif
</div>

<div class="container mt-5" id="four">
    <h1>Статистика покупок билетов:</h1>
    <canvas id="myChart" width="400" height="200"></canvas>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Количество продаж билетов',
                data: @json($data),
                backgroundColor: '#ffc107',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});
</script>

<script>
    function returnTicket(ticketId) {
        if (confirm("Вы уверены, что хотите вернуть этот билет?")) {
            fetch('/return_ticket/' + ticketId, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => response.json())
              .then(data => {
                  if (data.status === 'success') {
                      alert(data.message);

                      // Удаляем статус sold-out на клиентской стороне
                      const { row_number, seat_number, afisha_id } = data.ticket_data;
                      const seatElement = document.querySelector(`.seat[data-row="${row_number}"][data-number="${seat_number}"]`);
                      if (seatElement) {
                          seatElement.classList.remove('sold-out');
                      }

                      // Обновляем localStorage на клиентской стороне
                      const soldSeatsKey = `soldSeats-${afisha_id}`;
                      let soldSeats = JSON.parse(localStorage.getItem(soldSeatsKey)) || [];
                      soldSeats = soldSeats.filter(seat => !(seat.row_number == row_number && seat.seat_number == seat_number));
                      localStorage.setItem(soldSeatsKey, JSON.stringify(soldSeats));

                      location.reload(); // Перезагрузка страницы для полного обновления данных
                  } else {
                      alert(data.message);
                  }
              }).catch(error => console.error('Ошибка:', error));
        }
    }
</script>
<!-- Модальное окно -->
<div id="confirm-modal" class="modal" style="display:none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.7);">
    <div class="modal-content" style="background-color:#fefefe; margin:15% auto; padding:20px; border:1px solid #888; width:50%; text-align:center;">
        <span class="close" onclick="closeModal()">×</span>
        <p class="textmodal">Вы действительно хотите удалить этот элемент?</p>
        <button id="yes-button" class="btn btn-danger">Да</button>
        <button id="no-button" class="btn btn-primary" onclick="closeModal()">Нет</button>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll('.confirm-delete');

    // Обрабатываем каждый клик по кнопкам удаления
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event){
            event.preventDefault(); // Остановка стандартной отправки формы

            let formId = this.getAttribute('data-id'); // Получаем ID записи
            openModal(formId); // Открываем модальное окно
        });
    });
});

// Функция открытия модального окна
function openModal(id) {
    var modal = document.getElementById('confirm-modal');
    modal.style.display = 'block';

    // Устанавливаем событие для кнопки "Да"
    document.getElementById('yes-button').addEventListener('click', function(){
        closeModal();

        // Отправляем соответствующую форму
        if(document.getElementById(`delete-form-course-${id}`)) { // Проверяем наличие курса
            document.getElementById(`delete-form-course-${id}`).submit();
        } else if(document.getElementById(`delete-form-news-${id}`)){ // Или проверяем новость
            document.getElementById(`delete-form-news-${id}`).submit();
        }
    });
}

// Закрытие модального окна
function closeModal() {
    var modal = document.getElementById('confirm-modal');
    modal.style.display = 'none';
}
</script>
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

<a id="scrollToTopBtn" title="Наверх"></a>

<script>
window.onscroll = function() { scrollFunction(); };

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        // Если прокрутили ниже 20 пикселей от верха страницы — показываем кнопку
        document.getElementById("scrollToTopBtn").style.display = "block";
    } else {
        // Иначе скрываем её
        document.getElementById("scrollToTopBtn").style.display = "none";
    }
}

// Обработчик клика по кнопке
document.getElementById('scrollToTopBtn').onclick = function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};
</script>
</body>
</html>
