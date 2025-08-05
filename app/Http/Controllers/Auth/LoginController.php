<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{   /**
    * Display login page.
    *
    * @return Renderable
    */

    public function index(){
        $user = auth()->User();
        if($user->role_id!=1){
            Log::info("hello sho index userw");
            return view('home_user')->with('roleId', $user->role_id);
        }
        else{

        
        return view('home')->with('roleId', $user->role_id);
    }
    }
   public function show()
   {
    Log::info("hello show");
       return view('auth.login');
   }

   public function showhome()
   {
    $user = auth()->User();
        if($user->role_id!=1){
            Log::info("hello sho index userw");
            return view('home_user')->with('roleId', $user->role_id);
        }
        else{

        
        return view('home')->with('roleId', $user->role_id);
        }
    //    return view('home');
   }

   public function login(Request $request)
   {
       Log::info("Received login request");
	   
       $credentials = $request->validate([
           'username' => ['required'],
           'password' => ['required'],
       ]);
	   
	   
       Log::info("Received username: " . $credentials['username']);
       
       if (Auth::attempt($credentials)) {
           Log::info("User authenticated successfully");
		   
			$roles = [
			   '1' => 'Admin1',
			   '2' => 'Data Preparation',
			   '3' => 'Pre-Production',
			   '4' => 'Survey',
			   '5' => 'Map Creation',
			   '6' => '3D Modeling',
			];
			
			$request->session()->regenerate();
            $user = auth()->User();
			 Auth::user()->role_id = "123";

		    // if($user->role_id!=1){
            //     return view('home_user')->with('roleId', $user->role_id);
            //  }
            //  return view('home')->with('roleId', $user->role_id);
		  return redirect()->intended('/');
       }  else {
        return redirect()->back()
        ->withInput($request->only('username'))
        ->withErrors([
            'username' => trans('words.invalidusername'),
            'password' => trans('words.invalidpassword'),
        ]);
    }
	   
	   return;
   }

   public function logout(Request $request)
   {
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect('/login');
   }

   protected function attemptLogin(Request $request)
   {
       return Auth::attempt($request->only('username', 'password'));
   }
   
   
}