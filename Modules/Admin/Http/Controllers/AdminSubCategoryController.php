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
        }

