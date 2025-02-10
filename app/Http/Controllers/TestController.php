<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TestController extends Controller
{
    public function index()
    {
        return 'Це метод index в TestController';
    }

}
