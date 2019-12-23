<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class HomeController extends Controller
{
        public function index()
        {
            return view('home.index');
        }
        public function ajax_translate(Request $request){
            if ($request->ajax()){
                $tr = new GoogleTranslate(); // Auto-detected language by default
                $tr->setSource(); // Detect language automatically
                $tr->setTarget('vi');
                $text = $tr->translate($request->keyword);
                echo $text;
            }
        }
}
