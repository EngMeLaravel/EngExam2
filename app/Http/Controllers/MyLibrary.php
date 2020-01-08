<?php

namespace App\Http\Controllers;

use App\myCategories;
use App\mySubCategories;
use App\MyVocabularies;
use Illuminate\Http\Request;

class MyLibrary extends Controller
{
    public function index()
    {
        $my_category = myCategories::where('user_id',get_data_user('web'))->get();
        return view('my_library.index',compact('my_category'));
    }

    public function show($id){
        $my_category = myCategories::where('user_id',get_data_user('web'))->get();
        $mysubcategory = mySubCategories::all()->where('my_category_id',$id);
        return view('my_library.index', compact('mysubcategory','my_category'));
    }

    public function add(Request $request){
        $my_category = new myCategories();

        $my_category->user_id = get_data_user('web');
        $my_category->my_cate_name         = $request->my_cate_name;
        $my_category->my_cate_slug         = str_slug($request->my_cate_name);

        if ($request->hasFile('my_cate_avatar')) {

            $file = upload_image('my_cate_avatar');

            if (isset($file['name'])) {
                $my_category->my_cate_avatar = $file['name'];
            }

        }

        $my_category->save();

        return redirect()->back();
    }

    public function save(Request $request){
        $my_cate_id   =  $request->my_cate_id;
        $my_cate_name = $request->my_cate_name;
        $my_category  = myCategories::find($my_cate_id);
        $my_category->my_cate_name = $my_cate_name;
        $my_category->my_cate_slug = str_slug($my_cate_name);

        if ($request->hasFile('my_cate_avatar')) {

            $file = upload_image('my_cate_avatar');

            if (isset($file['name'])) {
                $my_category->my_cate_avatar = $file['name'];
            }

        }

        $my_category->save();
        return redirect()->back();
    }

    public function delete(Request $request){
        $my_cate_id  = $request->my_cate_id;
        $my_category = myCategories::find($my_cate_id);

        $my_category->delete($my_cate_id);

        return redirect()->route('get.my_lib.index');
    }


    public function addsubcate(Request $request){
        $my_sub_category = new mySubCategories();

        $my_sub_category->my_category_id     = $request->my_cate_id;
        $my_sub_category->my_subcate_name    = $request->my_subcate_name;
        $my_sub_category->my_subcate_slug    = str_slug($request->my_subcate_name);

        if ($request->hasFile('my_subcate_avatar')) {

            $file = upload_image('my_subcate_avatar');

            if (isset($file['name'])) {
                $my_sub_category->my_subcate_avatar = $file['name'];
            }

        }

        $my_sub_category->save();

        return redirect()->back();
    }

    public function savesubcate(Request $request){
        $my_subcate_id   =  $request->my_subcate_id;
        $my_subcate_name = $request->my_subcate_name;
        $my_subcategory  = mySubCategories::find($my_subcate_id);
        $my_subcategory->my_subcate_name = $my_subcate_name;
        $my_subcategory->my_subcate_slug = str_slug($my_subcate_name);
        if ($request->hasFile('my_subcate_avatar')) {

            $file = upload_image('my_subcate_avatar');

            if (isset($file['name'])) {
                $my_subcategory->my_subcate_avatar = $file['name'];
            }

        }
        $my_subcategory->save();
        return redirect()->back();
    }

    public function deletesubcate(Request $request){
        $my_subcate_id  = $request->my_subcate_id;
        $my_subcategory = mySubCategories::find($my_subcate_id);
        $my_subcategory->delete($my_subcate_id);
        return redirect()->back();
    }
}
