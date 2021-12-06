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
use App\Message;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\MaterialRequest;
class JewellerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
         private $jeweller_sort=[
      0=>["id","desc"],
      1=>["ave_evaluation","desc"],
       2=>["id","desc"],

   ];
    public function list(Request $request)
    {

        $order = session('order',[]);

        $sort_number=0;
        $sort=["id","desc"];
        if(isset($order['jeweller']) && isset($this->jeweller_sort[$order['jeweller']])){
          $sort=$this->jeweller_sort[$order['jeweller']];
          $sort_number=$order['jeweller'];

        }
        $cond=[];
        if(is_array($request->input("genre"))){
            $jewellers=User::where("status",1)->where("role",2)->whereIn("genre_id",$request->input("genre"))->orderBy($sort[0],$sort[1])->paginate(18);
            foreach ($request->input("genre") as $key => $genre_id) {
                $cond[]=Genre::find($genre_id)->name;
            }
        }else{
            $jewellers=User::where("status",1)->where("role",2)->orderBy($sort[0],$sort[1])->paginate(18);
        }
        
        $genres=Genre::get();
        $bookmarks=[];
        if(Auth::check()){
             $bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','jeweller')->get();
        } 
        return view('jeweller.index',compact('jewellers','genres','cond','bookmarks','sort_number'));
    }

     public function detail(Request $request,$id)
    {


        $jeweller = User::find($id);
        if(!$jeweller ||  $jeweller->status!=1 || $jeweller->role!=2){
            return abort(404);
        }
         $bookmarks=[];
        if(Auth::check()){
             $bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','jeweller')->get();
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
        return view('jeweller.detail',["jeweller"=>$jeweller,'bookmarks'=>$bookmarks,'products'=>$products,'menus'=>$menus,'materials'=>$materials,'product_bookmarks'=>$product_bookmarks,'menu_bookmarks'=>$menu_bookmarks,'material_bookmarks'=>$material_bookmarks
      ,'evaluations'=>$evaluations]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $infomations = Infomation::where("status",1)->whereIn('type',[1,3])->get();
        return view('jewellermenu.index',compact('infomations'));
    }




            public function product_detail(Request $request,$id)
    {


        $product = Product::find($id);
        if(!$product || $product->status!=1){
            abort(403);
        }

        $jeweller=  User::find($product->user_id);
        if(!$jeweller || $jeweller->status!=1){
            abort(403);
        }
        return view('jeweller.product.detail',["product"=>$product,"jeweller"=>$jeweller]);
    }

 public function menu_detail(Request $request,$id)
    {


        $menu = Menu::find($id);
        if(!$menu || $menu->status!=1){
            abort(403);
        }

        $jeweller=  User::find($menu->user_id);
        if(!$jeweller || $jeweller->status!=1){
            abort(403);
        }

        $messages=Message::where("menu_id",$id)->get();
        $message_ids=[];
        foreach ($messages as $key => $value) {
          $message_ids[]=$value->id;
        }
         $evaluations=[];
        if($message_ids){
          $evaluations=Evaluation::whereIn("message_id",$message_ids)->where("target_user_id",$jeweller->id)->orderBy("id","desc")->limit(5)->get();;

        }
        return view('jeweller.menu.detail',["menu"=>$menu,"jeweller"=>$jeweller,"evaluations"=>$evaluations]);
    }

     public function material_detail(Request $request,$id)
    {


        $material = Material::find($id);
        if(!$material || $material->status!=1){
            abort(403);
        }

        $jeweller=  User::find($material->user_id);
        if(!$jeweller || $jeweller->status!=1){
            abort(403);
        }
        $messages=Message::where("material_id",$id)->get();
        $message_ids=[];
        foreach ($messages as $key => $value) {
          $message_ids[]=$value->id;
        }
         $evaluations=[];
        if($message_ids){
          $evaluations=Evaluation::whereIn("message_id",$message_ids)->where("target_user_id",$jeweller->id)->orderBy("id","desc")->limit(5)->get();;

        }
        return view('jeweller.material.detail',["material"=>$material,"jeweller"=>$jeweller,"evaluations"=>$evaluations]);
    }
      public function profile(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
    
        return view('jewellermenu.profile.index',["user"=>Auth::user()]);
    }


    public function profile_edit (Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $genres=Genre::get();
        $tmp_genres=Auth::user()->genres()->get();
        $select_genres=[];
 
        foreach ($tmp_genres as $key => $genre) {

            $select_genres[]=$genre->id;
        }
        return view('jewellermenu.profile.edit',["user"=>Auth::user(),'genres'=>$genres,'select_genres'=>$select_genres]);
    }



    public function profile_edit_end(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $user =Auth::user();
        $user->name=$request->input("name");
        $user->email=$request->input("email");
        $user->year=$request->input("year");
        $user->genre_id=$request->input("genre_id");
        $user->comment=$request->input("comment");
        $user->bank_name=$request->input("bank_name");
         $user->bank_type=$request->input("bank_type");
        $user->bank_branch_name=$request->input("bank_branch_name");
        $user->bank_number=$request->input("bank_number");
        $user->bank_receiver=$request->input("bank_receiver");
        if($request->input("password")){
          $user->password=bcrypt($request->input("password"));; 
        }

        if($request->file('image')){
              $path = $request->file('image')->store('upload/profile');
            $user->image = basename($path);  
            copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$user->image,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$user->image);    
        }



        $user->save();
           $user->genres()->detach(); //ユーザの登録済みのスキルを全て削除
        $user->genres()->attach($request->input("sub_genre_id")); //改めて登録    
       return view('jewellermenu.profile.complete');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product(Request $request,$id)
    {

        $jeweller = User::find($id);
        if(!$jeweller ||  $jeweller->status!=1 || $jeweller->role!=2){
            return abort(404);
        }
        $query = product::select(['products.*',]);
        $query->where("user_id",$id)->where("status",1);
  


        $products=$query->orderBy("id","desc")->paginate(18);;
                $product_bookmarks=[];
        if(Auth::check()){
             $product_bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','product')->get();
        } 
        return view('jeweller.product.index',['jeweller'=>$jeweller,'products'=>$products,'product_bookmarks'=>$product_bookmarks]);

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function menu(Request $request,$id)
    {


        $jeweller = User::find($id);
        if(!$jeweller ||  $jeweller->role!=2){
            return abort(404);
        }
        $query = Menu::select(['menus.*',]);
        $query->where("user_id",$id)->where("status",1);
  


        $menus=$query->orderBy("id","desc")->paginate(18);;
        $menu_bookmarks=[];
        if(Auth::check()){
             $menu_bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','menu')->get();
        } 
        return view('jeweller.menu.index',['jeweller'=>$jeweller,'menus'=>$menus,'menu_bookmarks'=>$menu_bookmarks]);

    }


   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function material(Request $request,$id)
    {

        $jeweller = User::find($id);
        if(!$jeweller ||  $jeweller->status!=1 || $jeweller->role!=2){
            return abort(404);
        }
        $query = Material::select(['materials.*',]);
        $query->where("user_id",$id)->where("status",1);
  


        $materials=$query->orderBy("id","desc")->paginate(18);;
         $material_bookmarks=[];
        if(Auth::check()){
             $material_bookmarks=Bookmark::where("user_id",Auth::user()->id)->where('type','material')->get();
        } 
        return view('jeweller.material.index',['jeweller'=>$jeweller,'materials'=>$materials,'material_bookmarks'=>$material_bookmarks]);

    }
     

}
