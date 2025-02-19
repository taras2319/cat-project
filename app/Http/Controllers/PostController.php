<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('status', 'approved')->latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.

    public function create()
    {
        return view('posts.create');
    }*/

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валідація даних
       $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        // Перевіряємо, чи користувач завантажив зображення
        if ($request->hasFile('image')) {
            \Log::info("Отримано файл: " . $request->file('image')->getClientOriginalName());
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            \Log::error("Файл не переданий!");
        }

        // Створення запису
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => auth()->id(), // Додаємо ID авторизованого користувача
            'image' => $imagePath,
            'likes' => 0,
        ]);

        // Повернення відповіді
        return response()->json([
            'status' => 'success',
            'message' => 'Пост збережено успішно!',
            'data' => $post,
        ]);
    }


    /**
     * Display the specified resource.
     *
    public function show(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:5',

        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Пост оновлено!');
    }

    /**
     * Remove the specified resource from storage.

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Пост видалено!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function like($id)
    {
        $story = Post::findOrFail($id);
        $story->likes += 1; // Збільшуємо кількість лайків
        $story->save();

        return response()->json(['likes' => $story->likes]);
    }

    public function approve($id)
    {
        $photo = Post::findOrFail($id);
        $photo->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Фотографія успішно підтверджена!');
    }
    public function reject($id)
    {
        $photo = Post::findOrFail($id); // Знаходимо запис за ID або повертаємо 404
        $photo->update(['status' => 'rejected']); // Оновлюємо статус на "rejected"

        return redirect()->back()->with('success', 'Фотографія успішно відхилена!');
    }
}
