<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; // Підключаємо модель

class MessageController extends Controller
{
    public function store(Request $request)
    {
        // Валідація вхідних даних
        $request->validate([
            'message' => 'required|min:3|max:255',
        ]);

        // Збереження в базу даних
        $message = Message::create([
            'content' => $request->message,
        ]);

        // Повертаємо відповідь у форматі JSON
        return response()->json([
            'status' => 'success',
            'message' => 'Повідомлення збережено!',
            'data' => $message
        ]);
    }
}
