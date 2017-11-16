<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;

class Authcontroller extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except(['Get_Profile_View','logout']);
        $this->middleware('auth')->only(['Get_Profile_View','logout']);
    }

    public function Get_Profile_View(){
        //get profile page
        return view('user.profile');
    }

    public function Get_Login_View(){
    	//get login page
    	return view('user.login');
    }

    public function Get_Register_View(){
    	//get Register page
    	return view('user.register');
    }


    public function Login(Request $request){
        //validation
        $this->validate($request,[
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $email = $request['email'];
        $password = $request['password'];

        if ( Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('home');
        }else{
             return redirect()->back();
        } 
    }

    public function Register(Request $request){

    	//validation
    	$this->validate($request,[
    		'email' => 'email|required|unique:users',
    		'name' => 'required|min:2|max:20',
    		'password' => 'required|min:5|max:32|confirmed'
    	]);

        //get user information from form
    	$email = $request['email'];
    	$name = $request['name'];
    	$password = bcrypt($request['password']);


    	//make new user
    	$user =new User();
    	$user->email = $email;
    	$user->name = $name;
    	$user->password = $password;

    	
	
        //save this user in database
    	$user->save();

        //let user login 
        auth()->login($user);

        //return the welcome page
    	return redirect()->route('home');
    }


    public function logout(Request $request){
       
        auth()->logout();
        //destroy session
        Session::flush();
        return redirect()->route('home');
    }


}
