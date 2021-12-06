<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Auth;
use DB;
use Session;
use App\Genre;
use App\User;
use App\Invitation;
use App\Http\Requests\NewJewellerRequest;
use App\Http\Requests\NewOperationRequest;

class RegisterController extends Controller
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
    public function sns()
    {



        return view('auth.register_sns');

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new_jeweller()
    {

        $genres=Genre::orderBy("id","asc")->get();

        return view('auth.new_jeweller',["genres"=>$genres]);

    }
      
     /**
     * reg
     *
     * @param  \Illuminate\Http\Request          $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function jeweller_end(NewJewellerRequest $request)
    {

        // コンバート
        $request_data =$request->input();

        // バリデーション
        // $validator = $this->validator($request_data, $user);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput($request->input());
        // }

        DB::beginTransaction();

             $user = new User();
     
       
        
        $taget_clm=["name","year","email","genre_id","name2","zip","pref","address","comment"];

        foreach ($taget_clm as $key => $value) {
            $user->setAttribute($value, $request_data[$value]);
        }
         $user->setAttribute('role', 2);
        $user->setAttribute('password',bcrypt( $request_data['password']));
        

        if (! $user->save()) {
            DB::rollBack();

            return back()->withErrors(['データベース更新時にエラーが発生しました'])->withInput($request->input());
        }

$user->genres()->detach(); //ユーザの登録済みのスキルを全て削除
        $user->genres()->attach($request->input("sub_genre_id")); //改めて登録    
        DB::commit();



        return redirect('jeweller/complete');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new_operation($code)
    {

        $invitation= Invitation::where("code",$code)->first();
        if(!$invitation){
            abort(404);
        }
        $genres=Genre::orderBy("id","asc")->get();

        return view('auth.new_operation',["genres"=>$genres]);

    }
      
     /**
     * reg
     *
     * @param  \Illuminate\Http\Request          $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function new_operation_end(NewOperationRequest $request,$code)
    {

        // コンバート
        $request_data =$request->input();

        // バリデーション
        // $validator = $this->validator($request_data, $user);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput($request->input());
        // }

        DB::beginTransaction();

             $user = new User();
     
       
        
        $taget_clm=["name","email"];

        foreach ($taget_clm as $key => $value) {
            $user->setAttribute($value, $request_data[$value]);
        }
         $user->setAttribute('role', 3);
        $user->setAttribute('password',bcrypt( $request_data['password']));
        

        if (! $user->save()) {
            DB::rollBack();

            return back()->withErrors(['データベース更新時にエラーが発生しました'])->withInput($request->input());
        }

        DB::commit();



        return redirect('operation/complete');
    }
        public function sns_end(Request $request)
    {

        // コンバート
        $request_data =$request->input();

        $id=Session::get("sns_user_id");
        if(!$id){
            abort(404);
        }
        DB::beginTransaction();

             $user = User::find( $id);
        if(!$user){
            abort(404);
        }
       
        
        $taget_clm=["name","email"];

        foreach ($taget_clm as $key => $value) {
            $user->setAttribute($value, $request_data[$value]);
        }
        

        if (! $user->save()) {
            DB::rollBack();

            return back()->withErrors(['データベース更新時にエラーが発生しました'])->withInput($request->input());
        }

        DB::commit();

         Auth::login($user, true);

        return redirect('home');
    }
}
