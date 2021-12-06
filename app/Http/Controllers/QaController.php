<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Qa; 

class QaController extends Controller
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
     public function index(){
        $qas1=Qa::where('category',1)->where('status',1)->get();
        $qas2=Qa::where('category',2)->where('status',1)->get();
        $qas3=Qa::where('category',3)->where('status',1)->get();
        $qas4=Qa::where('category',4)->where('status',1)->get();
        $qas5=Qa::where('category',5)->where('status',1)->get();



          return view('qa.index',["qas1"=>$qas1,"qas2"=>$qas2,"qas3"=>$qas3,"qas4"=>$qas4,"qas5"=>$qas5]);
     }


 

}
