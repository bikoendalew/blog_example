<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index(){
       
return view('auth.login');
    }
    public function store(Request $request){

        $this->validate($request,[
           
            'email'=>'required|email',
            'password'=>'required',
         ]);

        
      
      
        if(!auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ],$request->remember)){
            return back()->with('status','Invalid login details');
        }
        return redirect()->route('dashbord');
    }
}
