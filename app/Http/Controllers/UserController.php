<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Qa;;
use App\Infomation;;
use App\Campaign;
use App\User;
use App\Genre;
use App\Product;
use App\Menu;
use App\Material;
use App\Bookmark;

use App\Evaluation;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\MaterialRequest;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
     

     public function detail(Request $request,$id)
    {


        $user = User::find($id);
        if(!$user ||  $user->status!=1){
            return abort(404);
        }
         $bookmarks=[];
        if(Auth::check()){
             $bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','user')->get();
        } 

        $products= Product::where("status",1)->where("user_id",$id)->limit(6)->get();
        $menus= Menu::where("status",1)->where("user_id",$id)->limit(6)->get();
        $materials= Material::where("status",1)->where("user_id",$id)->limit(6)->get();
        $evaluations= Evaluation::where("target_user_id",$id)->orderBy("id","desc")->limit(10)->get();
        $product_bookmarks=[];
        $menu_bookmarks=[];
        $material_bookmarks=[];
        if(Auth::check()){
             $product_bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','product')->get();
             $menu_bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','menu')->get();
             $material_bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','material')->get();
        } 
        return view('user.detail',["user"=>$user,'bookmarks'=>$bookmarks,'products'=>$products,'menus'=>$menus,'materials'=>$materials,'product_bookmarks'=>$product_bookmarks,'menu_bookmarks'=>$menu_bookmarks,'material_bookmarks'=>$material_bookmarks,'evaluations'=>$evaluations]);
    }
    

}
