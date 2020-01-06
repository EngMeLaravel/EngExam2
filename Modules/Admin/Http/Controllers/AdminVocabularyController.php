<?php

namespace Modules\Admin\Http\Controllers;

use App\Categories;
use App\SubCategories;
use App\Vocabularies;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminVocabularyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $vocabularies = Vocabularies::with('categories:id,cate_name')->with('subCategories:id,subcate_name,cate_id');

        if ($request->name) {
            $vocabularies->where('voca_name', 'like', '%'.$request->name.'%');
        }

        if ($request->cate) {
            $vocabularies->where('cate_id', $request->cate);
        }

        if ($request->subcate) {
            $vocabularies->where('subcate_id', $request->subcate);
        }

        $vocabularies = $vocabularies->orderByDesc('id')->paginate(10);

        $categories = $this->getCategories();

        $sub_categories = $this->getSubCategories($request->input('cate'));

        $viewData  = [
            'vocabularies' => $vocabularies,
            'categories' => $categories,
            'sub_categories' => $sub_categories
        ];

        return view('admin::vocabulary.index', $viewData);
    }

    public function create()
    {
        $categories = $this->getCategories();
        $sub_categories = SubCategories::all();
        return view('admin::vocabulary.create', compact('categories', 'sub_categories'));
    }

    public function store(RequestSubCategory $requestSubCategory)
    {
        $this->insertOrUpdate($requestSubCategory);
        return redirect()->back();
    }

    public function edit($id)
    {
        $sub_category = SubCategories::find($id);
        $categories = $this->getCategories();

        $view = [
            'sub_category' => $sub_category,
            'categories' => $categories
        ];

        return view('admin::sub_category.update', $view);
    }

    public function update(RequestSubCategory $requestSubCategory, $id)
    {
        $this->insertOrUpdate($requestSubCategory, $id);
        return redirect()->back();
    }

    public function getCategories()
    {
        return Categories::all();
    }

    public function getSubCategories($cate_id)
    {
        return SubCategories::where('cate_id', $cate_id)->get();
    }

    public function insertOrUpdate($requestSubCategory, $id = '')
    {
        $vocabulary = new Vocabularies();

        if ($id) {
            $vocabulary = Vocabularies::find($id);
        }

        $vocabulary->voca_name         = $requestSubCategory->voca_name;
        $vocabulary->voca_slug         = str_slug($requestSubCategory->subcate_name);
        $vocabulary->voca_author       = "admin";
        $vocabulary->voca_mean         = $requestSubCategory->voca_mean;
        $vocabulary->voca_spell        = $requestSubCategory->voca_spell;
        $vocabulary->voca_type         = $requestSubCategory->voca_type;
        $vocabulary->voca_example_en   = $requestSubCategory->voca_example_en;
        $vocabulary->voca_example_vi   = $requestSubCategory->voca_example_vi;
        $vocabulary->cate_id           = $requestSubCategory->cate_id;
        $vocabulary->subcate_id        = $requestSubCategory->subcate_id;

        if ($requestSubCategory->hasFile('voca_image')) {

            $file = upload_image('voca_image');

            if (isset($file['name'])) {
                $vocabulary->voca_image = $file['name'];
            }

        }

        $vocabulary->save();
    }

    public function action(Request $request, $action, $id)
    {
        if ($action) {
            $sub_category = SubCategories::find($id);
            switch ($action) {
                case 'delete':
                    $sub_category->delete();
                    break;
                case 'active':
                    $sub_category->subcate_active = $sub_category->subcate_active ? 0 : 1;
                    $sub_category->save();
                    break;
                default:
                    # code...
                    break;
            }
        }

        return redirect()->back();
    }

    public function ajaxSubCate(Request $request){
        if($request->ajax()){
            $data = '';
            $datas = '';
            $cate_id = $request->cate_id;
            $subcategory = SubCategories::all()->where('cate_id',$cate_id);

            foreach ($subcategory as $value){
                $data .= "<option value=$cate_id>$value->subcate_name</option>";
            }
            $datas = "<option value=\"\">--Ngành con--</option>".$data;
            echo $datas;
        }
    }



}
