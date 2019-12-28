<?php

namespace Modules\Admin\Http\Controllers;

use App\Categories;
use App\Http\Requests\RequestSubCategory;
use App\SubCategories;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $sub_categories = SubCategories::with('categories:id,cate_name');

        if ($request->name) {
            $sub_categories->where('cate_name', 'like', '%'.$request->name.'%');
        }

        if ($request->cate) {
            $sub_categories->where('cate_id', $request->cate);
        }

        $sub_categories = $sub_categories->orderByDesc('id')->get();

        $categories = $this->getCategories();

        $viewData = [
            'sub_categories'   => $sub_categories,
            'categories' => $categories,
        ];
        return view('admin::sub_category.index', $viewData);
    }

    public function getCategories()
    {
        return Categories::all();
    }

    public function create()
    {
        $categories = $this->getCategories();
        return view('admin::sub_category.create', compact('categories'));
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
        return view('admin::sub_category.update', compact('sub_category', 'categories'));
    }

    public function update(RequestSubCategory $requestSubCategory, $id)
    {
        $this->insertOrUpdate($requestSubCategory, $id);
        return redirect()->back();
    }

    public function insertOrUpdate($requestSubCategory, $id = '')
    {
        // $code = 1;
        // try {
        $sub_category = new SubCategories();

        if ($id) {
            $sub_category = SubCategories::find($id);
        }

        $sub_category->subcate_name         = $requestSubCategory->subcate_name;
        $sub_category->subcate_slug         = str_slug($requestSubCategory->subcate_name);
        $sub_category->cate_id              = $requestSubCategory->cate_id;

        if ($requestSubCategory->hasFile('subcate_avatar')) {

            $file = upload_image('subcate_avatar');

            if (isset($file['name'])) {
                $sub_category->subcate_avatar = $file['name'];
            }

        }

        $sub_category->save();
        // } catch (\Throwable $th) {
        //     $code = 0;
        //     Log::error(' [Error insertOrUpdate Category] ' . $th->getMessage());
        // }
        // return $code;
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
}
