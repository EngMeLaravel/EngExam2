<?php

namespace Modules\Admin\Http\Controllers;

use App\Categories;
use App\Http\Requests\RequestCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories      =  Categories::select('id', 'cate_name', 'cate_active', 'cate_avatar')->paginate(10);
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
        $category = Categories::find($id);
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
            $category = new Categories();

            if ($id) {
                $category = Categories::find($id);
            }

            $category->cate_name         = $requestCategory->cate_name;
            $category->cate_slug         = str_slug($requestCategory->cate_name);

            if ($requestCategory->hasFile('cate_avatar')) {

                $file = upload_image('cate_avatar');

                if (isset($file['name'])) {
                    $category->cate_avatar = $file['name'];
                }

            }

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
            $category = Categories::find($id);
            switch ($action) {
                case 'delete':
                    $category->delete();
                    break;
                case 'active':
                    $category->cate_active = $category->cate_active ? 0 : 1;
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
