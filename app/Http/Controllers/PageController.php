<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Illuminate\Http\Request;
use App\Infomation;
class PageController extends Controller
{
    private $user = null;

    /**
     * Constructor
     */
    public function __construct()
    {

        // Auth::*->user() が通常取得できない為、Middlewareを定義して処理を行う
        $this->middleware(function ($request, $next) {
            // ログイン中の user
            $this->user = Auth::guard('web')->user();

            return $next($request);
        });
    }

  /**
   * トップページ
   *
   * @return \Illuminate\Http\Response
   */
    public function index()
    {
        $infomations=Infomation::orderby("yyyymmdd","desc")->limit(3)->get();
        
        return view('index',["infomations"=>$infomations]);
    }


 /**
   *静的ページ系
   *
   * @return \Illuminate\Http\Response
   */
    public function page($slug)
    {
        if(View::exists('page.'.$slug) ){
            return view('page.'.$slug);  
        }
        abort(404);
        
    }
}
