<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Afisha;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\File;
use PDF;
class TicketController extends Controller
{

    public function schemaZala($id) {
        $course = Afisha::findOrFail($id);
        return view('pages.schemezal', compact('course'));
    }



   public function getPurchaseTicket(Request $request)
{
    $tickets = Ticket::where('afisha_id', $request->afisha_id)->get()->toArray();
    return response()->json($tickets);
}
public function createTickets(Request $request)
{
        $validated = $request->validate([
        'tickets.*.row_number' => 'required|integer',
        'tickets.*.seat_number' => 'required|integer',
        'tickets.*.category' => 'required|string',
        'tickets.*.price' => 'required|numeric',
        'afisha_id' => 'required|integer',
        'email' => 'required|email'
    ]);

    $tickets = $validated['tickets'];
    $afishaId = $validated['afisha_id'];
    $email = $validated['email'];

    // Получаем идентификатор текущего пользователя
    $userId = $request->user()->id;

    foreach ($tickets as $ticketData) {
        $existingTicket = Ticket::where('row_number', $ticketData['row_number'])
                                ->where('seat_number', $ticketData['seat_number'])
                                ->where('afisha_id', $afishaId)
                                ->first();

        if ($existingTicket && $existingTicket->status != 'sold') {
            // Обновляем статус билета и добавляем user_id
            $existingTicket->update([
                'status' => 'sold',
                'user_id' => $userId
            ]);
        } elseif (!$existingTicket) {
            // Создаем новый билет и сразу же привязываем к нему user_id
            Ticket::create(array_merge($ticketData, [
                'status' => 'sold',
                'afisha_id' => $afishaId,
                'user_id' => $userId
            ]));
        }
    }

    // Подготовка общего шаблона писем для каждого купленного билета
    $allTicketsDetails = [];
    foreach ($tickets as $ticketData) {
        $ticketRow = $ticketData['row_number'];
        $ticketSeat = $ticketData['seat_number'];
        $ticketCategory = $ticketData['category'];
        $ticketPrice = $ticketData['price'];

        $ticket = Ticket::where('row_number', $ticketRow)
                        ->where('seat_number', $ticketSeat)
                        ->where('afisha_id', $afishaId)
                        ->first();

        $allTicketsDetails[] = [
            'rowNumber' => $ticketRow,
            'seatNumber' => $ticketSeat,
            'eventName' => $ticket->afisha->nametov,
            'eventDate' => date("d.m.Y", strtotime($ticket->afisha->data)),
            'eventTime' => date("H:i", strtotime($ticket->afisha->time))
        ];
    }



    // Генерация HTML-шаблона письма
$template = view('pages.ticket_template', compact('allTicketsDetails'))->render();

    // Отправка письма на почту
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.yandex.ru';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'zalalsas@yandex.ru';
        $mail->Password   = 'dekepiwlygrhybxk';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('zalalsas@yandex.ru', 'zalalsas@yandex.ru');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Ваши билеты успешно забронированы!';
        $mail->Body    = $template;
        $mail->AltBody = strip_tags($template);

        $mail->send();
        return response()->json(['status' => 'success', 'message' => 'Все билеты успешно приобретены!']);
    } catch (Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Не удалось приобрести билеты. Попробуйте позже.']);
    }
}
  public function returnTicket(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        // Удаляем билет из базы данных
        $ticket->delete();

        // Отвечаем клиенту успешностью операции
        return response()->json([
            'status' => 'success',
            'message' => 'Билет успешно возвращён!',
            'ticket_data' => [
                'row_number' => $ticket->row_number,
                'seat_number' => $ticket->seat_number,
                'afisha_id' => $ticket->afisha_id
            ]
        ]);
    }
}
