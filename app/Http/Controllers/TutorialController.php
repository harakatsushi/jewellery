<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Mail;
use App\Category;
use App\Tag;

class TutorialController extends Controller
{
     private $user = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      // /  $this->middleware('auth');
        $this->user = Auth::guard('web')->user();
    }
     public function index(Request $request,$type=null){
        $text="";
        $category_name="";
        $tag_name="";
        $text_arr=[
            1=> "自分だけのジュエリーを作りたい。",
            2=> "作りたいけどやりかたがわからない。",
            3=> "なんとなくイメージはあるけど自信がない。",
            4=> "相談しながら作りたい。",
            5=> "作りたいけど素材がない。",
            6=> "作りたいけど予算がない。",
            7=> "世界でひとつのこだわりのものを作りたい。",
            8=> "ュエリーは高いから安ければ・・・",
            9=> "自分好みの素材があったら作りたい。",
            10=>"いらないジュエリーを処分したい。",
            11=>"いらないジュエリーをリフォームしたい。",
            12=>"記念品としてジュエリーを量産したい。",
            13=>"珍しい素材のジュエリーがつくりたい。",
            14=>"自分のジュエリーを修理したい。",
            15=>"会社の社章をまとめて作りたい。",
            16=>"自分のブランドのジュエリーを作りたい。",
            17=>"自分のジュエリーを査定してもらたい。",
            18=>"ジュエリーや宝石の知識をつけたい。",
            19=>"できてるデザインから作りたい。",
            20=>"過去のデザインを作りたい。",

    ];
        $categoy_arr=[
            1=>[1],
            2=>[1],
            3=>[1],
            4=>[1],
            5=>[1],
            6=>[],
            7=>[1],
            8=>[],
            9=>[],
            10=>[9],
            11=>[3],
            12=>[],
            13=>[],
            14=>[7],
            15=>[],
            16=>[],
            17=>[],
            18=>[11],
            19=>[2],
            20=>[2],

    ];
        $tag_arr=[1=>[109],
            2=>[124],
            3=>[],
            4=>[],
            5=>[111],
            6=>[110],
            7=>[109],
            8=>[110],
            9=>[111],
            10=>[112],
            11=>[113],
            12=>[114],
            13=>[115],
            14=>[116],
            15=>[117],
            16=>[118],
            17=>[119],
            18=>[120],
            19=>[121],
            20=>[122],

    ];
        if($type){
            $tmp=[];
            if(isset($categoy_arr[$type]) && $categoy_arr[$type]){
                $tmp["category_id"]=$categoy_arr[$type][0];   
                $category_name=Category::find($categoy_arr[$type][0])->name;
            }
            if(isset($tag_arr[$type]) && $tag_arr[$type]){
                $tmp["tag"]=$tag_arr[$type]; 
                $tag_name=Tag::find($tag_arr[$type][0])->name;  
            }
             $request->session()->flash('_old_input', $tmp);
             if(isset($text_arr[$type]) && $text_arr[$type]){
                $text=$text_arr[$type];   
            }
        }
       


          return view('tutorial.index',compact('text','category_name','tag_name'));
     }

    
}
