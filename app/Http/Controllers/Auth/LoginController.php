<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $maxAttempts = 20;     // ログイン試行回数（回）
    protected $decayMinutes = 30;   // ログインロックタイム（分）
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * ユーザーを探す条件を指定する
     *
     * @param  \Illuminate\Http\Request $request
     * @return Response
     */
    // protected function credentials(Request $request)
    // {
    //     return array_merge( 
    //         $request->only($this->username(), 'password'), // 標準の条件
    //         [ 'status' => 1 ] // 追加条件
    //     );
    // }
    // /**
    //  * [username 認証カラムの変更]
    //  * @return [type] [description]
    //  */
    // public function username()
    // {
    //     $username = request()->input('username');
    //     $field ='email';
    //     // 利用中のみのユーザがログインできるようにします
    //     request()->merge([$field => $username, 'status'=> 1]);
    //     return $field;
    // }

    // *
    //  * [credentials 認証カラムの追加 `status`]
    //  * @param  Request $request [description]
    //  * @return [type]           [description]
     
    // protected function credentials(Request $request)
    // {
    //     return $request->only($this->username(), 'password', 'status');
    // }

    // /**
    //  * [redirectPath 認証後のリダイレクト先の変更]
    //  * @return [type] [description]
    //  */
    // public function redirectPath()
    // {
    //     return '/home';
    // }
}
