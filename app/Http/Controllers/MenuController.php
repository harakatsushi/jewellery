<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Menu; 
use App\Tag; 
use App\Bookmark;
class MenuController extends Controller
{
     private $user = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        //$this->middleware('auth');
        $this->user = Auth::guard('web')->user();
    }
         private $menu_sort=[
      0=>["id","desc"],
      1=>["bookmark_cnt","desc"],


   ];

     public function index(Request $request){

        $order = session('order',[]);

        $sort_number=0;
        $sort=["id","desc"];
        if(isset($order['menu']) && isset($this->menu_sort[$order['menu']])){
          $sort=$this->menu_sort[$order['menu']];
          $sort_number=$order['menu'];

        }

        $query = Menu::where("status",1);


        


 $cond1=[];
 $cond2=[];
  $cond3=[];
   $cond4=[];
        if($request->input("category_id")){  
            $query->where('category_id',$request->input("category_id"));


            $cond1=[Category::find($request->input("category_id"))->name];


        }
  

        if(is_array($request->input("tag"))){

            $query->whereIn('id', function($query) use($request) {
             $query->select('menu_id')
                 ->from('menu_tag')
                 ->whereIn('tag_id', $request->input("tag"));
             });


            $select_genre=$request->input("genre_id");


            foreach ($request->input("tag") as $key => $tag) {
                $tmp=Tag::find($tag);

                if($tmp){
                    if($tag<109){
                         $cond2[]=$tmp->name;
                    }else{
                        $cond3[]=$tmp->name;
                    }
                   
                }
            }

        }
        if(($request->input("min_price"))){

            $query->where('price','>=',$request->input("min_price"));
            $cond4[]=$request->input("min_price")."円以上";
        }
        if(($request->input("max_price"))){

            $query->where('price','<=',$request->input("max_price"));
            $cond4[]=$request->input("max_price")."円以下";
        }
      //  print_r($sort);die();
        $query->orderBy($sort[0],$sort[1]);
        
        $menus=$query->paginate(20);;
        $bookmarks=[];
        if(Auth::check()){
             $bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','menu')->get();
        } 
          return view('menu/index',["menus"=>$menus,"bookmarks"=>$bookmarks,"cond1"=>$cond1,"cond2"=>$cond2,"cond3"=>$cond3,"cond4"=>$cond4,'sort_number'=>$sort_number]);
     }


}
