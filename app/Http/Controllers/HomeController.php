<?php

namespace App\Http\Controllers;

use App\Vocabularies;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function ajax_translate(Request $request){
        if ($request->ajax()){
            $tr = new GoogleTranslate(); // Auto-detected language by default
            $tr->setSource(); // Detect language automatically
            $tr->setTarget('vi');
            if ($request->keyword != ""){
                $text = $tr->translate($request->keyword);
                $voca_array = $request->keyword;
            }else{
                $text = "";
                $voca_array = "";
            }
            $data = array('text' => $text, 'voca_array' => $voca_array);
            echo json_encode($data);
        }
    }

    public function ajax_search(Request $request){
        if ($request->ajax()){
            $output = '';
            if($request->keyword == ""){
//                $output = "<li>Không có kết quả</li>";
            }else{
                $vocabulary = Vocabularies::where('voca_name', 'like','%'.$request->keyword.'%')->get();
                $total_row  = $vocabulary->count($vocabulary);
                if($total_row > 0){
                    foreach ($vocabulary as $item){
                        echo "<script>
                           function func(){
                                var cate_id     =$item->cate_id;
                                var subcate_id  =$item->subcate_id;
                                var voca_id      =$item->id;
                                window.location.href ='http://engme.me/public-library/'+cate_id+'-'+subcate_id+'-'+voca_id;
                            }
                        </script>";
                        $output .= "<li><a onclick='func();'>$item->voca_name</a></li>";
                    }
                }else{
                    $output = "<li>Không có kết quả</li>";
                }
            }
            echo $output;
        }
    }
}
