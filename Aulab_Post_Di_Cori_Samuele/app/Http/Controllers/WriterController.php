<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function dashboard()
    {
        return view('article.create');
    }
}
