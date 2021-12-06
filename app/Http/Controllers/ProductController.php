<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Product; 
use App\Tag; 
use App\Bookmark;
class ProductController extends Controller
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
         private $product_sort=[
      0=>["id","desc"],
      1=>["bookmark_cnt","desc"],


   ];

     public function index(Request $request){

        $order = session('order',[]);

        $sort_number=0;
        $sort=["id","desc"];
        if(isset($order['product']) && isset($this->product_sort[$order['product']])){
          $sort=$this->product_sort[$order['product']];
          $sort_number=$order['product'];

        }

        $query = Product::where("status",1);


        


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
             $query->select('product_id')
                 ->from('product_tag')
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
        
        $products=$query->paginate(20);;
        $bookmarks=[];
        if(Auth::check()){
             $bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','product')->get();
        } 
          return view('product/index',["products"=>$products,"bookmarks"=>$bookmarks,"cond1"=>$cond1,"cond2"=>$cond2,"cond3"=>$cond3,"cond4"=>$cond4,'sort_number'=>$sort_number]);
     }


}
