<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use Session;
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

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UproposalRequest ;

use App\Mail\MessageMail;
use App\Mail\AceptMail;
use App\Mail\ProposalMail;
use App\Mail\PayMail;
class MymenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // Auth::*->user() が通常取得できない為、Middlewareを定義して処理を行う
        $this->middleware(function ($request, $next) {
            // ログイン中の admin
            


            return $next($request);
        });

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->status==9){
            Auth::logout();
            return redirect("login");
        }
        if(Auth::user()->role==3 || Auth::user()->role==4){
            return redirect("operationmenu");
        }
        if(Auth::user()->role==2){
            return redirect("jewellermenu");
        }
        $user = Auth::guard('web')->user();
            if(!$user->email || !$user->name){
                Session::put("sns_user_id",$user->id);

return view('auth.register_sns',["user"=>$user]);
            }
        $infomations = Infomation::where("status",1)->whereIn('type',[2,3])->get();
         $messages=Message::where("user_id",Auth::user()->id)->orderBy("last_send_at","desc")->limit(5)->get();

         $bookmarks = Bookmark::where("user_id", Auth::user()->id)->limit(5)->get();

        return view('mymenu.index',compact('infomations','messages','bookmarks'));
    }

    public function favorite(Request $request)
    {

       if(Auth::user()->role!=1){
            return redirect("home");
        } $user = Auth::guard('web')->user();
            if(!$user->email || !$user->name){
                Session::put("sns_user_id",$user->id);

return view('auth.register_sns',["user"=>$user]);
            }
         $user = Auth::guard('web')->user();
            if(!$user->email || !$user->name){
                Session::put("sns_user_id",$user->id);

return view('auth.register_sns',["user"=>$user]);
            }
        if(is_array($request->input('type'))){
                    $bookmarks = Bookmark::where("user_id", Auth::user()->id)->whereIn("type",$request->input('type'))->paginate(10);
        }else{
                    $bookmarks = Bookmark::where("user_id", Auth::user()->id)->paginate(10);
        }



        return view('mymenu.favorite.index',["bookmarks"=>$bookmarks]);
    }


        public function payment (Request $request)
    {

       if(Auth::user()->role!=1){
            return redirect("home");
        } $user = Auth::guard('web')->user();
            if(!$user->email || !$user->name){
                Session::put("sns_user_id",$user->id);

return view('auth.register_sns',["user"=>$user]);
            }




        return view('mymenu.payment.index');
    }
    
      public function profile(Request $request)
    {

        if(Auth::user()->role!=1){
            return redirect("home");
        } $user = Auth::guard('web')->user();
            if(!$user->email || !$user->name){
                Session::put("sns_user_id",$user->id);

return view('auth.register_sns',["user"=>$user]);
            }
    
        return view('mymenu.profile.index',["user"=>Auth::user()]);
    }


    public function profile_edit (Request $request)
    {

        if(Auth::user()->role!=1){
            return redirect("home");
        } $user = Auth::guard('web')->user();
            if(!$user->email || !$user->name){
                Session::put("sns_user_id",$user->id);

return view('auth.register_sns',["user"=>$user]);
            }

        return view('mymenu.profile.edit',["user"=>Auth::user()]);
    }



    public function profile_edit_end(Request $request)
    {

        if(Auth::user()->role!=1){
            return redirect("home");
        } $user = Auth::guard('web')->user();
            if(!$user->email || !$user->name){
                Session::put("sns_user_id",$user->id);

return view('auth.register_sns',["user"=>$user]);
            }

        $user =Auth::user();
        $user->name=$request->input("name");
        $user->email=$request->input("email");
       
        $user->comment=$request->input("comment");

        if($request->input("password")){
          $user->password=bcrypt($request->input("password"));; 
        }

        if($request->file('image')){
              $path = $request->file('image')->store('upload/profile');
            $user->image = basename($path);  
            copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$user->image,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$user->image);    
        }



        $user->save();
 
       return view('mymenu.profile.complete');
    }
          public function message(Request $request)
    {

        if(Auth::user()->role!=1){
            return redirect("home");
        } $user = Auth::guard('web')->user();
            if(!$user->email || !$user->name){
                Session::put("sns_user_id",$user->id);

return view('auth.register_sns',["user"=>$user]);
            }


        $messages=Message::where("user_id",Auth::user()->id)->orderBy("last_send_at","desc")->paginate(10);
        return view('mymenu.message.index',["messages"=>$messages]);
    }

 public function message_detail(Request $request,$id)
    {
        if(Auth::user()->role!=1){
            return redirect("home");
        }
        $message= Message::where('id',$id)->where('user_id',Auth::user()->id)->first();
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
 MessageList::where('message_id',$message->id)->whereNull('u_read_flg')->update(["u_read_flg"=>"1"]);
         $messageLists=MessageList::where('message_id',$message->id)->orderby('id','asc')->get();


        return view('mymenu.message.detail',["order"=>$order,"message"=>$message,"messageLists"=>$messageLists]);
    }

    public function message_end(Request $request,$id)
    {
        if(Auth::user()->role!=1){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('user_id',Auth::user()->id)->first();
          if(!$message){

            return redirect("home");
        }
         $order = null;
        if($message->order_id){
             $order = Order::find($message->order_id);
        }
        if(!$message ){
            $message = new Message();
            $message->user_id==Auth::user()->id;
            $message->jeweller_id=null;
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
        $messageList->u_read_flg=2;
         $messageList->save();
         $user=User::find($message->jeweller_id);

          Mail::to($user->email)->send( new MessageMail(Auth::user()->name,$user->name, $request->input('detail'),$user->email) );
        return redirect('/mymenu/message/detail/'.$id);
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
             if($message->jeweller_id!=$messageList->send_user_id){

                abort (403);
             }

        }
        $filePath = 'upload/file/'.$messageList->file;

        $fileName = $messageList->org_file_name;

        $mimeType = Storage::mimeType($filePath);

        $headers = [['Content-Type' => $mimeType]];

        return Storage::download($filePath, $fileName, $headers);




     }



      public function message_acept(Request $request,$id)
    {
        if(Auth::user()->role!=1){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('user_id',Auth::user()->id)->first();
          if(!$message){

            return redirect("home");
        }
         $order = null;
        if($message->order_id){
             $order = Order::find($message->order_id);
        }

        $message->u_doui="1";

        if($message->j_doui==1){
            $message->status= 2;
            $message->accept_price= $message->u_price;   
            $message->accept_at= date("Y-m-d H:i:s"); 
            $message->accept_type= "user"; 
        }
        $message->save();

        $user=User::find($message->jeweller_id);
        Mail::to($user->email)->send( new AceptMail(Auth::user()->name,$user->name,"",$user->email) );

        return redirect('/mymenu/message/detail/'.$message->id);
    }
    public function message_proposal(UproposalRequest $request,$id)
    {
        if(Auth::user()->role!=1){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('user_id',Auth::user()->id)->first();
          if(!$message){

            return redirect("home");
        }
         $order = null;
        if($message->order_id){
             $order = Order::find($message->order_id);
        }

        $message->u_doui=null;
        $message->j_doui=null;
        $message->u_price=$request->input("price");
        $message->u_at=date("Y-m-d H:i:s");
        $message->u_limit_at=$request->input("date");

        $message->save();

      $user=User::find($message->jeweller_id);
        Mail::to($user->email)->send( new ProposalMail(Auth::user()->name,$user->name,"",$user->email) );


        return redirect('/mymenu/message/detail/'.$message->id);
    }
     public function pay(Request $request,$id)
    {
        if(Auth::user()->role!=1){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('user_id',Auth::user()->id)->first();
          if(!$message || $message->status!=2){

            return redirect("home");
        }
         $order = null;
        if($message->order_id){
             $order = Order::find($message->order_id);
        }



     //    $redirect_url="";
     //    $url = 'https://beta.epsilon.jp/cgi-bin/order/receive_order3.cgi';

     //    // POSTデータ
     //    $data = array(
     //        "contract_code" => "xxxxxxx",
     //        "user_id" => Auth::user()->id,
     //        "user_name" =>  Auth::user()->name,
     //        "user_mail_add" => Auth::user()->email,
     //        "item_code" => $message->jeweller_id,
     //        "item_name" => $message->jeweller->name."様",
     //        "order_number" => $message->id+1,
     //        "st_code" => '10100-0000-00000',
     //        "mission_code" =>1,
     //        "item_price" => $message->accept_price,
     //        "process_code" => 1,
     //        "memo1" => "",
     //        "memo2" =>"",
     //        "xml" => "0",
     //    );
     //    // $data = http_build_query($data, "", "&");

     //    // // header
     //    // $header = array(
     //    //     "Content-Type: application/x-www-form-urlencoded",
     //    //     "Content-Length: ".strlen($data)
     //    // );

     //    // $context = array(
     //    //     "http" => array(
     //    //         "method"  => "POST",
     //    //         "header"  => implode("\r\n", $header),
     //    //         "content" => $data
     //    //     )
     //    // );

     //    // $html = file_get_contents($url, false, stream_context_create($context));

     //  // die($html);
     // return view('mymenu.pay',["datas"=>$data]);


       $message->status= 3;
       $message->send_at= date("Y-m-d H:i:s");
        $message->save();

        $user=User::find($message->jeweller_id);
        Mail::to($user->email)->send( new PayMail(Auth::user()->name,$user->name,"",$user->email) );
        return redirect('/mymenu/message/detail/'.$message->id);
    }

     public function receive(Request $request,$id)
    {
        if(Auth::user()->role!=1){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('user_id',Auth::user()->id)->first();
          if(!$message || $message->status!=4){

            return redirect("home");
        }
         $order = null;
        if($message->order_id){
             $order = Order::find($message->order_id);
        }


       $message->status= 5;
       $message->recieve_at= date("Y-m-d H:i:s");
        $message->save();

        $user=User::find($message->jeweller_id);
        Mail::to($user->email)->send( new PayMail(Auth::user()->name,$user->name,"",$user->email) );
        return redirect('/mymenu/message/detail/'.$message->id);
    }

 public function assessment(Request $request,$id)
    {
        if(Auth::user()->role!=1){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('user_id',Auth::user()->id)->first();
          if(!$message || $message->status!=5){

            return redirect("home");
        }
         $order = null;
        if($message->order_id){
             $order = Order::find($message->order_id);
        }
           return view('mymenu.assessment.index',["message"=>$message]);
    }



     public function assessment_end(Request $request,$id)
    {
        if(Auth::user()->role!=1){
            return redirect("home");
        }

        $message= Message::where('id',$id)->where('user_id',Auth::user()->id)->first();
          if(!$message || $message->status!=5){

            return redirect("home");
        }
        $evaluation_tmp=Evaluation::where("user_id",Auth::user()->id)->where("message_id",$message->id)->first();
        if($evaluation_tmp){
            return view('mymenu.assessment.complete',["message"=>$message]);
        }
        $target_user=USer::find( $message->jeweller_id);
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

           return view('mymenu.assessment.complete',["message"=>$message]);
    }





 public function message_menu_detail(Request $request,$id)
    {
        if(Auth::user()->role!=1){
            return redirect("home");
        }

        $menu = Menu::find($id);
        if(!$menu){
            abort(404);
        }
        $message = Message::where('menu_id',$id)->where('jeweller_id',Auth::user()->id)->first();

        if(!$message ){
            $message = new Message();
            $message->user_id=Auth::user()->id;
            $message->jeweller_id=$menu->user_id;
            $message->menu_id=$id;
            $message->status=1;//提示前
            // $message->u_price= $order->price;
            // $message->u_limit_at=$order->limit_date2;
            // $message->u_at=date("Y-m-d H:i:s");//提示前
            $message->save();
        }else{
            return redirect('/mymenu/message/detail/'.$message->id);

        }
        // MessageList::where('message_id',$message->id)->whereNull('j_read_flg')->update(["j_read_flg"=>"1"]);
        //  $messageLists=MessageList::where('message_id',$message->id)->orderby('id','asc')->get();
         $order= new Order();
         $order->name="ダイレクトメッセージ";
        return view('mymenu.message.detail',["order"=> $order,"message"=>$message]);
    }

    public function message_menu_detail_end(Request $request,$id)
    {
        if(Auth::user()->role!=1){
            return redirect("home");
        }

        $menu = Menu::find($id);
        if(!$menu){
            abort(404);
        }
        $message = Message::where('menu_id',$id)->where('user_id',Auth::user()->id)->first();
        if(!$message ){
            $message = new Message();
            $message->user_id=Auth::user()->id;
            $message->jeweller_id=$menu->user_id;
            $message->menu_id=$id;
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
         $user=User::find($menu->user_id);

          Mail::to($user->email)->send( new MessageMail(Auth::user()->name,$user->name, $request->input('detail'),$user->email) );
        return redirect('/mymenu/message/detail/'.$message->id);
    }
    public function message_material_detail(Request $request,$id)
    {
        if(Auth::user()->role!=1){
            return redirect("home");
        }

        $material = Menu::find($id);
        if(!$material){
            abort(404);
        }
        $message = Message::where('material_id',$id)->where('jeweller_id',Auth::user()->id)->first();

        if(!$message ){
            $message = new Message();
            $message->user_id=Auth::user()->id;
            $message->jeweller_id=$material->user_id;
            $message->material_id=$id;
            $message->status=1;//提示前
            // $message->u_price= $order->price;
            // $message->u_limit_at=$order->limit_date2;
            // $message->u_at=date("Y-m-d H:i:s");//提示前
            $message->save();
        }else{
            return redirect('/mymenu/message/detail/'.$message->id);

        }
        // MessageList::where('message_id',$message->id)->whereNull('j_read_flg')->update(["j_read_flg"=>"1"]);
        //  $messageLists=MessageList::where('message_id',$message->id)->orderby('id','asc')->get();
         $order= new Order();
         $order->name="ダイレクトメッセージ";
        return view('mymenu.message.detail',["order"=> $order,"message"=>$message ]);
    }

    public function message_material_detail_end(Request $request,$id)
    {
        if(Auth::user()->role!=1){
            return redirect("home");
        }

        $material = Menu::find($id);
        if(!$material){
            abort(404);
        }
        $message = Message::where('material_id',$id)->where('user_id',Auth::user()->id)->first();
        if(!$message ){
            $message = new Message();
            $message->user_id=Auth::user()->id;
            $message->jeweller_id=$material->user_id;
            $message->material_id=$id;
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
         $user=User::find($material->user_id);

          Mail::to($user->email)->send( new MessageMail(Auth::user()->name,$user->name, $request->input('detail'),$user->email) );
        return redirect('/mymenu/message/detail/'.$message->id);
    }


              public function leave()
    {

        if(Auth::user()->role!=1){
            return redirect("home");
        }


        return view('mymenu.leave.index');
    }
    public function orderhistory(Request $request)
    {

        if(Auth::user()->role!=1){
            return redirect("home");
            }
             $messages=Message::where("user_id",Auth::user()->id)->orderBy("last_send_at","desc")->paginate(10);
            


            $id_name=[1=>"wait_contract",2=>"wait_payment",3=>"wait_shipping",4=>"wait_check",5=>"wait_assessment",6=>"fix"];
        return view('mymenu.orderhistory.index',compact("messages","id_name"));
    }

     public function orderhistory_detail(Request $request,$id)
    {

        if(Auth::user()->role!=1){
            return redirect("home");
        }

                 $message=Message::find($id);
                 if($message->user_id!=Auth::user()->id){
                    return redirect("home");
                 }


            $id_name=[1=>"wait_contract",2=>"wait_payment",3=>"wait_shipping",4=>"wait_check",5=>"wait_assessment",6=>"fix"];
        return view('mymenu.orderhistory.detail',compact("message","id_name"));
    }


}
