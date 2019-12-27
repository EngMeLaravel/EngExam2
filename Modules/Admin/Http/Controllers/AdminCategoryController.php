<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories      =  Category::select('id', 'c_name', 'c_title_seo', 'c_active', 'c_home')->paginate(10);
        $viewData        =  [
            'categories' => $categories,
        ];
        return view('admin::category.index', $viewData);
    }

    public function create()
    {
        return view('admin::category.create');
    }

    public function store(RequestCategory $requestCategory)
    {
        $this->insertOrUpdate($requestCategory);
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin::category.update', compact('category'));
    }

    public function update(RequestCategory $requestCategory, $id)
    {
        $this->insertOrUpdate($requestCategory, $id);
        return redirect()->back();
    }

    public function insertOrUpdate($requestCategory, $id = '')
    {
        // $code = 1;
        // try {
            $category = new Category();

            if ($id) {
                $category = Category::find($id);
            }

            $category->c_name            = $requestCategory->c_name;
            $category->c_slug            = str_slug($requestCategory->c_name);
            $category->c_icon            = str_slug($requestCategory->c_icon);
            $category->c_title_seo       = $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->c_name;
            $category->c_description_seo = $requestCategory->c_description_seo;

            $category->save();
        // } catch (\Throwable $th) {
        //     $code = 0;
        //     Log::error(' [Error insertOrUpdate Category] ' . $th->getMessage());
        // }
        // return $code;
    }

    public function action(Request $request, $action, $id)
    {
        if ($action) {
            $category = Category::find($id);
            switch ($action) {
                case 'delete':
                    $category->delete();
                    break;
                case 'active':
                    $category->c_active = $category->c_active ? 0 : 1;
                    $category->save();
                    break;
                case 'home':
                    $category->c_home = $category->c_home ? 0 : 1;
                    $category->save();
                    break;
                default:
                    # code...
                    break;
            }
        }

        return redirect()->back();
    }
}
