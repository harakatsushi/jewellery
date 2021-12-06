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
use App\Invitation;
use App\Message;
use App\Order;
use App\MessageList;
use App\Bookmark;
use App\Http\Requests\QaRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\InviteRequest;

use App\Mail\InvitationMail;
class OperationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }
        $query = Campaign::select(['campaigns.*',]);

        $campaign=$query->first();;

        $users1=User::where('status',0)->whereIn("role",[1,2])->limit(5)->get();
        $users2=User::where('status',0)->where("role",3)->limit(5)->get();    
          $messages=Message::orderBy("last_send_at","desc")->limit(10)->get();

        return view('operationmenu.index',compact('campaign','users1','users2','messages'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function qa(Request $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }
        $query = Qa::select(['qas.*',]);
        $category=[];
        $cond=[];
        if(is_array($request->input("category"))){
            
            $query->whereIn('category',$request->input("category"));
            $category=$request->input("category");

            
            foreach ($request->input("category") as $key => $value) {
                if($value==1){
                    $cond[]="ご依頼前の良くある質問";
                }else if($value==2){
                      $cond[]="ご依頼後の良くある質問";
                }else if($value==3){
                      $cond[]="ジュエラー向け";
                }else if($value==4){
                      $cond[]="システムについて";
                }else if($value==5){
                    $cond[]="その他";
                }
            }

        }
  


        $qas=$query->paginate(10);;
        return view('operationmenu.qa.index',['qas'=>$qas,'category'=>$category,'cond'=>$cond]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function qa_new()
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }
        return view('operationmenu.qa.new_post');
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function qa_new_end(QaRequest $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }

        $qa = new Qa();

        $qa->question=$request->input("question");
        $qa->answer=$request->input("answer");
        $qa->category=$request->input("category");

        $qa->status=$request->input("status");
        $qa->save();

        return view('operationmenu.qa.post_complete');
    }


        public function qa_edit(Request $request,$id)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }
        $qa = Qa::find($id);
        return view('operationmenu.qa.edit',["qa"=>$qa]);
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function qa_edit_end(QaRequest $request,$id)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }

        $qa = Qa::find($id);

        $qa->question=$request->input("question");
        $qa->answer=$request->input("answer");
        $qa->category=$request->input("category");

        $qa->status=$request->input("status");
        $qa->save();

       return view('operationmenu.qa.complete');
    
    }


        public function qa_status(Request $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }

        $qa = Qa::find($request->input("id"));



        $qa->status=$request->input("st");
        $qa->save();
die();

    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news(Request $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }
        $query = Infomation::select(['infomations.*',]);

        $infomations=$query->paginate(10);;
        return view('operationmenu.news.index',['infomations'=>$infomations]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news_new()
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }
        return view('operationmenu.news.new_post');
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news_new_end(NewsRequest $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }

        $infomation = new Infomation();

        $infomation->title=$request->input("title");
        $infomation->detail=$request->input("detail");
        $infomation->yyyymmdd=$request->input("yyyymmdd");

        $infomation->status=$request->input("status");
        $infomation->type=$request->input("type");
        $infomation->save();

        return view('operationmenu.news.post_complete');
    }
        public function news_detail(Request $request,$id)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }
        $infomation = Infomation::find($id);
        return view('operationmenu.news.detail',["infomation"=>$infomation]);
    }


        public function news_edit(Request $request,$id)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }
        $infomation = Infomation::find($id);
        return view('operationmenu.news.edit',["infomation"=>$infomation]);
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news_edit_end(NewsRequest $request,$id)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }

        $infomation = Infomation::find($id);

        $infomation->title=$request->input("title");
        $infomation->detail=$request->input("detail");
        $infomation->yyyymmdd=$request->input("yyyymmdd");

        $infomation->status=$request->input("status");
        $infomation->type=$request->input("type");
        $infomation->save();

       return view('operationmenu.news.complete');
    
    }


        public function news_status(Request $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }

        $news = news::find($request->input("id"));



        $news->status=$request->input("st");
        $news->save();
die();

    
    }

    public function campaign(Request $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }
        $query = Campaign::select(['campaigns.*',]);

        $campaign=$query->first();;
        return view('operationmenu.campaign.index',['campaign'=>$campaign]);
    }
    public function campaign_end(Request $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }

        $campaign = Campaign::find(1);

        $campaign->title=$request->input("title");
        $campaign->detail=$request->input("detail");
        $campaign->from_date=$request->input("from_date");

        $campaign->to_date=$request->input("to_date");

        $campaign->save();

       return view('operationmenu.campaign.complete');
    }
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function user(Request $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
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
        return view('operationmenu.user.index',['users'=>$users,'genres'=>$genres,'select_role'=>$select_role,'select_genre'=>$select_genre,'select_status'=>$select_status,'cond'=>$cond]);
    }


            public function user_detail(Request $request,$id)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }
        $user = User::find($id);
        return view('operationmenu.user.detail',["user"=>$user]);
    }


            public function user_status(Request $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }

        $user = User::find($request->input("id"));



        $user->status=$request->input("st");
        $user->save();
die();

    
    }


      public function profile(Request $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }
  
        return view('operationmenu.profile.index',["user"=>Auth::user()]);
    }


    public function profile_edit (Request $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }
  
        return view('operationmenu.profile.edit',["user"=>Auth::user()]);
    }



    public function profile_edit_end(Request $request)
    {

        if(Auth::user()->role!=4 && Auth::user()->role!=3){
            return redirect("home");
        }

        $user =Auth::user();
        $user->email=$request->input("email");
        if($request->input("password")){
          $user->password=bcrypt($request->input("password"));; 
        }

        if($request->file('image')){
              $path = $request->file('image')->store('upload/profile');
            $user->image = basename($path);  
            copy('/home/raindiamond/ai-jewelly.com/storage/app/upload/profile/'.$user->image,'/home/raindiamond/ai-jewelly.com/public_html/upload/profile/'.$user->image);    
        }



        $user->save();

       return view('operationmenu.profile.complete');
    }



    public function invitation(Request $request)
    {

        if(Auth::user()->role!=4 ){
            return redirect("home");
        }

        return view('operationmenu.invitation.index');
    }
    public function invitation_end(InviteRequest $request)
    {

        if(Auth::user()->role!=4 ){
            return redirect("home");
        }

        Invitation::where('email',$request->input("email"))->delete();

        $invitation = new Invitation();

        $invitation->email=$request->input("email");
        $invitation->code=substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 32);;
        $invitation->save();

        Mail::to($request->input("email"))->send( new InvitationMail($invitation->email,$invitation->code) );
        return view('operationmenu.invitation.complete');
    }

    public function approval()
    {

        if(Auth::user()->role!=4 ){
            return redirect("home");
        }
                $query = User::where("role",3);


         $users=$query->paginate(10);;
        return view('operationmenu.approval.index',compact("users"));
    }

    public function progress(Request $request)
    {

        if(Auth::user()->role!=4  && Auth::user()->role!=3){
            return redirect("home");
        }

          $cond=[];
        if(is_array($request->input("status") )){
             $messages=Message::whereIn("status",$request->input("status"))->orderBy("last_send_at","desc")->paginate(10);
             foreach ($request->input("status") as $key => $value) {
                if($value==1){
                    $cond[]=" 契約前";
                }elseif($value==2){
                        $cond[]="仮払い承認待ち";
                }elseif($value==3){
                        $cond[]="発送待ち";
                }elseif($value==4){
                        $cond[]="検収待ち";
                }elseif($value==5){
                        $cond[]="評価待ち";
                }elseif($value==6){
                        $cond[]="納品済み";
                }
             }
        }else{
             $messages=Message::orderBy("last_send_at","desc")->paginate(10);
        }


            $id_name=[1=>"wait_contract",2=>"wait_payment",3=>"wait_shipping",4=>"wait_check",5=>"wait_assessment",6=>"fix"];
        return view('operationmenu.progress.index',compact("messages","id_name","cond"));
    }
    public function progress_detail(Request $request,$id)
    {

        if(Auth::user()->role!=4  && Auth::user()->role!=3){
            return redirect("home");
        }

                 $message=Message::find($id);



            $id_name=[1=>"wait_contract",2=>"wait_payment",3=>"wait_shipping",4=>"wait_check",5=>"wait_assessment",6=>"fix"];
        return view('operationmenu.progress.detail',compact("message","id_name"));
    }




    public function favorite(Request $request)
    {

        if(Auth::user()->role!=4  && Auth::user()->role!=3){
            return redirect("home");
        }
        if(is_array($request->input('type'))){
                    $bookmarks = Bookmark::where("user_id", Auth::user()->id)->whereIn("type",$request->input('type'))->paginate(10);
        }else{
                    $bookmarks = Bookmark::where("user_id", Auth::user()->id)->paginate(10);
        }



        return view('operationmenu.favorite.index',["bookmarks"=>$bookmarks]);
    }


    public function message (Request $request)
    {

        if(Auth::user()->role!=4  && Auth::user()->role!=3){
            return redirect("home");
        }
                $messages=Message::orderBy("last_send_at","desc")->paginate(10);
        return view('operationmenu.message.index',compact("messages"));
    }


    public function message_detail(Request $request,$id)
    {
        if(Auth::user()->role!=4  && Auth::user()->role!=3){
            return redirect("home");
        }
         $message = Message::find($id);
         if(  $message->order_id){
            $order = Order::find($message->order_id);
         }
        
        //$message = Message::where('order_id',$order->id)->first();


        $messageLists=MessageList::where('message_id',$message->id)->orderby('id','asc')->get();
        return view('operationmenu.message.detail',["order"=>$order,"message"=>$message ,"messageLists"=>$messageLists]);
    }
    public function message_read_only(Request $request,$id)
    {
        if(Auth::user()->role!=4  && Auth::user()->role!=3){
            return redirect("home");
        }

         $message = Message::find($id);
         if(  $message->order_id){
            $order = Order::find($message->order_id);
         }


        $messageLists=MessageList::where('message_id',$message->id)->orderby('id','asc')->get();
        return view('operationmenu.message.read_only',["order"=>$order,"message"=>$message ,"messageLists"=>$messageLists]);
    }
  
     public function message_download(Request $request,$id){

        if(Auth::user()->role!=4  && Auth::user()->role!=3){
            return redirect("home");
        }
         $messageList = MessageList::find($id);
         if(!$messageList){

            abort (403);
         }
         //自分かつ相手でもない場合は403

            $message = Message::find($messageList->message_id);
            if(!$message){

                abort (403);
             }


        
        $filePath = 'upload/file/'.$messageList->file;

        $fileName = $messageList->org_file_name;

        $mimeType = Storage::mimeType($filePath);

        $headers = [['Content-Type' => $mimeType]];

        return Storage::download($filePath, $fileName, $headers);




     }
}
