<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ренессанс</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/schemezal.css') }}">
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
</head>
@extends('layouts.app')
@section('pages')
<body>
    <!-- схема зала начало -->
    <div class="zagolovkii">
        <h2 class="zagolovkk">ГАМЛЕТ</h2>
        <p class="warning">Внимание</p>
        <p class="warningopis">Выбранные вами места должны быть оплачены банковской картой в течение 30 минут. Обязательно распечатайте приобретенный Вами электронный билет. Его необходимо предъявить при входе в театр.</p>
    </div>

    <div class="schemazalaa">
        <div class="schema">

            <div class="scenes">
                <p class="nazvaniescen">Сцена</p>
                <img src="/storage/media/scene.png" class="scene">
                <p class="nazvaniescen2">Партер</p>
            </div>

            <div class="ryadchislo">
                <p class="chislo">1</p>
                <p class="chislo">2</p>
                <p class="chislo">3</p>
                <p class="chislo">4</p>
                <p class="chislo">5</p>
                <p class="chislo">6</p>
                <p class="chislo">7</p>
                <p class="chislo">8</p>
                <p class="chislo">9</p>
                <p class="chislo">10</p>
                <p class="chislo">11</p>
            </div>

            <div class="ryad">
                <p class="chislo">1</p>
                <input type="hidden" name="afisha_id" id="afisha_id" value="{{ $course->id }}">
                <div class="seat category1" data-row="1" data-number="1" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="1" data-number="2" data-category="1" data-price="10.00"></div>
                <div class="seat category2" data-row="1" data-number="3" data-category="1" data-price="10.00"></div>
                <div class="seat category2" data-row="1" data-number="4" data-category="1" data-price="10.00"></div>
                <div class="seat category2" data-row="1" data-number="5" data-category="1" data-price="10.00"></div>
                <div class="seat category2" data-row="1" data-number="6" data-category="1" data-price="10.00"></div>
                <div class="seat category2" data-row="1" data-number="7" data-category="1" data-price="10.00"></div>
                <div class="seat category2" data-row="1" data-number="8" data-category="1" data-price="10.00"></div>
                <div class="seat category2" data-row="1" data-number="9" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="1" data-number="10" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="1" data-number="11" data-category="1" data-price="10.00"></div>
            </div>

            <div class="ryad">
                <p class="chislo">2</p>
                <div class="seat category1" data-row="2" data-number="1" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="2" data-number="2" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="2" data-number="3" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="2" data-number="4" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="2" data-number="5" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="2" data-number="6" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="2" data-number="7" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="2" data-number="8" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="2" data-number="9" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="2" data-number="10" data-category="1" data-price="10.00"></div>
                <div class="seat category1" data-row="2" data-number="11" data-category="1" data-price="10.00"></div>
            </div>

            <div class="ryad">
                <p class="chislo">3</p>
                <div class="seat category3" data-row="3" data-number="1" data-category="1" data-price="10.00"></div>
                <div class="seat category3" data-row="3" data-number="2" data-category="1" data-price="10.00"></div>
                <div class="seat category3" data-row="3" data-number="3" data-category="1" data-price="10.00"></div>
                <div class="seat category3" data-row="3" data-number="4" data-category="1" data-price="10.00"></div>
                <div class="seat category3" data-row="3" data-number="5" data-category="1" data-price="10.00"></div>
                <div class="seat category3" data-row="3" data-number="6" data-category="1" data-price="10.00"></div>
                <div class="seat category3" data-row="3" data-number="7" data-category="1" data-price="10.00"></div>
                <div class="seat category3" data-row="3" data-number="8" data-category="1" data-price="10.00"></div>
                <div class="seat category3" data-row="3" data-number="9" data-category="1" data-price="10.00"></div>
                <div class="seat category3" data-row="3" data-number="10" data-category="1" data-price="10.00"></div>
                <div class="seat category3" data-row="3" data-number="11" data-category="1" data-price="10.00"></div>
            </div>

            <div class="ryad">
                <p class="chislo">4</p>
                <div class="seat category4" data-row="4" data-number="1" data-category="1" data-price="10.00"></div>
                <div class="seat category4" data-row="4" data-number="2" data-category="1" data-price="10.00"></div>
                <div class="seat category4" data-row="4" data-number="3" data-category="1" data-price="10.00"></div>
                <div class="seat category4" data-row="4" data-number="4" data-category="1" data-price="10.00"></div>
                <div class="seat category4" data-row="4" data-number="5" data-category="1" data-price="10.00"></div>
                <div class="seat category4" data-row="4" data-number="6" data-category="1" data-price="10.00"></div>
                <div class="seat category4" data-row="4" data-number="7" data-category="1" data-price="10.00"></div>
                <div class="seat category4" data-row="4" data-number="8" data-category="1" data-price="10.00"></div>
                <div class="seat category4" data-row="4" data-number="9" data-category="1" data-price="10.00"></div>
                <div class="seat category4" data-row="4" data-number="10" data-category="1" data-price="10.00"></div>
                <div class="seat category4" data-row="4" data-number="11" data-category="1" data-price="10.00"></div>
            </div>

            <div class="ryad">
                <p class="chislo">5</p>
                <div class="seat category5" data-row="5" data-number="1" data-category="1" data-price="10.00"></div>
                <div class="seat category5" data-row="5" data-number="2" data-category="1" data-price="10.00"></div>
                <div class="seat category5" data-row="5" data-number="3" data-category="1" data-price="10.00"></div>
                <div class="seat category5" data-row="5" data-number="4" data-category="1" data-price="10.00"></div>
                <div class="seat category5" data-row="5" data-number="5" data-category="1" data-price="10.00"></div>
                <div class="seat category5" data-row="5" data-number="6" data-category="1" data-price="10.00"></div>
                <div class="seat category5" data-row="5" data-number="7" data-category="1" data-price="10.00"></div>
                <div class="seat category5" data-row="5" data-number="8" data-category="1" data-price="10.00"></div>
                <div class="seat category5" data-row="5" data-number="9" data-category="1" data-price="10.00"></div>
                <div class="seat category5" data-row="5" data-number="10" data-category="1" data-price="10.00"></div>
                <div class="seat category5" data-row="5" data-number="11" data-category="1" data-price="10.00"></div>
            </div>
            <button class="buttonbuy" id="open-modal-btn" style="display:none;">Перейти к оплате</button>

        </div>
    </div>

  <div id="modal" class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
        <h2 class="zagolovmodal">Подтверждение заказа</h2>
        <p class="opisaniemodal" id="seat-info"></p>
        <label for="email">Ваш Email:</label>
        <input type="email" id="email" name="email" required>
        <p class="total" id="total-sum"></p>
        <button class="modalbtnn" id="confirm-purchase">Оформить заказ</button>
    </div>
</div>

<!-- Новая кнопка -->
<button id="open-modal-btn" style="display:none;">Открыть модальное окно</button>



    <div class="nedostupno">
        <div class="kvadratt"></div>
        <p class="nedos">НЕДОСТУПНО</p>
    </div>
<div id="tooltip" class="tooltip"></div>
<script>
    // Определение всех нужных элементов
    const seats = document.querySelectorAll('.seat');
    const modal = document.getElementById('modal');
    const seatInfo = document.getElementById('seat-info');
    const totalSumEl = document.getElementById('total-sum');
    const openModalBtn = document.getElementById('open-modal-btn');
    const confirmPurchaseBtn = document.getElementById('confirm-purchase');
    const closeButton = document.querySelector('.close-button');
    const tooltip = document.getElementById('tooltip');

    let selectedSeats = []; // Массив выбранных мест

    // Обработчик выбора места
    seats.forEach(seat => {
        seat.addEventListener('click', () => {
            if (!seat.classList.contains('sold-out')) {
                if (seat.classList.contains('selected')) { // Если место уже выбрано, снимаем выбор
                    seat.classList.remove('selected');
                    selectedSeats = selectedSeats.filter(s => s !== seat);
                } else { // Иначе добавляем в список выбранных
                    seat.classList.add('selected');
                    selectedSeats.push(seat);
                }

                updateSelectedSeatsInfo(); // Обновляем информацию о выбранных местах
            }
        });

        // Наведение курсора
        seat.addEventListener('mouseenter', () => {
            const rect = seat.getBoundingClientRect();
            const x = rect.left + window.scrollX;
            const y = rect.top + window.scrollY;

            const info = `
                Ряды: ${seat.dataset.row}<br/>
                Место: ${seat.dataset.number}<br/>
                Цена: ₽${seat.dataset.price}
            `;

            tooltip.innerHTML = info;
            tooltip.style.left = `${x + 10}px`;
            tooltip.style.top = `${y + 10}px`;
            tooltip.style.display = 'block';
        });

        // Выход курсора
        seat.addEventListener('mouseleave', () => {
            tooltip.style.display = 'none';
        });
    });

    // Открывает модальное окно с информацией о покупке
    function showModalWithSeatInfo() {
        if (selectedSeats.length > 0) {
            const rowsAndNumbers = selectedSeats.map(seat => `${seat.dataset.row}-${seat.dataset.number}`);

            // Вычисляем общую сумму
            const totalPrice = selectedSeats.reduce((sum, seat) => sum + parseFloat(seat.dataset.price), 0).toFixed(2);

            seatInfo.innerText = `Выбранные места: ${rowsAndNumbers.join(', ')}.`;
            totalSumEl.innerText = `Общая сумма: ₽${totalPrice}`;
            modal.style.display = 'block'; // Показываем модальное окно
        }
    }

    // Обновляет состояние интерфейса при изменении списка выбранных мест
    function updateSelectedSeatsInfo() {
        if (selectedSeats.length > 0) {
            openModalBtn.style.display = 'inline-block'; // Показываем кнопку открытия модала
        } else {
            openModalBtn.style.display = 'none'; // Скрываем кнопку открытия модала
        }
    }

    // Прикрепляем обработчики событий
    openModalBtn.addEventListener('click', showModalWithSeatInfo); // Нажатие на кнопку открывает модальное окно
    closeButton.addEventListener('click', () => modal.style.display = 'none'); // Закрытие модального окна

    // Подтверждаем покупку билета
    confirmPurchaseBtn.addEventListener('click', async (event) => {
        event.preventDefault();

        if (selectedSeats.length > 0) {
            const tickets = selectedSeats.map(seat => ({
                row_number: seat.dataset.row,
                seat_number: seat.dataset.number,
                category: seat.dataset.category,
                price: seat.dataset.price
            }));

            const afishaId = document.getElementById('afisha_id').value;
            const email = document.getElementById('email').value;

            await fetch('{{ route("purchuase.ticket") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    tickets: tickets,
                    afisha_id: afishaId,
                    email: email
                })
            }).then(response => response.json())
              .then(data => {
                  if (data.status === 'success') {
                      alert(data.message);

                      // Обновляем данные о проданных билетах
                      const currentSoldSeats = loadSoldSeatsForAfisha(afishaId);
                      tickets.forEach(ticket => {
                          currentSoldSeats.push({ row_number: ticket.row_number, seat_number: ticket.seat_number });
                      });
                      saveSoldSeatsForAfisha(afishaId, currentSoldSeats);

                      selectedSeats.forEach(seat => seat.classList.add('sold-out')); // Очищаем выделенные места
                      modal.style.display = 'none'; // Закрываем модальное окно
                  } else {
                      alert(data.message);
                  }
              }).catch(error => console.error('Ошибка:', error));
        }
    });

    // Сохранение и получение данных о проданных местах
    function saveSoldSeatsForAfisha(afishaId, soldSeatsData) {
        try {
            localStorage.setItem(`soldSeats-${afishaId}`, JSON.stringify(soldSeatsData));
        } catch(e) {
            console.error('Ошибка при сохранении данных:', e);
        }
    }

    function loadSoldSeatsForAfisha(afishaId) {
        return JSON.parse(localStorage.getItem(`soldSeats-${afishaId}`)) || [];
    }

    // Применяет классы sold-out для элементов
    function applySoldOutClasses(soldSeatsData) {
        soldSeatsData.forEach(seat => {
            const seatElement = document.querySelector(`.seat[data-row="${seat.row_number}"][data-number="${seat.seat_number}"]`);
            if (seatElement) {
                seatElement.classList.add('sold-out');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const afishaId = document.getElementById('afisha_id').value;
        const savedSeats = loadSoldSeatsForAfisha(afishaId);
        if (savedSeats.length > 0) {
            applySoldOutClasses(savedSeats);
        }

        fetch('http://127.0.0.1:8000/schemezal/poluchienie', {
            method: "POST",
            body: new URLSearchParams({'afisha_id': afishaId}),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-TOKEN': 'JJKdA4beObkj804PX6pbInKlnHW9cRYLeVk4WxsH'
            }
        }).then(response => {
            if (!response.ok) throw new Error(`Ошибка сети: ${response.status}`);
            return response.text();
        }).then(text => {
            console.log('Полученный ответ:', text);
            try {
                const data = JSON.parse(text);
                applySoldOutClasses(data);
            } catch(err) {
                console.error('Ошибка разбора JSON:', err);
            }
        }).catch(error => console.error('Ошибка при получении данных:', error));
    });


</script>
<script>
document.getElementById('confirm-purchase').addEventListener('click', function () {
    location.reload();
});

</script>

</body>
@endsection
</html>
