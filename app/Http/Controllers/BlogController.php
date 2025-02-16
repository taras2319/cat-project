<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(6); // Отримуємо блоги з пагінацією
        return view('blog.index', compact('blogs'));
    }
    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

}
