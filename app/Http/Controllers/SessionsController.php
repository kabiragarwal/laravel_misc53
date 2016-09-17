<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class SessionsController extends Controller
{
    public function create(){
        return view('login');
    }
    
    public function store(Request $request){
        $this->validate($request, ['email'=>'required|email', 'password'=>'required']);
        
        if(Auth::attempt($this->getCredentials($request))){
            flash('You are now loggedin');
            
            return redirect()->intended('/dashboard');
        }
        flash('Please provide correct credentials');
        return redirect('login');
    }
    
    public function logout(){
        Auth::logout();
        
        flash('You have now signout, See yaa.');
        return redirect('login');
    }
    
    public function getCredentials(Request $request){
        return [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'verified'=>1,
        ];
    }
    
    public function dashboard(){
        return 'dashboard';
    }
}
