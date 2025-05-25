<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Afisha;
use App\Models\News;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
class AfishaController extends Controller
{
   public function showIndex()
{
     $latestNews = News::orderBy('created_at', 'desc')->take(3)->get();

    $latestAfishas = Afisha::orderBy('created_at', 'desc')->take(3)->get();

    return view('pages.index', compact('latestAfishas','latestNews'));
}

     public function showContact() {
        return view('pages.contact');
    }

    public function showApp() {
        return view('layouts.app');
    }

    public function showDesign() {
        return view('pages.design');
    }

    public function showEdit($id) {
        $afisha = Afisha::findOrFail($id);
        return view('pages.edit', compact('afisha'));
    }

    public function showShow($id) {
        $course = Afisha::findOrFail($id);
        return view('pages.show', compact('course'));
    }

  public function showCatalog(Request $request)
{
    // Получаем диапазон дат
    $dateRange = explode(' to ', $request->input('date_range'));

    // Проверяем наличие обоих значений
    if (!empty($dateRange)) {
        list($fromDate, $toDate) = array_pad($dateRange, 2, null);

        // Создаем основной запрос
        $query = Afisha::query()
            ->when($fromDate && $toDate, function ($q) use ($fromDate, $toDate) {
                // Фильтр по вашему полному столбцу `data`
                $q->whereBetween('data', ["$fromDate 00:00:00", "$toDate 23:59:59"]);
            });
    } else {
        $query = Afisha::query(); // базовый запрос, если ничего не передано
    }

    // Проводим пагинацию
    $courses = $query->paginate(6);

    $user = Auth::user();
    return view('pages.katalog', compact('courses', 'user'));
}


   public function indexAdmin()
{
    // Выбираем список афиш вместе с количеством проданных билетов
    $popularEvents = Afisha::withCount(['tickets'])->orderByDesc('tickets_count')->get();

    // Данные о курсах и новостях остаются прежними
    $courses = Afisha::all(); // Если такие нужны
    $news = News::all();
    $currentUser = Auth::user();
    $tickets = Ticket::with('afisha')->get();

    $labels = $popularEvents->pluck('nametov');
$data = $popularEvents->pluck('tickets_count');

   return view('pages.admin', compact(
    'courses', 'tickets', 'news', 'popularEvents', 'labels', 'data'
));
}


    public function showCreate() {
        $user = Auth::user();
        return view('pages.create', compact('user'));
    }

public function createIndex(Request $request) {
    $validated = $request->validate([
        'nametov' => 'required|string|min:2|max:25',
        'description' => 'nullable|string|max:500',
        'data' => 'required|date',
        'img' => 'required|image|max:2048',
        'nedelya' => 'required|string|max:500',
        'chislo' => 'required|string|max:500',
        'year' => 'required|string|max:500',
        'month' => 'required|string|max:500',
        'time' => 'required|date_format:H:i',
        'status' => 'required|in:active,nonactive'
    ], [
        'nametov.required' => 'Поле "Название афиши" обязательно для заполнения.',
        'nametov.string' => 'Поле "Название афиши" должно быть строкой.',
        'nametov.max' => 'Поле "Название афиши" не может превышать 25 символов',
        'description.string' => 'Поле "Описание" должно быть строкой.',
        'description.max' => 'Поле "Описание" не должно превышать 500 символов.',
        'data.required' => 'Поле "Дата" не должно быть пустым',
        'img.required' => 'Поле "Каритинка" не должно быть пустым',
        'nedelya.required' => 'Поле "Неделя" не должно быть пустым',
        'chislo.required' => 'Поле "Число" не должно быть пустым',
        'year.required' => 'Поле "Год" не должно быть пустым',
        'month.required' => 'Поле "Месяц" не должно быть пустым',
        'time.required' => 'Поле "Время" не должно быть пустым',
        'status.required' => 'Поле "Статус" не должно быть пустым',
        'description.nullable' => 'Поле "Описание" не должно быть пустым',
    ]);

    // Загружаем изображение
    $imagePath = $request->file('img')->store('images', 'public');
    $validated['img'] = $imagePath;

    // Сохраняем новый объект афиши
    Afisha::create($validated);

    return redirect()->route('admin.index')->with('success', 'Представление успешно добавлено!');
}

    public function updateIndex(Request $request, $id) {
        $course = Afisha::findOrFail($id);
        $validated = $request->validate([
            'nametov'=>'required|string|min:2|max:100',
            'description'=>'nullable|string|max:500',
            'data'=>'required|date',
            'img' => 'required|image|max:2048',
            'nedelya'=>'required|string|max:500',
            'chislo'=>'required|string|max:500',
            'year'=>'required|string|max:500',
            'time'=>'required|date_format:H:i',
            'month'=>'required|string|max:500',
            'status' => 'required|in:active,nonactive'
        ], [
            'nametov.required' => 'Поле "Название афиши" обязательно для заполнения.',
            'nametov.string' => 'Поле "Название афиши" должно быть строкой.',
            'nametov.max' => 'Поле "Название афиши" не может превышать 25 символов',
            'description.string' => 'Поле "Описание" должно быть строкой.',
            'description.max' => 'Поле "Описание" не должно превышать 500 символов.',
            'data.required' => 'Поле "Дата" не должно быть пустым',
            'img.required' => 'Поле "Каритинка" не должно быть пустым',
            'nedelya.required' => 'Поле "Неделя" не должно быть пустым',
            'chislo.required' => 'Поле "Число" не должно быть пустым',
            'year.required' => 'Поле "Год" не должно быть пустым',
            'month.required' => 'Поле "Месяц" не должно быть пустым',
            'time.required' => 'Поле "Время" не должно быть пустым',
            'status.required' => 'Поле "Статус" не должно быть пустым',
        ]);

        if($request->hasFile('img')){
            if($course->img){
                Storage::disk('public')->delete($course->img);
            }
            $imagePath = $request->file('img')->store('images', 'public');
            $validated['img'] = $imagePath;
        }

        $course->update($validated);
        return redirect()->route('admin.index', $id)->with('success', 'Афиша отредактирован!');
    }

    public function destroy($id) {
        $course = Afisha::findOrFail($id);
        $course->delete();
        return redirect()->route('admin.index')->with('success', 'Афиша удалена');
    }
}
