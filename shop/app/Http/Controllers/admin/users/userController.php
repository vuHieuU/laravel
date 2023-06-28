<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    //
      public function index(){
        $title = 'Login';
         return view('admin.users.login',compact('title'));
    }
    public function store(Request $request){
//          dd($request->input());
          $request->validate([
              'email'=>'required|email',
              'password'=>'required',
          ],
          [
            'email.required'=>'email không được để trống',
            'email.email'=>'email phải đúng định dạng',
            'password.required'=>'password không được để trống',
          ]
        );
//        dd($request->all());
        if(Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ], $request->input('remember'))){
            return redirect()->route('admin');
        }
        Session::flash('error','email hoặc mật khẩu không chính xác');
        return redirect()->back();


    }
}
