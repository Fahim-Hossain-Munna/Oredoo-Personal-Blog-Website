<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class WebBloggerLogRegisController extends Controller
{
    public function web_login(){
        return view('frontend.blogger_registration.login');
    }
    public function web_register(){
        return view('frontend.blogger_registration.register');
    }
    public function web_register_post(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'condition' => 'required',
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'blogger',
            'created_at' => now(),
        ]);

        return back()->with('register_success','Thanks'." ".$request->name." ".'Thank you for getting in touch.Your Registration Successful,Please Login');
    }
    public function web_login_post(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'condition' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$request->condition)) {
            return redirect()->route('home');
        }else{
            return back()->with('log_failed_error','The provided credentials do not match our records.');
        }

        if (Auth()->attempt($request->only(['email','password']),$request->condition)) {
            return redirect()->route('home');
        }else{
            return back()->with('log_failed_error','The provided credentials do not match our records.');
        }

    }
}
