<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\Tag;
use App\Category;
class OrderController extends Controller
{
     private $user = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except("list");
        $this->user = Auth::guard('web')->user();
    }
     public function index(){
       


          return view('order.index');
     }

     private $order_sort=[
      0=>["id","desc"],
      1=>["limit_date1","desc"],
      2=>["limit_date1","asc"],
      3=>["price","desc"],
      4=>["price","asc"],


   ];

      public function list(Request $request){
        $order = session('order',[]);

        $sort_number=0;
        $sort=["id","desc"];
        if(isset($order['order']) && isset($this->order_sort[$order['order']])){
          $sort=$this->order_sort[$order['order']];
          $sort_number=$order['order'];

        }

        $query = Order::where("status",1)->whereDate("limit_date1",'>=',date("Y-m-d"));


        


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
             $query->select('order_id')
                 ->from('order_tag')
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
        
        $orders=$query->paginate(20);;

          return view('order_list/index',["orders"=>$orders,"cond1"=>$cond1,"cond2"=>$cond2,"cond3"=>$cond3,"cond4"=>$cond4,'sort_number'=>$sort_number]);
     }
      public function detail(Request $request,Order $order){
       
        $query = Order::where("status",1)->whereDate("limit_date1",'>=',date("Y-m-d"));
        if( $order->status!=1 ||  $order->limit_date1<date("Y-m-d")){
          abort(404);
        }




          return view('order_list/detail',["order"=>$order]);
     }

    //OrderRequest

         public function end(OrderRequest $request)
    {



        $order = new Order();
        $order->user_id=Auth::user()->id;
        $order->name=$request->input("name");
        $order->category_id=$request->input("category_id");
        // $order->category2=$request->input("category2");
        // $order->category3=$request->input("category3");
        // $order->category4=$request->input("category4");
        $order->detail=$request->input("detail");
        $order->annotation01=$request->input("annotation01");
        $order->annotation02=$request->input("annotation02");
        $order->annotation03=$request->input("annotation03");
        $order->price=$request->input("price");
        $order->limit_date1=$request->input("limit_date1");
        $order->limit_date2=$request->input("limit_date2");
        $order->status=1;
        if($request->file('image')){
              $path = $request->file('image')->store('upload/profile');
            $order->image = basename($path);  
            copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$order->image,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$order->image);    
        }

        for($i=1;$i<4;$i++){
            if($request->file('sub_img'.$i)){
              $path = $request->file('sub_img'.$i)->store('upload/profile');
              $sub_img=basename($path);  
              //  $order->sub_img{$i} = basename($path);  
                copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$sub_img,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$sub_img);   
                if($i==1){
                    $order->sub_img1= $sub_img;
                } else  if($i==2){
                    $order->sub_img2= $sub_img;
                } else  if($i==3){
                    $order->sub_img3= $sub_img;
                }

            }
        }

        $order->save();
        $order->tags()->detach(); //ユーザの登録済みのスキルを全て削除
        $order->tags()->attach($request->input("tag")); //改めて登録  
        return redirect('order/complete');
    }


         public function complete(){
       


          return view('order.complete');
     }
}
