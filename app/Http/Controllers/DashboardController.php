<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Отримуємо список фото (якщо потрібно)
        $photos = Gallery::orderBy('id', 'asc')->get();
        return view('msd.welcome', compact('photos'));

    }
}

