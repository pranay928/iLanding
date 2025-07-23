<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

interface Admininterface 
{
        public function showRegister();
        public function showLogin();
        public function register(Request $request);
        public function login(Request $request);      
        public function userType();
}


class AdminController extends Controller implements Admininterface
{

    public function showRegister()
    {

        return view('admin.auth.register');

    }
    public function showLogin()
    {

        return view('admin.auth.login');

    }

    public function login(Request $request)
    {

     $validation = Validator::make($request->all(), [            
            'email' => ['required','email'],           
            'password' => ['required'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

       //check if user exist in DB
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),            
            ]))
            {
                return redirect()->route('userType');
            }
        
            return redirect()->back();   

    }

    public function logout()
    {
        if (Auth::check()) {

			Auth::logout();

           return redirect()->route('showLogin');

		} else {
			return redirect()->route('showLogin')->with('error','Login first' ); 
		}
       
	    
    }

    public function userType()
    {

        if(Auth::id()) 
        {
            $userType = Auth::user()->userType;
            $user = User::all();
            
            switch($userType)
            {
                
                case 'user' : 
                    
                    return view('home.index',compact('user')) ;
                    break; 
                    
                case 'admin' :
                        
                    return redirect()->route('dashboard');
                    
                    break ;
                    
                default :  
                
                    return redirect()->back()->with('error','Not a vaild UserType'); 
                
            }    
    
        }
    }

    public function register(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:1', 'max:250'],
            'email' => ['required', 'string', 'email', 'unique:users', 'min:1', 'max:250'],
            'phone' => ['required', 'string', 'unique:users', 'digits:10'],
            'password' => ['required','confirmed', 'string', 'min:6', 'max:20'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }


        $dataiitems = new User;
        $dataiitems->name = $request->input('name');
        $dataiitems->email = $request->input('email');
        $dataiitems->phone = $request->input('phone');
        $dataiitems->password = Hash::make($request->input('password'));
        $dataiitems->save();

        return redirect()->route('showLogin');

    }


}
