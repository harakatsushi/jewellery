<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Material; 
use App\Tag; 
use App\Bookmark;
class MaterialController extends Controller
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
     private $order_sort=[
      0=>["id","desc"],
       1=>["bookmark_cnt","desc"],


   ];

     public function index(Request $request){

        $order = session('order',[]);

        $sort_number=0;
        $sort=["id","desc"];
        if(isset($order['material']) && isset($this->order_sort[$order['material']])){
          $sort=$this->order_sort[$order['material']];
          $sort_number=$order['material'];

        }

         $cond1=[];
         $cond2=[];

        $query = Material::select(['materials.*',]);
        $query->where("status",1);
        if($request->input("tag")){


            $query->whereIn('id', function($query) use($request) {
             $query->select('material_id')
                 ->from('material_tag')
                 ->whereIn('tag_id', $request->input("tag"));
             });

            foreach ($request->input("tag") as $key => $tag) {
                $tmp=Tag::find($tag);

                if($tmp){

                         $cond1[]=$tmp->name;
                   
                }
            }
        }
        if(($request->input("min_price"))){

            $query->where('price','>=',$request->input("min_price"));
            $cond2[]=$request->input("min_price")."円以上";
        }
        if(($request->input("max_price"))){

            $query->where('price','<=',$request->input("max_price"));
            $cond2[]=$request->input("max_price")."円以下";
        }
        $query->orderBy($sort[0],$sort[1]);
        $materials=$query->paginate(18);;
         $bookmarks=[];
        if(Auth::check()){
             $bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','material')->get();
        } 


          return view('material.index',["materials"=>$materials,"cond1"=>$cond1,"cond2"=>$cond2,'sort_number'=>$sort_number,'bookmarks'=>$bookmarks]);
     }


 

}
