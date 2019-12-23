<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicLibrary extends Controller
{
    public function index()
    {
        return view('shared_library.index');
    }
}
