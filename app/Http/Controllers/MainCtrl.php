<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Hash;
use Session;
use Redirect;
use Response;
use App\User;
use Illuminate\Http\Request;

class MainCtrl extends Controller
{

    #Main
    public function index()
    {
    	return view('system.layouts.index');
    }

    #Login
    public function login()
    {
    	return view('system.auth.login.list');
    }

    public function doLogin(Request $request)
    {
      try { $request->validate([
            'email' => 'required',
            'password' => 'required']);
           } catch (\Exception $e) { return Response::json(['success'=>false,'class'=>'alert-danger','err'=>'Email & Password required.']);}

    	 $usr = $request->input('email'); 
       $pwd = $request->input('password');

       $data = [ 'email' => $usr, 'password' => $pwd];

    if(User::where('email',$usr)->count() > 0) { 
        if(Auth::attempt($data,true)) {
          return Response::json(['success'=>true]);
        } else  
          return Response::json(['success'=>false,'class'=>'alert-danger','err'=>'Incorrect password']);
    } else {
         return Response::json(['success'=>false,'class'=>'alert-danger','err'=>'Incorrect Email Address']);
      }
         return Response::json(['success'=>true]);
    }


    #Signup
    public function signup()
    {
        return view('system.auth.signup.list');
    }

    public function doSignup(Request $request)
    {
        try { $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'plan_id' => 'required']);
           } catch (\Exception $e) { return Response::json(['success'=>false,'class'=>'alert-danger','err'=>'All Fields required.']);}

       try { $request->validate(['email' => 'required|email']);
           } catch (\Exception $e) { return Response::json(['success'=>false,'class'=>'alert-danger','err'=>'Incorrect Email Address.']);}

        try { $request->validate(['email' => 'required|email|unique:users,email']);
           } catch (\Exception $e) { return Response::json(['success'=>false,'class'=>'alert-danger','err'=>'Email is already exists']);}

       try {

           $usr = new User;
           $usr->name = $request->input('name');
           $usr->email = $request->input('email');
           $usr->password = Hash::make($request->input('password'));
           $usr->plan_id = $request->input('plan_id');
           $usr->status = 1;
           $usr->save();

           Auth::login($usr);
          return Response::json(['success'=>true]);
       } catch (\Exception $e) {
          return Response::json(['success'=>false,'class'=>'alert-danger','err'=>'Not Registerd']);
       }
    }


    public function logout()
    {
        Auth::logout();
        return Redirect::back();
    }




}
