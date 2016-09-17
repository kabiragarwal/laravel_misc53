<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Mailers\AppMailer;

class RegistersController extends Controller
{
    public function create(){
        return view('register');
    }
    
    public function store(Request $request, AppMailer $mailer){
        
        //input validation
        //create a user
        //send email
        //flash message
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        
        $user = User::create($request->all());
        
        $mailer->sendEmailConfirmationTo($user);
        
        flash('Please confirm your email address');
        return redirect()->back();
        //dd($request->all());
    }
    
    public function confirmEmail($token){
        $user = User::whereToken($token)->firstOrFail()->confirmEmail();
        
        //$user->save(['verified' => 1, 'token'=>null]);
        flash('You are now confirmed, Please login');
        return redirect('login');
    }
}