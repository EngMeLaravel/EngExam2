<?php

namespace App\Http\Controllers;

use App\SubCategories;
use App\Vocabularies;
use Illuminate\Http\Request;
use App\Categories;

class PublicLibrary extends Controller
{
    public function index()
    {
        $category = Categories::all();
        return view('shared_library.index',compact('category'));
    }

    public function show($id)
    {
        $category = Categories::all();
        $subcategory = SubCategories::all()->where('cate_id',$id);
        $viewData = [
            'category' => $category,
            'subcategory' => $subcategory
        ];
        return view('shared_library.index', $viewData);
    }

    public function getVocabularies($cate_id, $subcate_id)
    {
        $category = Categories::all();
        $vocabularies = Vocabularies::where([['cate_id', $cate_id], ['subcate_id', $subcate_id]])->get();
        $viewData = [
            'category' => $category,
            'vocabularies' => $vocabularies
        ];
        return view('shared_library.index', $viewData);
    }
}
