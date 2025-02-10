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
        $posts = Post::latest()->paginate(6);
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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Створення запису
        $post = Post::create($validated);

        // Повернення відповіді
        return response()->json([
            'status' => 'success',
            'message' => 'Пост збережено успішно!',
            'data' => $post,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
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
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Пост видалено!');
    }
}
