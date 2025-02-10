<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Вказуємо ім'я таблиці
    protected $table = 'contacts';

    protected $fillable = ['name', 'email', 'message'];
}

