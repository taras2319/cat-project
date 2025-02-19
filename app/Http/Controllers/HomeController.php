<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $photos = Gallery::orderBy('id', 'asc')->get();
        return view('msd.welcome', compact('photos'));

    }
}
