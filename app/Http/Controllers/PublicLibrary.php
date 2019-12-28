<?php

namespace App\Http\Controllers;

use App\SubCategories;
use Illuminate\Http\Request;
use App\Categories;

class PublicLibrary extends Controller
{
    public function index()
    {
        $category = Categories::all();
        return view('shared_library.index',compact('category'));
    }

    public function save(Request $request){
        $cate_id   =  $request->cate_id;
        $cate_name = $request->cate_name;
        $category  = Categories::find($cate_id);
        $category->cate_name = $cate_name;
        $category->cate_slug = str_slug($cate_name);
        $category->save();
        return redirect()->back();
    }

    // xóa ngành cha thì ngành con chưa xóa được
    public function delete(Request $request){
        $cate_id  = $request->cate_id;
        $category = Categories::find($cate_id);
        $category->delete();
        return redirect()->back();
    }
}
