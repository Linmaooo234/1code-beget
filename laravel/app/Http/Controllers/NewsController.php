<?php

namespace App\Http\Controllers;

use App\Models\Afisha;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
     public function showNews()
    {
        $query = News::query();
        $news = $query->paginate(6);
        return view('pages.news', compact('news'));
    }

     public function CreateNews()
    {
        return view('pages.createnews');
    }


     public function EditNews($id)
    {
        $news = News::findOrFail($id);
        return view('pages.editnews' ,compact('news'));
    }


    public function createIndexNews(Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|min:2|max:15',
        'description' => 'nullable|string|max:500',
        'img' => 'required|image|max:2048',
    ], [
        'name.required' => 'Поле "Название имени курса" обязательно для заполнения.',
         'img.required' => 'Вставьте картинку',
        'name.string' => 'Поле "Название имени курса" должно быть строкой.',
        'name.max' => 'Поле "Название новости" не может превышать 15 символов',
        'description.string' => 'Поле "Описание" должно быть строкой.',
        'description.max' => 'Поле "Описание" не должно превышать 500 символов.',
    ]);

    $imagePath = $request->file('img')->store('imagesnews', 'public');
    $validated['img'] = $imagePath;

    News::create($validated);

    return redirect()->route('admin.index')->with('success', 'Новость добавлена');
}

    public function updateIndexNews(Request $request, $id) {
        $news = News::findOrFail($id);
        $validated = $request->validate([
            'name'=>'required|string|min:2|max:100',
            'description'=>'nullable|string|max:500',
            'img' => 'required|image|max:2048',
        ], [
            'name.required'=>'Поле "Название имя курса" обязательно для заполнения.',
            'name.string'=>'Поле "Название имя курса" должно быть строкой.',
            'name.max'=>'Поле "Название имя курса" не может превышать 100 символов',
            'description.string'=>'Поле "Описание" должно быть строкой.',
            'description.max'=>'Поле "Описание" не должно превышать 500 символов.',
        ]);

        if($request->hasFile('img')){
            if($news->img){
                Storage::disk('public')->delete($news->img);
            }
            $imagePath = $request->file('img')->store('imagesnews', 'public');
            $validated['img'] = $imagePath;
        }

        $news->update($validated);
        return redirect()->route('admin.index', $id)->with('success', 'Новость отердактирована');
    }

    public function destroyNews($id) {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость удалена');
    }

     public function showNew($id)
    {
        $news = News::findOrFail($id);
        return view('pages.onenew', compact('news'));
    }
}
