<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function DocLogin(Request $request){
       // $valid = $this->rules($request->all());
        //if($valid->fails()){
          //  return redirect()->back();
        //}
        //else{
            $email = $request->get('email');
            $password = $request->get('password');
            if(Auth::attempt(['email'=>$email,'password'=>$password,'user_type'=>'doctor'])){
                return redirect()->intended('/doctor/dashboard');
            }
            else{
                return redirect()->back();
            }
      //  }
    }

    public function rules($data){
        $messages = [
            'email.required' => 'Please enter your email address',
            'email.exists' => 'email already exists',
            'email.email' => 'Please enter a valid email address',
            'password.password' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters'
        ];

        $validator = validator::make($data, [
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ], $messages);
    }

    public function savedoc(request $request)
    {
      // $request->validate([
       // 'name' => 'required|string|regex:/^[a-zA-Z],{3,16}/i',
       // 'email' => 'required|unique:users|regex:/(.+)@(.+)\.(.+)/i',
       // 'password' =>'required|min:6|confirmed',
       // 'password_confirmation' => 'sometimes|required_with:password'
      // ]); 

        $users = New User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'user_type' => 'doctor',
            'spl' => $request->get('spl')
        ]);
        $users->save();

        return redirect()->intended('doctor/dashboard');
    }
}
