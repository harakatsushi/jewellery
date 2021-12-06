<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Bookmark;
use App\User;
use App\Product;
use App\Menu;
use App\Material;
class TopController extends Controller
{
     private $user = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
      // $this->middleware('auth');
        $this->user = Auth::guard('web')->user();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products=Product::where("status",1)->where("via",1)->orderBy('bookmark_cnt','desc')->limit(12)->get();
        $materials=Material::where("status",1)->orderBy('bookmark_cnt','desc')->limit(8)->get();
        $menus=Menu::where("status",1)->orderBy('bookmark_cnt','desc')->limit(8)->get();
        $jewellers=User::where("status",1)->where("role",2)->orderBy('bookmark_cnt','desc')->limit(8)->get();

        $jeweller_bookmarks=[];
        $product_bookmarks=[];
        $menu_bookmarks=[];
        $material_bookmarks=[];
        if(Auth::check()){
             $jeweller_bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','jeweller')->get();
             $product_bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','product')->get();
             $menu_bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','menu')->get();
             $material_bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','material')->get();
        } 
        return view('index',compact('products','materials','jeweller_bookmarks','product_bookmarks','menu_bookmarks','material_bookmarks','menus','jewellers'));
    }


}
