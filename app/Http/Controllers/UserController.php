<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Arrival;
use App\Models\Departure;
use App\Models\Points;
use App\Models\Park;
use App\Models\ParkVisit;
use App\Models\Museum;
use App\Models\MuseumVisits;
use App\Models\HeritageSite;
use App\Models\HeritageVisit;

class UserController extends Controller
{
    //
	//Enter new user details
	public function create_new_user(Request $request){
		$validatedData = $request->validate([
        'employee_no' => 'required|unique:App\Models\User,employee_no',
        'password' => 'required|confirmed',
    ]);
		
		$password = Hash::make($request->password);
		
		//echo $request->employee_no.'<br>'.$request->position.'<br>'.$request->role.'<br>'.$request->password.'<br>'.$request->cpassword;
		 $user = new User;

        $user->employee_no = $request->employee_no;
        $user->position = $request->position;
        $user->role = $request->role;
        $user->status = '1';
        $user->password = $password;

        $user->save();
		
		return redirect('view_users')->with('success','New User Created Succesfully');
	}
	
	//View Profile
	public function profile(){
		$emp = Auth::user()->employee_no;
		$user = DB::table('users')->where('id', Auth::user()->id)->first();

		$arrivals = \App\Models\Arrival::where('employee_no', $emp)->count();
		$points = \App\Models\Points::where('employee_no', $emp)->count();
		$departures = \App\Models\Departure::where('employee_no', $emp)->count();
		$parks = \App\Models\Park::where('employee_no', $emp)->count();
		$park_visits = \App\Models\ParkVisit::where('employee_no', $emp)->count();
		$museums = \App\Models\Museum::where('employee_no', $emp)->count();
		$museum_visits = \App\Models\MuseumVisits::where('employee_no', $emp)->count();
		$sites = \App\Models\HeritageSite::where('employee_no', $emp)->count();
		$site_visits = \App\Models\HeritageVisit::where('employee_no', $emp)->count();
		
		
		
		
		return view('Users.profile', ['user' => $user,'arrivals' => $arrivals,'points' => $points,'departures' => $departures,
		'parks' => $parks, 'park_visits' => $park_visits, 'museums' => $museums, 'museum_visits' => $museum_visits,
		'sites' => $sites, 'site_visits' => $site_visits]);
	}
	
	//view user deatils
	public function view_users(){
		$users = DB::table('users')->Paginate(15);
		
		return view('Users.view_users', ['users' => $users]);
	}
	
	//edit user 
	public function edit_user(Request $request){
		$id = $request->id;
		
		$id = Crypt::encryptString($id); //encrypt id
		
		return redirect()->action(
		[UserController::class, 'edit_user_details'],['id' => $id]
		);
		
	}
	
	//edit user  page
	public function edit_user_details(Request $request){		
		$id = $request->id;
		
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}
		
		$user = DB::table('users')->where('id', $id)->first();
		
		return view('Users.edit_user', ['user' => $user]);
	}	
	
	//edit user details
	public function post_edit_user(Request $request){
		$id = $request->id;
		
		$user = \App\Models\User::find($id);

		$user->employee_no = $request->employee_no;
        $user->position = $request->position;
        $user->role = $request->role;

		$user->save();
		
		return redirect('view_users')->with('success','User '.$request->employee_no.' Edited Succesfully');
	}
	
	//Reset password deatils
	public function reset_password(Request $request){
		$id = $request->id;
		$p = $request->p;
		
		$id = Crypt::encryptString($id); //encrypt id
		
		return redirect()->action(
		[UserController::class, 'password'],['id' => $id,'p' => $p]
		);
	}
	
	//Reset password View display
	public function password(Request $request){	
		$id = $request->id;
		$p = $request->p;
		
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}
		
		$user = DB::table('users')->where('id', $id)->first();
		
		return view('Users.reset_password', ['user' => $user,'p' => $p]);
	}
	
	//post reset password
	public function post_password_reset(Request $request){
		$id = $request->id;
		$opassword = $request->password;
		$hpassword = $request->password_confirmation;
		$p = $request->p;
		
		
			if ($opassword == $hpassword) {
			// The passwords match...
			
			$validatedData = $request->validate([
			'password' => 'required|confirmed',
			]);
			
			$password = Hash::make($request->password);
			
			$user = \App\Models\User::find($id);
			 
			$user->password = $password;

			$user->save();		
			
			}else{ 
				$id = Crypt::encryptString($id); //encrypt id
				return redirect()->action(
				[UserController::class, 'password'],['id' => $id,'p' => $p]
				)->with('danger','Wrong password! try again.');
			} 
		

		if($p != '0'){
			return redirect('profile')->with('success','Pasword Reset  Succesfull');
		}else{
			return redirect('view_users')->with('success','Pasword Reset  Succesfull');
		}		
	}	
	
	//suspend_user
	public function suspend_user(Request $request){
		$id = $request->id;
		$employee_no = $request->employee_no;
		$status = $request->status;
		
		$user = \App\Models\User::find($id);
		
		if(Auth::user()->id == $id){
			return redirect('view_users')->with('danger','You cannot suspended your own account');
		}else{
			if($status == '1'){
				$user->status = '2';

				$user->save();
			
				return redirect('view_users')->with('success','User '.$employee_no.' Suspended Succesfully');
			}else{
				$user->status = '1';
				
				$user->save();
				
				return redirect('view_users')->with('success','User '.$employee_no.' Activated Succesfully');
			}		
		}		
		
	}
	
	//Delete User
	public function delete_user(Request $request){
		$id = $request->id;
		$employee_no = $request->employee_no;
		
		if(Auth::user()->id == $id){
			return redirect('view_users')->with('danger','You cannot delete your own account');
		}else{
		
			$user = \App\Models\User::find($id);

			//$user->delete();
		
			return redirect('view_users')->with('success','User '.$employee_no.' Deleted Succesfully');
		}
	}
	
	//end controller
}
