<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginForm;
use Illuminate\Support\Facades\Auth;
// use App\User;

class UserController extends Controller
{

    public function loginCheck(LoginForm $request){

        $data = $request->validated();
     
        if(Auth::attempt(['account' => $data['account'], 'password' => $data['password'], 'status' => 1 ])){

            // $user_id = Auth::id();
            $user = auth()->user()->account;
            return view('home', compact('user'));
        }
        else{
            return back()->with('err_msg','帳號或密碼錯誤!');
        }
        
    }


}
