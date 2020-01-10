<?php

namespace Modules\Admin\Http\Controllers;

use App\Categories;
use App\Http\Requests\RequestVocabulary;
use App\SubCategories;
use App\Vocabularies;
use App\VocaType;
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
        $vocabularies = Vocabularies::with('categories:id,cate_name')->with('subcategories:id,subcate_name,cate_id')->with('vocatype:id,type_name,type_vi');

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

        $voca_type =  VocaType::all();

        $viewData  = [
            'vocabularies' => $vocabularies,
            'categories' => $categories,
            'voca_type' => $voca_type,
            'sub_categories' => $sub_categories
        ];

        return view('admin::vocabulary.index', $viewData);
    }

    public function create()
    {
        $voca_type =  VocaType::all();
        $categories = $this->getCategories();
        $sub_categories = SubCategories::all();

        $viewData = [
            'categories' => $categories,
            'sub_categories' => $sub_categories,
            'voca_type' => $voca_type
        ];
        return view('admin::vocabulary.create', $viewData);
    }

    public function store(RequestVocabulary $requestVocabulary)
    {
        $this->insertOrUpdate($requestVocabulary);
        return redirect()->back();
    }

    public function edit($id)
    {
        $voca_type =  VocaType::all();
        $vocabulary = Vocabularies::find($id);
        $sub_category = SubCategories::all();
        $categories = $this->getCategories();

        $view = [
            'voca_type' => $voca_type,
            'sub_category' => $sub_category,
            'categories' => $categories,
            'vocabulary' => $vocabulary,
        ];

        return view('admin::vocabulary.update', $view);
    }

    public function update(RequestVocabulary $requestVocabulary, $id)
    {
        $this->insertOrUpdate($requestVocabulary, $id);
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

    public function insertOrUpdate($requestVocabulary, $id = '')
    {
        $vocabulary = new Vocabularies();

        if ($id) {
            $vocabulary = Vocabularies::find($id);
        }

        $vocabulary->voca_name         = $requestVocabulary->voca_name;
        $vocabulary->voca_slug         = str_slug($requestVocabulary->voca_name);
        $vocabulary->voca_author       = "admin";
        $vocabulary->voca_mean         = $requestVocabulary->voca_mean;
        $vocabulary->voca_spell        = $requestVocabulary->voca_spell;
        $vocabulary->voca_type         = $requestVocabulary->voca_type;
        $vocabulary->voca_example_en   = $requestVocabulary->voca_example_en;
        $vocabulary->voca_example_vi   = $requestVocabulary->voca_example_vi;
        $vocabulary->cate_id           = $requestVocabulary->cate_id;
        if($requestVocabulary->subcate_id){
            $vocabulary->subcate_id    = $requestVocabulary->subcate_id;
        }

        if ($requestVocabulary->hasFile('voca_image')) {

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
                $data .= "<option value=$value->id>$value->subcate_name</option>";
            }
            $datas = "<option value=\"\">--Ngành con--</option>".$data;
            echo $datas;
        }
    }



}
