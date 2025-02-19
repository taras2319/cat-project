<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function showForm()
    {
        return view('cats.form'); // Повертаємо вигляд із формою
    }
    // Метод для завантаження фото
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:Мої котики,Вуличні котики,Кумедні моменти',
            'image' => 'required|image|max:10240',
        ]);

        // Збереження фото в папці storage/app/public
        $path = $request->file('image')->store('cats', 'public');

        // Збереження даних у базу
        Photo::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'image' => $path,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('cats.index')->with('success', 'Після перевірки ваше фото з’явиться у нашій галереї! Мяв😊');
    }

    // Метод для відображення галереї з фільтрацією
    public function index(Request $request)
    {
        $category = $request->get('category', ''); // Отримання категорії з URL
        $cats = Photo::when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->get();

        return view('cats.index', compact('cats', 'category'));
    }

    public function approve($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Фотографія успішно підтверджена!');
    }
    public function reject($id)
    {
        $photo = Photo::findOrFail($id); // Знаходимо запис за ID або повертаємо 404
        $photo->update(['status' => 'rejected']); // Оновлюємо статус на "rejected"

        return redirect()->back()->with('success', 'Фотографія успішно відхилена!');
    }

}
