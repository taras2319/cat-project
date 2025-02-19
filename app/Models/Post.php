<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'image', 'author_id', 'status', 'likes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTranslationsOf()
    {
        return null;
    }


}
