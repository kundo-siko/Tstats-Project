<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class AuthController extends Controller
{
    //
	 public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
		'employee_no' => 'required',
		'password' => 'required'
		]);
		
		
		 $credentials = $request->only('employee_no', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');
        }
			return redirect('signin')->with('success','Invalid Credentials');
    }
	
	//Log out
	public function signout(){
		Auth::logout();
		return redirect('signin');		
	}
	
	//end controller
}
