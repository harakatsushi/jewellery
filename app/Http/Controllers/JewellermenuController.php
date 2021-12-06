<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Qa;;
use App\Infomation;;
use App\Campaign;
use App\User;
use App\Genre;
use App\Product;
use App\Menu;
use App\Material;
use App\Order;
use App\Message;
use App\MessageList;
use App\Bookmark;
use App\Evaluation;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\MaterialRequest;
use App\Http\Requests\JproposalRequest ;
use Illuminate\Support\Facades\Storage;

use App\Mail\MessageMail;
use App\Mail\AceptMail;
use App\Mail\ProposalMail;
use App\Mail\SendMail;
class JewellermenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['list', 'detail']);;
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
         $messages=Message::where("jeweller_id",Auth::user()->id)->orderBy("last_send_at","desc")->limit(5)->get();
         $bookmarks = Bookmark::where("user_id", Auth::user()->id)->limit(5)->get();
        return view('jewellermenu.index',compact('infomations','messages','bookmarks'));
    }



        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function user(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $query = User::where("role",'<>',3)->where("role",'<>',4);


        


 $cond=[];

        $select_role=[];
        if(is_array($request->input("role"))){
            
            $query->whereIn('role',$request->input("role"));
            $select_role=$request->input("role");

            $cond=[];
            foreach ($request->input("role") as $key => $value) {
                if($value==1){
                    $cond[]="ユーザー";
                }else if($value==2){
                      $cond[]="ジュエラー";
                }
            }

        }
  
        $select_genre=[];
        if(is_array($request->input("genre_id"))){
            $query->where('role',2);
            $query->whereIn('genre_id',$request->input("genre_id"));
            $select_genre=$request->input("genre_id");

            $cond=[];
            foreach ($request->input("genre_id") as $key => $value) {
                $tmp=Genre::find($value);
                if($tmp){
                    $cond[]=$tmp->name;
                }
            }

        }
        $select_status=[];
        if(is_array($request->input("status"))){
            
            $query->whereIn('status',$request->input("status"));
            $select_status=$request->input("status");

            $cond=[];
            foreach ($request->input("status") as $key => $value) {
                 if($value==1){
                    $cond[]="承認";
                }else if($value==2){
                      $cond[]="非承認";
                }else if($value==3){
                      $cond[]="退会済";
                }
            }

        }
        if($request->input("is_pay_wait")){
              $query->where('is_pay_wait',1);
               $cond[]="報酬支払待ち";

        }


        if(is_array($request->input("evaluation"))){
            
            $query->whereNotNull('ave_evaluation');
            $query->where(function($query) use($request){

                        foreach ($request->input("evaluation") as $key => $value) {
                            if($value==5){
                                $query->whereBetween("ave_evaluation", [4, 5]);
                            }else if($value==4){
                                $query->whereBetween("ave_evaluation", [3, 4]);
                            }else if($value==3){
                                $query->whereBetween("ave_evaluation", [2, 3]);
                            }else if($value==2){
                                $query->whereBetween("ave_evaluation", [1, 2]);
                            }else if($value==1){
                                $query->whereBetween("ave_evaluation", [0, 1]);
                            }


                        }
                        

                    });

            foreach ($request->input("evaluation") as $key => $value) {
                 if($value==1){
                    $cond[]="★0-1未満";
                }else if($value==2){
                      $cond[]="★1-2未満";
                }else if($value==3){
                      $cond[]="★2-3未満";
                }else if($value==4){
                      $cond[]="★3-4未満";
                }else if($value==5){
                      $cond[]="★4-5";
                }
            }

        }
        $users=$query->paginate(10);;
        $genres=Genre::orderBy("id","asc")->get();
        return view('jewellermenu.user.index',['users'=>$users,'genres'=>$genres,'select_role'=>$select_role,'select_genre'=>$select_genre,'select_status'=>$select_status,'cond'=>$cond]);
    }


            public function user_detail(Request $request,$id)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $user = User::find($id);
        return view('jewellermenu.user.detail',["user"=>$user]);
    }


            public function user_status(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $user = User::find($request->input("id"));



        $user->status=$request->input("st");
        $user->save();
die();

    
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
    public function product(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $query = product::select(['products.*',]);
        $query->where("user_id",Auth::user()->id);
  


        $products=$query->paginate(10);;
        return view('jewellermenu.product.index',['products'=>$products]);

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product_new()
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        return view('jewellermenu.product.new_post');
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product_new_end(ProductRequest $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $product = new Product();
        $product->user_id=Auth::user()->id;
        $product->name=$request->input("name");
        $product->detail=$request->input("detail");
        $product->annotation01=$request->input("annotation01");
        $product->annotation02=$request->input("annotation02");
        $product->annotation03=$request->input("annotation03");
        $product->price=$request->input("price");
        $product->via=$request->input("via");
        $product->status=$request->input("status");

        if($request->file('image')){
              $path = $request->file('image')->store('upload/profile');
            $product->image = basename($path);  
            copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$product->image,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$product->image);    
        }

        for($i=1;$i<4;$i++){
            if($request->file('sub_img'.$i)){
              $path = $request->file('sub_img'.$i)->store('upload/profile');
              $sub_img=basename($path);  
              //  $product->sub_img{$i} = basename($path);  
                copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$sub_img,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$sub_img);   
                if($i==1){
                    $product->sub_img1= $sub_img;
                } else  if($i==2){
                    $product->sub_img2= $sub_img;
                } else  if($i==3){
                    $product->sub_img3= $sub_img;
                }

            }
        }

        $product->save();
         $product->tags()->detach(); //ユーザの登録済みのスキルを全て削除
        $product->tags()->attach($request->input("tag")); //改めて登録  
        return view('jewellermenu.product.post_complete');
    }


    public function product_edit(Request $request,$id)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $product = Product::find($id);
        if(Auth::user()->id!=$product->user_id){
            return redirect("home");
        }
        $tmp=[];
        foreach ($product->tags as $key => $tag) {
            $tmp[]=$tag->id;
        }

        $product['tag']=$tmp;
        $request->session()->flash('_old_input', $product);
        return view('jewellermenu.product.edit',["product"=>$product,'tag'=>$tmp]);
    }
    public function product_detail(Request $request,$id)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $product = Product::find($id);
        if(Auth::user()->id!=$product->user_id){
            return redirect("home");
        }
        return view('jewellermenu.product.detail',["product"=>$product]);
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product_edit_end(productRequest $request,$id)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

        

        $product = Product::find($id);
        if(Auth::user()->id!=$product->user_id){
            return redirect("home");
        }

  
        $product->name=$request->input("name");
        $product->detail=$request->input("detail");
        $product->annotation01=$request->input("annotation01");
        $product->annotation02=$request->input("annotation02");
        $product->annotation03=$request->input("annotation03");
        $product->price=$request->input("price");
        $product->via=$request->input("via");
        $product->status=$request->input("status");

        if($request->file('image')){
              $path = $request->file('image')->store('upload/profile');
            $product->image = basename($path);  
            copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$product->image,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$product->image);    
        }

        for($i=1;$i<4;$i++){
            if($request->file('sub_img'.$i)){
              $path = $request->file('sub_img'.$i)->store('upload/profile');
              $sub_img=basename($path);  
              //  $product->sub_img{$i} = basename($path);  
                copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$sub_img,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$sub_img);   
                if($i==1){
                    $product->sub_img1= $sub_img;
                } else  if($i==2){
                    $product->sub_img2= $sub_img;
                } else  if($i==3){
                    $product->sub_img3= $sub_img;
                }

            }
        }

        $product->save();
         $product->tags()->detach(); //ユーザの登録済みのスキルを全て削除
        $product->tags()->attach($request->input("tag")); //改めて登録  
       return view('jewellermenu.product.complete');
    
    }


        public function product_status(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $product = product::find($request->input("id"));
        if(Auth::user()->id!=$product->user_id){
            return redirect("home");
        }



        $product->status=$request->input("st");
        $product->save();
die();

    
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function menu(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $query = Menu::select(['menus.*',]);
        $query->where("user_id",Auth::user()->id);
  


        $menus=$query->paginate(10);;
        return view('jewellermenu.menu.index',['menus'=>$menus]);

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function menu_new()
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        return view('jewellermenu.menu.new_post');
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function menu_new_end(MenuRequest $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $menu = new Menu();
        $menu->user_id=Auth::user()->id;
        $menu->name=$request->input("name");
        $menu->detail=$request->input("detail");
        $menu->annotation01=$request->input("annotation01");
        $menu->annotation02=$request->input("annotation02");
        $menu->annotation03=$request->input("annotation03");
        $menu->price=$request->input("price");
        $menu->via=$request->input("via");
        $menu->status=$request->input("status");

        if($request->file('image')){
              $path = $request->file('image')->store('upload/profile');
            $menu->image = basename($path);  
            copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$menu->image,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$menu->image);    
        }

        for($i=1;$i<4;$i++){
            if($request->file('sub_img'.$i)){
              $path = $request->file('sub_img'.$i)->store('upload/profile');
              $sub_img=basename($path);  
              //  $menu->sub_img{$i} = basename($path);  
                copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$sub_img,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$sub_img);   
                if($i==1){
                    $menu->sub_img1= $sub_img;
                } else  if($i==2){
                    $menu->sub_img2= $sub_img;
                } else  if($i==3){
                    $menu->sub_img3= $sub_img;
                }

            }
        }

        $menu->save();
         $menu->tags()->detach(); //ユーザの登録済みのスキルを全て削除
        $menu->tags()->attach($request->input("tag")); //改めて登録  
        return view('jewellermenu.menu.post_complete');
    }


    public function menu_edit(Request $request,$id)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $menu = Menu::find($id);
        if(Auth::user()->id!=$menu->user_id){
            return redirect("home");
        }
        $tmp=[];
        foreach ($menu->tags as $key => $tag) {
            $tmp[]=$tag->id;
        }

        $menu['tag']=$tmp;
        $request->session()->flash('_old_input', $menu);
        return view('jewellermenu.menu.edit',["menu"=>$menu,'tag'=>$tmp]);
    }
    public function menu_detail(Request $request,$id)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $menu = Menu::find($id);
        if(Auth::user()->id!=$menu->user_id){
            return redirect("home");
        }
        return view('jewellermenu.menu.detail',["menu"=>$menu]);
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function menu_edit_end(menuRequest $request,$id)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

        

        $menu = Menu::find($id);
        if(Auth::user()->id!=$menu->user_id){
            return redirect("home");
        }

  
        $menu->name=$request->input("name");
        $menu->detail=$request->input("detail");
        $menu->annotation01=$request->input("annotation01");
        $menu->annotation02=$request->input("annotation02");
        $menu->annotation03=$request->input("annotation03");
        $menu->price=$request->input("price");
        $menu->via=$request->input("via");
        $menu->status=$request->input("status");

        if($request->file('image')){
              $path = $request->file('image')->store('upload/profile');
            $menu->image = basename($path);  
            copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$menu->image,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$menu->image);    
        }

        for($i=1;$i<4;$i++){
            if($request->file('sub_img'.$i)){
              $path = $request->file('sub_img'.$i)->store('upload/profile');
              $sub_img=basename($path);  
              //  $menu->sub_img{$i} = basename($path);  
                copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$sub_img,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$sub_img);   
                if($i==1){
                    $menu->sub_img1= $sub_img;
                } else  if($i==2){
                    $menu->sub_img2= $sub_img;
                } else  if($i==3){
                    $menu->sub_img3= $sub_img;
                }

            }
        }

        $menu->save();
         $menu->tags()->detach(); //ユーザの登録済みのスキルを全て削除
        $menu->tags()->attach($request->input("tag")); //改めて登録  
       return view('jewellermenu.menu.complete');
    
    }


        public function menu_status(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $menu = Menu::find($request->input("id"));
        if(Auth::user()->id!=$menu->user_id){
            return redirect("home");
        }



        $menu->status=$request->input("st");
        $menu->save();
die();

    
    }

   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function material(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $query = Material::select(['materials.*',]);
        $query->where("user_id",Auth::user()->id);
  


        $materials=$query->paginate(10);;
        return view('jewellermenu.material.index',['materials'=>$materials]);

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function material_new()
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        return view('jewellermenu.material.new_post');
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function material_new_end(MaterialRequest $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $material = new Material();
        $material->user_id=Auth::user()->id;
        $material->name=$request->input("name");
        $material->detail=$request->input("detail");
        $material->annotation01=$request->input("annotation01");
        $material->annotation02=$request->input("annotation02");
        $material->annotation03=$request->input("annotation03");
        $material->price=$request->input("price");
        $material->via=$request->input("via");
        $material->status=$request->input("status");

        if($request->file('image')){
              $path = $request->file('image')->store('upload/profile');
            $material->image = basename($path);  
            copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$material->image,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$material->image);    
        }

        for($i=1;$i<4;$i++){
            if($request->file('sub_img'.$i)){
              $path = $request->file('sub_img'.$i)->store('upload/profile');
              $sub_img=basename($path);  
              //  $material->sub_img{$i} = basename($path);  
                copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$sub_img,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$sub_img);   
                if($i==1){
                    $material->sub_img1= $sub_img;
                } else  if($i==2){
                    $material->sub_img2= $sub_img;
                } else  if($i==3){
                    $material->sub_img3= $sub_img;
                }

            }
        }

        $material->save();
         $material->tags()->detach(); //ユーザの登録済みのスキルを全て削除
        $material->tags()->attach($request->input("tag")); //改めて登録  
        return view('jewellermenu.material.post_complete');
    }


    public function material_edit(Request $request,$id)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $material = Material::find($id);
        if(Auth::user()->id!=$material->user_id){
            return redirect("home");
        }
        $tmp=[];
        foreach ($material->tags as $key => $tag) {
            $tmp[]=$tag->id;
        }

        $material['tag']=$tmp;
        $request->session()->flash('_old_input', $material);
        return view('jewellermenu.material.edit',["material"=>$material,'tag'=>$tmp]);
    }
    public function material_detail(Request $request,$id)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $material = Material::find($id);
        if(Auth::user()->id!=$material->user_id){
            return redirect("home");
        }
        return view('jewellermenu.material.detail',["material"=>$material]);
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function material_edit_end(materialRequest $request,$id)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

        

        $material = Material::find($id);
        if(Auth::user()->id!=$material->user_id){
            return redirect("home");
        }

  
        $material->name=$request->input("name");
        $material->detail=$request->input("detail");
        $material->annotation01=$request->input("annotation01");
        $material->annotation02=$request->input("annotation02");
        $material->annotation03=$request->input("annotation03");
        $material->price=$request->input("price");
        $material->via=$request->input("via");
        $material->status=$request->input("status");

        if($request->file('image')){
              $path = $request->file('image')->store('upload/profile');
            $material->image = basename($path);  
            copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$material->image,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$material->image);    
        }

        for($i=1;$i<4;$i++){
            if($request->file('sub_img'.$i)){
              $path = $request->file('sub_img'.$i)->store('upload/profile');
              $sub_img=basename($path);  
              //  $material->sub_img{$i} = basename($path);  
                copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$sub_img,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$sub_img);   
                if($i==1){
                    $material->sub_img1= $sub_img;
                } else  if($i==2){
                    $material->sub_img2= $sub_img;
                } else  if($i==3){
                    $material->sub_img3= $sub_img;
                }

            }
        }

        $material->save();
         $material->tags()->detach(); //ユーザの登録済みのスキルを全て削除
        $material->tags()->attach($request->input("tag")); //改めて登録  
       return view('jewellermenu.material.complete');
    
    }


        public function material_status(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $material = Material::find($request->input("id"));
        if(Auth::user()->id!=$material->user_id){
            return redirect("home");
        }



        $material->status=$request->input("st");
        $material->save();
die();

    
    }

              public function message(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }


        $messages=Message::where("jeweller_id",Auth::user()->id)->orderBy("last_send_at","desc")->paginate(10);
        return view('jewellermenu.message.index',["messages"=>$messages]);
    }
    public function message_detail(Request $request,$id)
    {
        if(Auth::user()->role!=2){
            return redirect("home");
        }
        $message= Message::where('id',$id)->where('jeweller_id',Auth::user()->id)->first();
          if(!$message){

            return redirect("home");
        }
         $order = null;
        if($message->order_id){
             $order = Order::find($message->order_id);
        }else{
             $order= new Order();
         $order->name="ダイレクトメッセージ";
        }
       
        // $message = Message::where('order_id',$id)->where('jeweller_id',Auth::user()->id)->first();
        // if(!$message ){
        //     $message = new Message();
        //     $message->user_id=$order->user_id;
        //     $message->jeweller_id=Auth::user()->id;
        //     $message->order_id=$id;
        //     $message->status=1;//提示前
        //     $message->save();
        // }
 MessageList::where('message_id',$message->id)->whereNull('j_read_flg')->update(["j_read_flg"=>"1"]);
         $messageLists=MessageList::where('message_id',$message->id)->orderby('id','asc')->get();


        return view('jewellermenu.message.detail',["order"=>$order,"message"=>$message,"messageLists"=>$messageLists]);
    }

    public function message_end(Request $request,$id)
    {
        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('jeweller_id',Auth::user()->id)->first();
          if(!$message){

            return redirect("home");
        }
         $order = null;
        if($message->order_id){
             $order = Order::find($message->order_id);
        }
        if(!$message ){
            $message = new Message();
            $message->user_id=$order->user_id;
            $message->jeweller_id=Auth::user()->id;
            $message->order_id=$id;
            $message->status=1;//提示前
            $message->save();
        }else{
             $message->last_send_at=date("Y-m-d H:i:s");
             $message->save();
        }

         $messageList = new MessageList();
        if($request->file('file')){
            $path = $request->file('file')->store('upload/file');
            $messageList->file = basename($path); 
            $messageList->org_file_name=$request->file('file')->getClientOriginalName() ;
        
        }
        $messageList->message_id = $message->id;  
        $messageList->send_user_id = Auth::user()->id;  
         $messageList->detail = $request->input('detail');  
         $messageList->send_type ='jeweller'; 
        $messageList->j_read_flg=2;
         $messageList->save();
         $user=User::find($message->user_id);

          Mail::to($user->email)->send( new MessageMail(Auth::user()->name,$user->name, $request->input('detail'),$user->email) );
        return redirect('/jewellermenu/message/detail/'.$id);
    }



 public function message_order_detail(Request $request,$id)
    {
        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $order = Order::find($id);
        if(!$order){
            abort(404);
        }
        $message = Message::where('order_id',$id)->where('jeweller_id',Auth::user()->id)->first();

        if(!$message ){
            $message = new Message();
            $message->user_id=$order->user_id;
            $message->jeweller_id=Auth::user()->id;
            $message->order_id=$id;
            $message->status=1;//提示前
            $message->u_price= $order->price;
            $message->u_limit_at=$order->limit_date2;
            $message->u_at=date("Y-m-d H:i:s");//提示前
            $message->save();
        }else{
            return redirect('/jewellermenu/message/detail/'.$message->id);

        }
        MessageList::where('message_id',$message->id)->whereNull('j_read_flg')->update(["j_read_flg"=>"1"]);
         $messageLists=MessageList::where('message_id',$message->id)->orderby('id','asc')->get();


        return view('jewellermenu.message.detail',["order"=>$order,"message"=>$message ,"messageLists"=>$messageLists]);
    }

    public function message_order_detail_end(Request $request,$id)
    {
        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $order = Order::find($id);
        if(!$order ){
            abort(403);
        }
        $message = Message::where('order_id',$id)->where('jeweller_id',Auth::user()->id)->first();
        if(!$message ){
            $message = new Message();
            $message->user_id=$order->user_id;
            $message->jeweller_id=Auth::user()->id;
            $message->order_id=$id;
            $message->status=1;//提示前
            $message->last_send_at=date("Y-m-d H:i:s");
            $message->save();
        }else{
             $message->last_send_at=date("Y-m-d H:i:s");
             $message->save();
        }

         $messageList = new MessageList();
        if($request->file('file')){
            $path = $request->file('file')->store('upload/file');
            $messageList->file = basename($path); 
            $messageList->org_file_name=$request->file('file')->getClientOriginalName() ;
        
        }
        $messageList->message_id = $message->id;  
        $messageList->send_user_id = Auth::user()->id;  
         $messageList->detail = $request->input('detail');  
         $messageList->send_type ='jeweller'; 
        $messageList->j_read_flg=2;
         $messageList->save();
         $user=User::find($order->user_id);

          Mail::to($user->email)->send( new MessageMail(Auth::user()->name,$user->name, $request->input('detail'),$user->email) );
        return redirect('/jewellermenu/message/detail/'.$message->id);
    }
    public function message_acept(Request $request,$id)
    {
        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('jeweller_id',Auth::user()->id)->first();
          if(!$message){

            return redirect("home");
        }
         $order = null;
        if($message->order_id){
             $order = Order::find($message->order_id);
        }

        $message->j_doui="1";

        if($message->u_doui==1){
            $message->status= 2;
            $message->accept_price= $message->j_price;   
            $message->accept_at= date("Y-m-d H:i:s");
              $message->accept_type= "jeweller"; 
        }
        $message->save();

        $user=User::find($message->user_id);
        Mail::to($user->email)->send( new AceptMail(Auth::user()->name,$user->name,"",$user->email) );

        return redirect('/jewellermenu/message/detail/'.$message->id);
    }
    public function message_proposal(JproposalRequest $request,$id)
    {
        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('jeweller_id',Auth::user()->id)->first();
          if(!$message){

            return redirect("home");
        }
         $order = null;
        if($message->order_id){
             $order = Order::find($message->order_id);
        }

        $message->u_doui=null;
        $message->j_doui=null;
        $message->j_price=$request->input("price");
        $message->j_at=date("Y-m-d H:i:s");
        $message->j_limit_at=$request->input("date");

        $message->save();

      $user=User::find($message->user_id);
        Mail::to($user->email)->send( new ProposalMail(Auth::user()->name,$user->name,"",$user->email) );


        return redirect('/jewellermenu/message/detail/'.$message->id);
    }



     public function message_download(Request $request,$id){


         $messageList = MessageList::find($id);
         if(!$messageList){
            abort (403);
         }
         //自分かつ相手でもない場合は403
        if(!$messageList->send_user_id!=Auth::user()->id){
            $message = Message::find($messageList->message_id);
            if(!$message){
                abort (403);
             }
             if($message->user_id!=$messageList->send_user_id){
                abort (403);
             }

        }
        $filePath = 'upload/file/'.$messageList->file;

        $fileName = $messageList->org_file_name;

        $mimeType = Storage::mimeType($filePath);

        $headers = [['Content-Type' => $mimeType]];

        return Storage::download($filePath, $fileName, $headers);




     }
    public function send(Request $request,$id)
    {
        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('jeweller_id',Auth::user()->id)->first();
          if(!$message || $message->status!=3){

            return redirect("home");
        }
         $order = null;
        if($message->order_id){
             $order = Order::find($message->order_id);
        }


         $message->send_at=date("Y-m-d H:i:s");
       $message->status= 4;
        $message->save();

        $user=User::find($message->user_id);
        Mail::to($user->email)->send( new SendMail(Auth::user()->name,$user->name,"",$user->email) );
        return redirect('/jewellermenu/message/detail/'.$message->id);
    }

         public function favorite(Request $request)
    {

       if(Auth::user()->role!=2){
            return redirect("home");
        }
        if(is_array($request->input('type'))){
                    $bookmarks = Bookmark::where("user_id", Auth::user()->id)->whereIn("type",$request->input('type'))->paginate(10);
        }else{
                    $bookmarks = Bookmark::where("user_id", Auth::user()->id)->paginate(10);
        }



        return view('jewellermenu.favorite.index',["bookmarks"=>$bookmarks]);
    }


 public function assessment(Request $request,$id)
    {
        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('jeweller_id',Auth::user()->id)->first();
          if(!$message || $message->status!=5){

            return redirect("home");
        }
         $order = null;
        if($message->order_id){
             $order = Order::find($message->order_id);
        }
           return view('jewellermenu.assessment.index',["message"=>$message]);
    }



     public function assessment_end(Request $request,$id)
    {
        if(Auth::user()->role!=2){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('jeweller_id',Auth::user()->id)->first();
          if(!$message || $message->status!=5){

            return redirect("home");
        }
        $evaluation_tmp=Evaluation::where("user_id",Auth::user()->id)->where("message_id",$message->id)->first();
        if($evaluation_tmp){
            return view('mymenu.assessment.complete',["message"=>$message]);
        }
        $target_user=USer::find( $message->user_id);
        $target_user->eva_cnt=$target_user->eva_cnt+1;
        $target_user->eva_total=$target_user->eva_total+$request->input("star");
        $tmp=round($target_user->eva_total/ $target_user->eva_cnt,2);
        $target_user->ave_evaluation=round($tmp*2, 0) / 2;
        $target_user->save();
        $evaluation_tmp=Evaluation::where("target_user_id",$target_user->id)->where("message_id",$message->id)->first();
        if($evaluation_tmp){
            $message->status= 6;
            $message->save();
        }


        $evaluation = new Evaluation();
        $evaluation->user_id= Auth::user()->id;
        $evaluation->target_user_id= $target_user->id;
        $evaluation->message_id= $message->id;
        $evaluation->comment= $request->input("star");
        $evaluation->star= $request->input("comment");
        $evaluation->save();

           return view('jewellermenu.assessment.complete',["message"=>$message]);
    }




          public function leave()
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }


        return view('jewellermenu.leave.index');
    }

    public function orderhistory(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
            }
             $messages=Message::where("user_id",Auth::user()->id)->orderBy("last_send_at","desc")->paginate(10);
            


            $id_name=[1=>"wait_contract",2=>"wait_payment",3=>"wait_shipping",4=>"wait_check",5=>"wait_assessment",6=>"fix"];
        return view('jewellermenu.orderhistory.index',compact("messages","id_name"));
    }

     public function orderhistory_detail(Request $request,$id)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

                 $message=Message::find($id);
                 if($message->user_id!=Auth::user()->id){
                    return redirect("home");
                 }


            $id_name=[1=>"wait_contract",2=>"wait_payment",3=>"wait_shipping",4=>"wait_check",5=>"wait_assessment",6=>"fix"];
        return view('jewellermenu.orderhistory.detail',compact("message","id_name"));
    }
     public function orderreceived(Request $request)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
            }
             $messages=Message::where("jeweller_id",Auth::user()->id)->orderBy("last_send_at","desc")->paginate(10);
            


            $id_name=[1=>"wait_contract",2=>"wait_payment",3=>"wait_shipping",4=>"wait_check",5=>"wait_assessment",6=>"fix"];
        return view('jewellermenu.orderreceived.index',compact("messages","id_name"));
    }

     public function orderreceived_detai(Request $request,$id)
    {

        if(Auth::user()->role!=2){
            return redirect("home");
        }

                 $message=Message::find($id);
                 if($message->jeweller_id!=Auth::user()->id){
                    return redirect("home");
                 }


            $id_name=[1=>"wait_contract",2=>"wait_payment",3=>"wait_shipping",4=>"wait_check",5=>"wait_assessment",6=>"fix"];
        return view('jewellermenu.orderreceived.detail',compact("message","id_name"));
    }

}
