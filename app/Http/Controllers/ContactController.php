<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Метод для відображення форми
    public function submit(Request $request)
    {
        // Валідація даних
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Збереження в базу даних
        $contact = Contact::create($validated);

        // Дані для листа
        $details = ([
            'name' => $contact->name,
            'email' => $contact->email,
            'message' => $contact->message,
        ]);

        Mail::to(['anyakushch17@gmail.com', 'taras2319@gmail.com'])->send(new ContactMail($details));

        // Повернення з повідомленням про успіх
        return redirect()->route('home')->with('success', 'Ваше повідомлення було відправлено!');
    }
}
