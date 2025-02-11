<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function showForm()
    {
        return view('cats.form'); // Повертаємо вигляд із формою
    }
    // Метод для завантаження фото
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|in:Мої котики,Вуличні котики,Кумедні моменти',
            'image' => 'required|image|max:2048',
        ]);

        // Збереження фото в папці storage/app/public
        $path = $request->file('image')->store('cats', 'public');

        // Збереження даних у базу
        Cat::create([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'image' => $path,
        ]);

        return redirect()->route('cats.index')->with('success', 'Фото котика додано!');
    }

    // Метод для відображення галереї з фільтрацією
    public function index(Request $request)
    {
        $category = $request->get('category', ''); // Отримання категорії з URL
        $cats = Cat::when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->get();

        return view('cats.index', compact('cats', 'category'));
    }
}
