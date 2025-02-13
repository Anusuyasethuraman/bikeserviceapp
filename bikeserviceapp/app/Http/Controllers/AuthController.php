<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

//login functions    
   public function login(){
    return view("auth.login");
   }

   public function loginpost(Request $request){
    $request->validate([
        "email"=>"required",
        "password"=>"required",
        "phone_number" =>"required"
        ]);

    $credentials = $request->only("email","password","phone_number");
    if(Auth::attempt($credentials)){
        $request->session()->regenerate(); 
        return redirect()->intended(route("booking"));
    }
    return redirect(route("login"))->with('error', "login failed");
   }
//register functions
   public function register(){
    return view("auth.register");
   }

   public function registerpost(Request $request){
    
    $request->validate([
    "name"=>"required",
    "email" => "required|email|unique:users,email",
    "password"=>"required",
    "phone_number" =>"required"
    ]);
    
    $user = new User;
    $user ->name = $request->name;
    $user ->email = $request->email;
    $user ->phone_number = $request->phone_number;
    $user ->password = Hash::make($request->password);
    if($user->save()){
        return redirect(route("login"))
        ->with('success','Customer created successfully');
    }
    return redirect(route("register"))->back()->with('error','failed to create account!');
   }

   public function logout(Request $request)
{
    Auth::logout(); 

    $request->session()->invalidate(); 
    $request->session()->regenerateToken(); 
    return redirect(route("login"))->with('success', 'You have been logged out.');
}
}
