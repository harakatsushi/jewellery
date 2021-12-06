<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Mail;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
class ContactController extends Controller
{
     private $user = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      // /  $this->middleware('auth');
        $this->user = Auth::guard('web')->user();
    }
     public function index(){
       


          return view('contact.index');
     }

    public function confirm(ContactRequest $request){
          session()->put('contact',$request->all());


          return view('contact.confirm');
     }
     public function contact_end(Request $request){
       
        $contact=session()->get('contact');
        session()->put('contact',null);
        if($contact){
           Mail::to(config('original.to_mail'))->send( new ContactMail($contact["name"],$contact["email"],$contact["detail"],config('original.to_mail')) );
            Mail::to($contact["email"])->send( new ContactMail($contact["name"],$contact["email"],$contact["detail"],$contact["email"]) );

          
        }
        return redirect('contact/complete');
     }


    public function complete(Request $request){
       


          return view('contact.complete');
     }
}
