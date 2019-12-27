<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::whereRaw(1);

        if ($request->name) $articles->where('a_name', 'like', '%' . $request->name . '%');

        $articles = $articles->paginate(10);

        $viewData = [
            'articles' => $articles,
        ];
        return view('admin::article.index', $viewData);
    }

    public function create()
    {
        return view('admin::article.create');
    }

    public function store(RequestArticle $requestArticle)
    {
        $this->insertOrUpdate($requestArticle);
        return redirect()->back();
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin::article.create', compact('article'));
    }

    public function update(RequestArticle $requestArticle, $id)
    {
        $this->insertOrUpdate($requestArticle, $id);
        return redirect()->back();
    }

    public function insertOrUpdate($requestArticle, $id='')
    {
        $article = new Article();

        if ($id) $article = Article::find($id);

        $article->a_name            = $requestArticle->a_name;
        $article->a_slug            = str_slug($requestArticle->a_name);
        $article->a_description     = $requestArticle->a_description;
        $article->a_content         = $requestArticle->a_content;
        $article->a_title_seo       = $requestArticle->a_title_seo ? $requestArticle->a_title_seo            : $requestArticle->a_name;
        $article->a_description_seo = $requestArticle->a_description_seo ? $requestArticle->a_description_seo: $requestArticle->a_name;

        if ($requestArticle->hasFile('avatar')) {

            $file = upload_image('avatar');

            if (isset($file['name'])) {
                $article->a_avatar = $file['name'];
            }

        }

        $article->save();
    }

    public function action(Request $request, $action, $id)
    {
        if ($action) {
            $article = Article::find($id);
            switch ($action) {
            case 'delete':
                $article->delete();
                break;
            case 'active':
                $article->a_active = $article->a_active ? 0 : 1;
                $article->save();
                break;
             case 'hot':
                 $article->a_hot = $article->a_hot ? 0 : 1;
                 $article->save();
                 break;
            default:
                // code...
                break;
            }
        }

        return redirect()->back();
    }
}
