<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;
use App\Branch;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    public function index(Request $request)
    {
        $user=Auth::guard('branch')->user();
        if($request->session()->get('branch')){
            return redirect('branch/home');
        }
        return view('branch.login',["error"=>""]);
    }

    public function login(Request $request)
    {


        if($request->session()->get('branch')){
            return redirect('branch/home');
        }

        $email=$request->input('email');
        $password=$request->input('password');
        $branch=Branch::where('email',$email)->where('password',$password)->first();
        if($branch){
            $request->session()->put('branch',$branch);
              return redirect('branch/home');
        }
        return view('branch.login',["error"=>"ログインエラー：メールアドレスかパスワードが間違っています。"]);

    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
