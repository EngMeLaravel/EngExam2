<?php

namespace App\Http\Controllers;

use App\myCategories;
use App\mySubCategories;
use App\MyVocabularies;
use App\Vocabularies;
use App\VocaType;
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

    public function addBookmark(Request $request)
    {
        $voca_id       = $request->id;
        $vocabulary    = Vocabularies::where('id',$voca_id)->first();
        $voca_name     = $vocabulary->voca_name;
        $mycategory    = myCategories::all();
        $mysubcategory = mySubCategories::all();

        return view('my_library.addBookmark',compact('voca_id','voca_name' ,'mysubcategory','mycategory'));
    }

    public function saveBookmark(Request $request){
        $this->validate($request,
            [
                'voca_id' => 'unique:my_vocabularies,voca_id'
            ],
            [
                'voca_id.unique' => 'Bạn đã thêm từ này vào thư viện cá nhân!'
            ]
        );
        $myvocabulary                = new MyVocabularies();

        $myvocabulary->voca_id       = $request->voca_id;

        if ($request->mycate_id){
            $myvocabulary->my_cate_id    = $request->mycate_id;
        }
        if ($request->mysubcate_id){
            $myvocabulary->my_subcate_id = $request->mysubcate_id;
        }

        $myvocabulary->save();

        return redirect()->back()->with('success_flash','Thêm từ vựng thành công!');
    }

    public function getVocabularies($mycate_id, $mysubcate_id)
    {
        $myvocabularies_details = array();
        $my_category                  = myCategories::where('user_id',get_data_user('web'))->get();
        $myvocabularies               = MyVocabularies::where([['my_cate_id', $mycate_id], ['my_subcate_id', $mysubcate_id]])->get();
        foreach ($myvocabularies as $item){
            $myvocabularies_detail    = Vocabularies::where('id',$item->voca_id)->first();
            $myvocabularies_details[]   = $myvocabularies_detail;
        }

        $viewData = [
            'my_category'            => $my_category,
            'myvocabularies'         => $myvocabularies,
            'myvocabularies_details' => $myvocabularies_details
        ];
        //dd($myvocabularies_details);
        return view('my_library.index', $viewData);
    }

    public function getVocaDetail($mycate_id, $mysubcate_id, $id)
    {
        $myvocabularies_detailss = array();
        $my_category = myCategories::where('user_id',get_data_user('web'))->get();
        $myvocabularies_details      = MyVocabularies::where([['my_cate_id', $mycate_id], ['my_subcate_id', $mysubcate_id],['voca_id',$id]])->first();

        $myvocabularies_detailss     = Vocabularies::where('id',$myvocabularies_details->voca_id)->first();

        $myvocabularies_details_edit = MyVocabularies::where('voca_id',$id)->first();

        $viewData = [
            'my_category'                 => $my_category,
            'myvocabularies_detailss'     => $myvocabularies_detailss,
            'myvocabularies_details_edit' => $myvocabularies_details_edit
        ];
        //dd($myvocabularies_detailss);
        return view('my_library.index',$viewData);
    }

    public function deleteVoca(Request $request){
        $delete_voca = MyVocabularies::where('voca_id',$request->voca_id);
        $delete_voca->delete();
        return redirect()->back();
    }

    public function editVoca($id)
    {
        $my_voca_type = VocaType::all();
        $mycate = MyVocabularies::where('voca_id',$id)->first();
        $mycategories    = myCategories::all();
        $mysubcategories = mySubCategories::all();
        return view('my_library.editmyvoca',compact('mycate','my_voca_type','mycategories','mysubcategories'));
    }

    public function updateVoca(Request $request, $id)
    {
        if ($id) {
            $my_vocabulary = MyVocabularies::where('voca_id',$id)->first();
        }

        $my_vocabulary->my_voca_name         = $request->my_voca_name;
        $my_vocabulary->my_voca_slug         = str_slug($request->my_voca_name);
        $my_vocabulary->my_voca_mean         = $request->my_voca_mean;
        $my_vocabulary->my_voca_spell        = $request->my_voca_spell;
        $my_vocabulary->my_voca_type         = $request->my_voca_type;
        $my_vocabulary->my_voca_example_en   = $request->my_voca_example_en;
        $my_vocabulary->my_voca_example_vi   = $request->my_voca_example_vi;
        $my_vocabulary->my_cate_id           = $request->my_cate_id;
        if($request->my_subcate_id){
            $my_vocabulary->my_subcate_id    = $request->my_subcate_id;
        }

        if ($request->hasFile('my_voca_image')) {

            $file = upload_image('my_voca_image');

            if (isset($file['name'])) {
                $my_vocabulary->my_voca_image = $file['name'];
            }

        }

        $my_vocabulary->save();
        return redirect()->back();
    }
}
