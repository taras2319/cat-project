<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'status', 'user_id', 'category'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}

