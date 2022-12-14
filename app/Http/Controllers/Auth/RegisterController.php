<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){

     $this->validate($request,[
        'name'=>'required|max:255|',
        'username'=>'required|max:255',
        'email'=>'required|email|max:255',
        'password'=>'required|confirmed',
     ]);
$user=User::create([
    'name'=>$request->name,
    'username'=>$request->username,
    'email'=>$request->email,
    'password'=>\Hash::make($request->password),
]);  

auth()->attempt([
    'email'=>$request->email,
    'password'=>$request->password,
]);

return redirect('/dashbord');
}














/*Auth::attempt([
    'email'=>$request->email,
    'password'=>$request->password
]);



   return redirect()->route('dashbord');*/
    }

