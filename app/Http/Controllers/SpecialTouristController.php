<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use App\Models\Special_Tourist;

class SpecialTouristController extends Controller
{
    //
	
	//Add Special Tourist Type
	public function add_special(){
		
		return view('Special_Tourist.add_special');
	}
	
	//Enter Special Tourist Type
	public function create_special(Request $request){
		$special = new Special_Tourist;

        $special->employee_no = $request->employee_no;
        $special->name = $request->name;

		$special->save();
		
		return redirect('view_special')->with('success','Special Tourist Type Added Succesfully');
	}	
	
	//view Special Tourist Type deatils
	public function view_special(){
		$special = \App\Models\Special_Tourist::orderBy('id')
			->paginate(30);
		
		return view('Special_Tourist.view_special', ['special' => $special]);
	}
	
	//Edit Special Tourist Type deatils
	public function edit_special(Request $request){
		$id = $request->id;
		
		$id = Crypt::encryptString($id); //encrypt id
		
		return redirect()->action(
		[SpecialTouristController::class, 'edit_special_details'],['id' => $id]
		);
		
	}
	
	//Edit arrival page
	public function edit_special_details(Request $request){		
		$id = $request->id;
		
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}		
		
		$special = \App\Models\Special_Tourist::where('id',$id)
			->get();		
		
		return view('Special_Tourist.edit_special', ['special' => $special]);
	}
	
	//Enter new arrival details
	public function post_edit_special(Request $request){
		$id = $request->id;
		$special = \App\Models\Special_Tourist::find($id);

        $special->employee_no = $request->employee_no;
        $special->name = $request->name;

		$special->save();
		
		return redirect('view_special')->with('success','Special Tourist Type Edited Succesfully');
	}
	
	//Delete Departure
	public function delete_special(Request $request){
		$id = $request->id;	
		
		$special = \App\Models\Special_Tourist::find($id);

		$special->delete();
	
		return redirect('view_special')->with('success','Special Tourist Type Deleted Succesfully');
		
	}
	
	//Genrate excel
	public function special_excel(Request $request){
	$special = \App\Models\Special_Tourist::all();
		
		return view('Special_Tourist.special_excel', ['special' => $special]);	
	}
	
	//End
}
