<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Csv;
use App\Status;
use App\TaiStatus;
use App\Branch;
use App\Team;
use App\Appointer;
use App\Closer;
use App\Defender;
use App\Customer;
use App\Plan; 
use App\Op; 
use App\FirstFollower; 
use App\SecondFollower; 
use App\Pay; 
use App\Comment;
use App\CustomerLog;
use setasign\Fpdi\TcpdfFpdi;
class SearchController extends Controller
{
     private $user = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');
        $this->user = Auth::guard('web')->user();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user=Auth::guard('web')->user();
        $statuses=Status::get();
        $tai_statuses=TaiStatus::get();
        $branches=Branch::get();
        $teams=Team::get();
        $appointers=Appointer::get();
        $closers=Closer::get();
        $defenders=Defender::get();
        $pays=pay::get();

        $query=Customer::select([
            'customers.*'
        ]);
        if($request->input("id")){
            $query = $query->where('id',$request->input("id"));
        }
        if($request->input("tel")){
            $query = $query->where('tel', 'LIKE', "%".$request->input("tel")."%");
        }
        if($request->input("mobile")){
            $query = $query->where('mobile', 'LIKE', "%".$request->input("mobile")."%");
        }
        if($request->input("name")){
            $query = $query->where('name', 'LIKE', "%".$request->input("name")."%");
        }
        if($request->input("kana")){
            $query = $query->where('kana', 'LIKE', "%".$request->input("kana")."%");
        }
        if($request->input("status")){
            $query = $query->where('status_id', 'IN', $request->input("status"));
        }
        if($request->input("tai_status")){
            $query = $query->where('tai_status_id', 'IN', $request->input("status"));
        }
        if($request->input("is_pay")){
            $query = $query->where('is_pay',1);
        }
        if($request->input("is_pay_defect")){
            $query = $query->where('is_pay_defect',1);
        }
        if($request->input("application_at1")){
            $query = $query->where('application_at', '>=', $request->input("application_at1"));
        }
        if($request->input("application_at2")){
            $query = $query->where('application_at', '<=', $request->input("application_at2"));
        }
            if($request->input("construction_at1")){
            $query = $query->where('construction_at', '>=', $request->input("construction_at1"));
        }
        if($request->input("construction_at2")){
            $query = $query->where('construction_at', '<=', $request->input("construction_at2"));
        }
         if($request->input("send_status_at1")){
            $query = $query->where('send_status_at1', 'LIKE', "%".$request->input("send_status_at1")."%");
        }
        if($request->input("send_status_at2")){
            $query = $query->where('send_status_at2', 'LIKE', "%".$request->input("send_status_at2")."%");
        }
        if($request->input("send_status_at3")){
            $query = $query->where('send_status_at3', 'LIKE', "%".$request->input("send_status_at3")."%");
        }

        if(Auth::guard('web')->user()->role==4 || Auth::guard('web')->user()->role==5){
        	$query = $query->where('branch_id', Auth::guard('web')->user()->branch_id);
        }else if($request->input("branch")){
            $query = $query->where('branch_id', 'IN', $request->input("branch"));
        }
        if($request->input("team")){
            $query = $query->where('team_id', 'IN', $request->input("team"));
        }
        if($request->input("appointer")){
            $query = $query->where('apointer', 'IN', $request->input("appointer"));
        }
        if($request->input("closer")){
            $query = $query->where('closer_id', 'IN', $request->input("closer"));
        }
        if($request->input("defender")){
            $query = $query->where('defender_id', 'IN', $request->input("defender"));
        }
         if($request->input("cs")){
            $query = $query->where('cs',1);
        }
        if($request->input("pay")){
            $query = $query->where('pay', 'IN', $request->input("pay"));
        }

        $request->session()->flash('_old_input', $request->all());

        $customers=$query->get();
        return view('search.index',["customers"=>$customers,"statuses"=>$statuses,"tai_statuses"=>$tai_statuses
    ,"branches"=>$branches,"teams"=>$teams,"appointers"=>$appointers,"closers"=>$closers,"defenders"=>$defenders,"pays"=>$pays]);
    }


    public function edit($id,Request $request)
    {
         $user=Auth::guard('web')->user();

         $customer=Customer::find($id);
        $statuses=Status::get();
        $tai_statuses=TaiStatus::get();
        $branches=Branch::get();
        $teams=Team::get();
        $appointers=Appointer::get();
        $closers=Closer::get();
        $defenders=Defender::get();
        $plans=Plan::get();
        $ops=Op::get();
        $first_followers=FirstFollower::get();
         $second_followers=SecondFollower::get();


         $comments=Comment::where("customer_id",$id)->orderBy("id","asc")->get();

         $customerLogs=CustomerLog::where("customer_id",$id)->orderBy("id","desc")->get();

        return view(
            'search.edit',["id"=>$id,"customer"=>$customer,"statuses"=>$statuses,"tai_statuses"=>$tai_statuses
    ,"branches"=>$branches,"teams"=>$teams,"appointers"=>$appointers,"closers"=>$closers,"defenders"=>$defenders,"plans"=>$plans,"ops"=>$ops,"first_followers"=>$first_followers,"second_followers"=>$second_followers,"comments"=>$comments,"user"=>$user,"customerLogs"=>$customerLogs]
        );
    }

     /**
     * reg
     *
     * @param  \Illuminate\Http\Request          $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function end(Request $request,$id)
    {


        // CSVヘッダとテーブルのカラムを関連付けておく
        $list = [
            'id' => "顧客番号",
            'is_pay' =>  "決済",
            'is_pay_defect' =>  "不備",
            'status_id' =>  "ステータス",
            'tai_statu_ids' =>  "対応ステータス",
            'tai_at' =>  "対応日",
            'next_tel' =>  "次回架電",
            'application_at' =>  "申込日",
           'branch_id' =>  "拠点",
            'team_id' =>  "チーム",
            'apointer' =>  "アポインター",
            'closer_id' =>  "クローザー",
            'defender_id' =>  "後確者",
            'tel' =>  "固定電話",
            'mobile' =>  "携帯電話番号",

            'plan_id' =>  "申込プラン",
            'op_id' =>  "申込OP",
            'op_cancel_at' =>  "OP解約日",
            'construction_at' =>  "工事日",

            'name' =>  "契約者",
            'kana' =>  "フリガナ",
            'birsth_date' =>  "生年月日",
            'ntt_name' =>  "NTT契約者",
            'ntt_kana' =>  "NTT契約者カナ",
                'line' =>  "既契約回線",
            'zip' =>  "郵便番号",
            'address' =>  "住所",
            'interlocutor' =>  "対話者",
            'interlocutor_relation' =>  "対話者間柄",


            'cancel_at' =>  "解約日",
            'cancel_month' =>  "解約月",
            'op_cancel_month' =>  "OP解約月",
            'tracking_number1' =>  "追跡番号1",
            'send_status1' =>  "配達状況1",
            'send_status_at1' =>  "配達状況日付1",

            'tracking_number2' =>  "追跡番号2",
            'send_status2' =>  "配達状況2",
            'send_status_at2' =>  "配達状況日付2",


            'tracking_number3' =>  "追跡番号3",
            'send_status3' =>  "配達状況3",
            'send_status_at3' =>  "配達状況日付3",

            'first_follower_at' =>  '1stフォロー',
            'first_follower_st' =>  "1stフォローST",
            'first_follower' =>  "1stフォロー担当者",

            'second_follower_at' =>  '2ndフォロー',
            'second_follower_st' =>  "2ndフォローST",
            'second_follower' =>  "2ndフォロー担当者",

            'pay' =>  "支払い方法",

            'nttf_status' =>  "NTTFステータス",
            'nttf_sei_number' =>  "NTTF汎用請求番号",
            'nttf_sho_number' =>  "NTTF承認番号",

            'pay_at' =>'支払い情報登録日',
            'cs' =>'CSフォローC',
 
            
            'bank_name' =>  "金融機関名",
            'bank_code' =>  "金融機関コード",
            'bank_branch' =>  "支店名",
            'bank_branch_code' =>  "支店コード",
            'bank_type' =>  "種別",
            'bank_account_number' =>  "口座番号",
            'bank_account_name' =>  "口座名義",
            
            'pay_error' =>  "決済不備記事",
          'front_note' =>  "フロント備考",
             'cs_note' =>   "CS備考",
            
        

   
                 

        ];
        // コンバート
        $request_data =$request->input();

        // バリデーション
        // $validator = $this->validator($request_data, $user);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput($request->input());
        // }

        DB::beginTransaction();
        $user=Auth::guard('web')->user();
        $customer = Customer::find($id);
        $str="";
        foreach ($list as $key => $value) {
            if(isset($request_data[$key ]) ){
                if($customer->getAttribute($key)!=$request_data[$key ]){

                    $org=$customer->getAttribute($key);
                    $change=$request_data[$key];
                    if($key==="branch_id"){
                        $org=Branch::find($customer->getAttribute($key))->name;
                        $change=Branch::find($request_data[$key])->name;
                    }else if($key==="status_id"){
                        //$row[$column_no]=Status::where("name",$row[$column_no])->value("id");
                        $org=Status::find($customer->getAttribute($key))->name;
                        $change=Status::find($request_data[$key])->name;
                    }else if($key==="tai_status_id"){
                       // $row[$column_no]=TaiStatus::where("name",$row[$column_no])->value("id");
                        $org=TaiStatus::find($customer->getAttribute($key))->name;
                        $change=TaiStatus::find($request_data[$key])->name;
                    }else if($key==="team_id"){
                       // $row[$column_no]=Team::where("name",$row[$column_no])->value("id");
                        $org=Team::find($customer->getAttribute($key))->name;
                        $change=Team::find($request_data[$key])->name;
                    }else if($key==="apointer"){
                      //  $row[$column_no]=Appointer::where("name",$row[$column_no])->value("id");
                        $org=Appointer::find($customer->getAttribute($key))->name;
                        $change=Appointer::find($request_data[$key])->name;
                    }else if($key==="closer_id"){
                       // $row[$column_no]=Closer::where("name",$row[$column_no])->value("id");
                        $org=Closer::find($customer->getAttribute($key))->name;
                        $change=Closer::find($request_data[$key])->name;
                    }else if($key==="defender_id"){
                       // $row[$column_no]=Defender::where("name",$row[$column_no])->value("id");
                        $org=Defender::find($customer->getAttribute($key))->name;
                        $change=Defender::find($request_data[$key])->name;
                    }else if($key==="plan_id"){
                       // $row[$column_no]=Plan::where("name",$row[$column_no])->value("id");
                        $org=Plan::find($customer->getAttribute($key))->name;
                        $change=Plan::find($request_data[$key])->name;
                    }else if($key==="op_id"){
                      //  $row[$column_no]=Op::where("name",$row[$column_no])->value("id");
                        $org=Op::find($customer->getAttribute($key))->name;
                        $change=Op::find($request_data[$key])->name;
                    }else if($key==="first_follower"){
                       // $row[$column_no]=FirstFollower::where("name",$row[$column_no])->value("id");
                        $org=FirstFollower::find($customer->getAttribute($key))->name;
                        $change=FirstFollower::find($request_data[$key])->name;
                    }else if($key==="second_follower"){
                       // $row[$column_no]=SecondFollower::where("name",$row[$column_no])->value("id");
                        $org=SecondFollower::find($customer->getAttribute($key))->name;
                        $change=SecondFollower::find($request_data[$key])->name;
                    }

                    $str=$str.$value.":".$org."→".$change."<br>";
                }
            }
        }
        if($str){
            $customerLog = new CustomerLog();
            $customerLog->customer_id=$id;
            $customerLog->user_id=$user->id;
            $customerLog->detail=$str;
             $customerLog->save();

        }


        if(isset($request_data["is_pay"]) && $request_data["bank_code"]){
            $customer->setAttribute("is_pay", 1);
        }else{
            $customer->setAttribute("is_pay", 0);
        }
        if(isset($request_data["is_pay_defect"])){
            $customer->setAttribute("is_pay_defect", 1);
        }else{
            $customer->setAttribute("is_pay_defect", 0);
        }
        $customer->setAttribute("status_id", $request_data["status_id"]);
        $customer->setAttribute("tai_status_id", $request_data["tai_status_id"]);
        $customer->setAttribute("tai_at", $request_data["tai_at"]);
        $customer->setAttribute("next_tel", $request_data["next_tel"]);
        $customer->setAttribute("application_at", $request_data["application_at"]);
        $customer->setAttribute("branch_id", $request_data["branch_id"]);
        $customer->setAttribute("team_id", $request_data["team_id"]);
        $customer->setAttribute("apointer", $request_data["apointer"]);
        $customer->setAttribute("closer_id", $request_data["closer_id"]);
        $customer->setAttribute("defender_id", $request_data["defender_id"]);
        $customer->setAttribute("tel", $request_data["tel"]);
        $customer->setAttribute("mobile", $request_data["mobile"]);
        $customer->setAttribute("plan_id", $request_data["plan_id"]);
        $customer->setAttribute("op_id", $request_data["op_id"]);
        $customer->setAttribute("op_cancel_at", $request_data["op_cancel_at"]);
        $customer->setAttribute("construction_at", $request_data["construction_at"]);
        $customer->setAttribute("name", $request_data["name"]);
        $customer->setAttribute("kana", $request_data["kana"]);
        $customer->setAttribute("birsth_date", $request_data["birsth_date"]);
        $customer->setAttribute("ntt_name", $request_data["ntt_name"]);
        $customer->setAttribute("ntt_kana", $request_data["ntt_kana"]);
        $customer->setAttribute("line", $request_data["line"]);
        $customer->setAttribute("zip", $request_data["zip"]);
        $customer->setAttribute("address", $request_data["address"]);
        $customer->setAttribute("interlocutor", $request_data["interlocutor"]);
        $customer->setAttribute("interlocutor_relation", $request_data["interlocutor_relation"]);
        $customer->setAttribute("cancel_at", $request_data["cancel_at"]);
        $customer->setAttribute("cancel_month", $request_data["cancel_month"]);
        if($request_data["op_cancel_month"]){
            $customer->setAttribute("op_cancel_month", $request_data["op_cancel_month"]);
        }else if( $request_data["op_cancel_at"]){
            $customer->setAttribute("op_cancel_month", substr( $request_data["op_cancel_at"], 0,4)."年".substr( $request_data["op_cancel_at"],5,2)."月");
        }
        
        $customer->setAttribute("tracking_number1", $request_data["tracking_number1"]);
        $customer->setAttribute("send_status1", $request_data["send_status1"]);
        $customer->setAttribute("send_status_at1", $request_data["send_status_at1"]);
        $customer->setAttribute("tracking_number2", $request_data["tracking_number2"]);
        $customer->setAttribute("send_status2", $request_data["send_status2"]);
        $customer->setAttribute("send_status_at2", $request_data["send_status_at2"]);
        $customer->setAttribute("tracking_number3", $request_data["tracking_number3"]);
        $customer->setAttribute("send_status3", $request_data["send_status3"]);
        $customer->setAttribute("send_status_at3", $request_data["send_status_at3"]);
        $customer->setAttribute("first_follower_at", $request_data["first_follower_at"]);
        $customer->setAttribute("first_follower_st", $request_data["first_follower_st"]);
        $customer->setAttribute("first_follower", $request_data["first_follower"]);
        $customer->setAttribute("second_follower_at", $request_data["second_follower_at"]);
        $customer->setAttribute("second_follower_st", $request_data["second_follower_st"]);
        $customer->setAttribute("second_follower", $request_data["second_follower"]);
        $customer->setAttribute("pay", $request_data["pay"]);
        $customer->setAttribute("nttf_status", $request_data["nttf_status"]);
        $customer->setAttribute("nttf_sei_number", $request_data["nttf_sei_number"]);
        $customer->setAttribute("nttf_sho_number", $request_data["nttf_sho_number"]);
        $customer->setAttribute("pay_at", $request_data["pay_at"]);
        if(isset($request_data["cs"])){
            $customer->setAttribute("cs", 1);
        }else{
            $customer->setAttribute("cs", 0);
        }
        $customer->setAttribute("bank_name", $request_data["bank_name"]);
        $customer->setAttribute("bank_code", $request_data["bank_code"]);
        $customer->setAttribute("bank_branch", $request_data["bank_branch"]);
        $customer->setAttribute("bank_branch_code", $request_data["bank_branch_code"]);
        $customer->setAttribute("bank_account_number", $request_data["bank_account_number"]);
        $customer->setAttribute("bank_account_name", $request_data["bank_account_name"]);
        $customer->setAttribute("bank_type", $request_data["bank_type"]);
        $customer->setAttribute("pay_error", $request_data["pay_error"]);
        $customer->setAttribute("front_note", $request_data["front_note"]);
        $customer->setAttribute("cs_note", $request_data["cs_note"]);


        if (! $customer->save()) {
            DB::rollBack();

            return back()->withErrors(['データベース更新時にエラーが発生しました'])->withInput($request->input());
        }




        DB::commit();



        return redirect('home');
    }



         /**
     * reg
     *
     * @param  \Illuminate\Http\Request          $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment(Request $request,$id)
    {

        // コンバート
        $request_data =$request->input();

        DB::beginTransaction();

        $comment = new Comment();
 		$this->user = Auth::guard('web')->user();

        $comment->setAttribute("user_id", $this->user->id);
        $comment->setAttribute("customer_id",$id);
        $comment->setAttribute("detail", $request_data["detail"]);
        
        if (! $comment->save()) {
            DB::rollBack();

            return back()->withErrors(['データベース更新時にエラーが発生しました'])->withInput($request->input());
        }


        DB::commit();



        return redirect('/search/edit/'.$id);
    }


        /**
     * reg
     *
     * @param  \Illuminate\Http\Request          $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment_edit(Request $request,$id)
    {

        // コンバート
        $request_data =$request->input();

        DB::beginTransaction();

        $comment = Comment::find($id);
 		$this->user = Auth::guard('web')->user();

        $comment->setAttribute("detail", $request_data["detail"]);
        
        if ($this->user->id != $comment->user_id || ! $comment->save()) {
            DB::rollBack();

            return back()->withErrors(['データベース更新時にエラーが発生しました'])->withInput($request->input());
        }


        DB::commit();



        return redirect('/search/edit/'.$comment->customer_id);
    }


        /**
     * reg
     *
     * @param  \Illuminate\Http\Request          $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment_delete(Request $request,$id)
    {

        // コンバート
        $request_data =$request->input();

        DB::beginTransaction();

        $comment = Comment::find($id);

        $this->user = Auth::guard('web')->user();

        
        if ($this->user->id != $comment->user_id || ! $comment->delete()) {
            DB::rollBack();

            return back()->withErrors(['データベース更新時にエラーが発生しました'])->withInput($request->input());
        }


        DB::commit();



        return redirect('/search/edit/'.$comment->customer_id);
    }

    public function delete(Request $request)
    {

        // コンバート
        $request_data =$request->input();

  
       foreach ($request->input("customer_id") as $key => $customer_id) {
            $customer = Customer::find($customer_id);

            $this->user = Auth::guard('web')->user();

            $customer->delete();
        }





        return redirect('/home');
    }
            /**
     * reg
     *
     * @param  \Illuminate\Http\Request          $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pdf(Request $request)
    {

        // コンバート
        $request_data =$request->input();
		$pdf = new TcpdfFpdi();
	 	foreach ($request->input("customer_id") as $key => $customer_id) {
	 		$customer=Customer::find($customer_id);
	 		if(!$customer){
	 			continue;
	 		}
	 	
	        // テンプレートPDFの設定
	        $template_path = resource_path('pdf/template_top.pdf');
	        $pdf->setSourceFile($template_path);
	 
	        $pdf->setFont('migmix2p', '', 10);
	        $pdf->setPrintHeader(false);
	        $pdf->setPrintFooter(false);
	        $pdf->addPage("P");
	 		$page = $pdf->importPage(1);
	        $pdf->useTemplate($page);
	        $pdf->SetXY(160, 1);
	        $pdf->Write(1, date("Y年m日d月"));


	        ///////////////////
	        $template_path = resource_path('pdf/template_koza.pdf');
	        $pdf->setSourceFile($template_path);
	 
	        $pdf->setFont('migmix2p', '', 30);
	        $pdf->setPrintHeader(false);
	        $pdf->setPrintFooter(false);
	        $pdf->addPage("P");
	 		$page = $pdf->importPage(1);
	        $pdf->useTemplate($page);


	        $pdf->setFont('migmix2p', '', 15);
	        $pdf->SetXY(40, 57);
	        $pdf->Write(1, $customer->kana);

	        $pdf->setFont('migmix2p', '', 30);
	        $pdf->SetXY(40, 65);
	        $pdf->Write(1, $customer->name);

	        $pdf->setFont('migmix2p', '', 20);
	        $pdf->SetXY(40, 88);
	        $pdf->Write(1, $customer->address);
	        /////////////////////////////////
	        $template_path = resource_path('pdf/template_keiyaku.pdf');
	        $pdf->setSourceFile($template_path);
	 
	        $pdf->setFont('migmix2p', '', 10);
	        $pdf->setPrintHeader(false);
	        $pdf->setPrintFooter(false);
	        $pdf->addPage("L");
	 		$page = $pdf->importPage(1);
	        $pdf->useTemplate($page);
	        $pdf->SetXY(55, 41);
	        $pdf->Write(1, date("Y年m日d月"));
	         $pdf->SetXY(55, 53);
	        $pdf->Write(1, $customer->id);
	        $pdf->SetXY(55, 65);
	        $pdf->Write(1, $customer->name);
	        $pdf->SetXY(55, 76);
	        $pdf->Write(1, $customer->address);


	        $pdf->SetXY(69,157);
	        $pdf->Write(1, $customer->application_at);
	        if($customer->closer_id){
	        	                $pdf->SetXY(202,166);
	        $pdf->Write(1, $customer->closer->name);	
	        }

		}
        $pdf->output('output.pdf', 'D');


        return Redirect::back();
    }
}
