<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email'));

        return back()->with('success', 'Ваш профіль було оновлено!');
    }
    public function destroy(Request $request)
    {
        // Валідація пароля
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        // Отримуємо користувача
        $user = Auth::user();

        // Видаляємо користувача
        $user->delete();

        // Завершуємо сесію
        Auth::logout();

        // Перенаправляємо на головну сторінку
        return redirect('/')->with('success', 'Ваш акаунт був успішно видалений.');
    }



}
