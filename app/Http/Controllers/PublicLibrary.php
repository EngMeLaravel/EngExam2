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
        $subcategory = SubCategories::all()->where('cate_id',$id);
        return redirect()->route('get.public_lib.index')->with( ['subcategory' => $subcategory] );
    }

    public function getVocabularies($cate_id, $subcate_id)
    {
        $vocabularies = Vocabularies::where('cate_id', $cate_id, 'subcate_id', $subcate_id);
        return view('vocabulary.list_voca', compact('vocabularies'));
    }
}
