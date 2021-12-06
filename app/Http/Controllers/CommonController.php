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
class CommonController extends Controller
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
    public function receive(Request $request){
$fp = fopen("/home/raindiamond/ai-jewelly.com/sample.txt", "w");
fwrite($fp, print_r($_REQUEST,true));
fclose($fp);



    }

     public function chgSort(Request $request){
        $order = session('order',[]);
        $tmp=0;
        if(isset($order[$request->input("type")])){
            $tmp=$order[$request->input("type")];
        }
        $tmp=$request->input("val");
        $order[$request->input("type")]=$tmp;
        session(['order' => $order]);
        $previousUrl = app('url')->previous();
        return redirect($previousUrl);
    }
    public function addBookmark(Request $request){
        $type=$request->input("type");
        $val=$request->input("val");

        if($type!="jeweller" && $type!="product" && $type!="menu" && $type!="material"){
            die("不正な値です");
        }
        if(!Auth::check()){
            die('ログインしてください');
        }
        $bookmark=Bookmark::where('item_id',$val)->where('type',$type)->where('user_id',Auth::user()->id)->first();
        if($bookmark){
             $bookmark->delete();
             if(Auth::user()->role==3 ||Auth::user()->role==4){
                $tmp=null;
                if($type==="jeweller"){
                    $tmp=User::find($val);
                    if($tmp && $tmp->bookmark_cnt>0){
                        $tmp->bookmark_cnt=$tmp->bookmark_cnt-1;
                    }
                }else if($type==="product"){
                    $tmp=Product::find($val);
                    if($tmp && $tmp->bookmark_cnt>0){
                        $tmp->bookmark_cnt=$tmp->bookmark_cnt-1;
                    }
                }else if($type==="menu"){
                    $tmp=Menu::find($val);
                    if($tmp && $tmp->bookmark_cnt>0){
                        $tmp->bookmark_cnt=$tmp->bookmark_cnt-1;
                    }
                }else if($type==="material"){
                    $tmp=Material::find($val);
                    if($tmp && $tmp->bookmark_cnt>0){
                        $tmp->bookmark_cnt=$tmp->bookmark_cnt-1;
                    }
                }
                if($tmp){
                    $tmp->save();
                }
             }
            die('ブックマークから削除しました');
        }

        $bookmark= new Bookmark();
        $bookmark->item_id=$val;
        $bookmark->type=$type;
        $bookmark->user_id=Auth::user()->id;;
        $bookmark->save();
        if(Auth::user()->role==3 ||Auth::user()->role==4){
                $tmp=null;
            if($type==="jeweller"){
                $tmp=User::find($val);
                if($tmp){
                    $tmp->bookmark_cnt=$tmp->bookmark_cnt+1;
                }
            }else if($type==="product"){
                $tmp=Product::find($val);
                if($tmp){
                    $tmp->bookmark_cnt=$tmp->bookmark_cnt+1;
                }
            }else if($type==="menu"){
                $tmp=Menu::find($val);
                if($tmp ){
                    $tmp->bookmark_cnt=$tmp->bookmark_cnt+1;
                }
            }else if($type==="material"){
                $tmp=Material::find($val);
                if($tmp){
                    $tmp->bookmark_cnt=$tmp->bookmark_cnt+1;
                }
            }
            if($tmp){
                $tmp->save();
            }
         }
        die('ブックマークに登録しました');
    }
     public function leave_complete(Request $request){
        if(Auth::check()){

            User::where("id",Auth::user()->id)->update(["status"=>9]);
            Menu::where("user_id",Auth::user()->id)->update(["status"=>2]);
            Product::where("user_id",Auth::user()->id)->update(["status"=>2]);
            Material::where("user_id",Auth::user()->id)->update(["status"=>2]);
             Auth::logout();
        }



        return view('leave_complete');
    }
}
