<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use App\Models\Points;

class PointsController extends Controller
{
    //
	public function add_point(){
		return view('Points_of_entry.add_point');
	}
	
	//Add Point of Enrty
	public function create_point(Request $request){
		$point = new Points;

        $point->employee_no = $request->employee_no;
        $point->name = $request->name;
        $point->region = $request->region;
        $point->type = $request->type;

        $point->save();
		
		return redirect('view_points')->with('success','Point of Entry Added Succesfully');
	}	
	
	//View all Points
	public function view_points(){
		$points = \App\Models\Points::orderBy('id')
			->paginate(15);
		return view('Points_of_entry.view_points', ['points' => $points]);
	}
	
	//Edit arrival deatils
	public function edit_point(Request $request){
		$id = $request->id;
		
		$id = Crypt::encryptString($id); //encrypt id
		
		return redirect()->action(
		[PointsController::class, 'edit_point_details'],['id' => $id]
		);
		
	}
	
	//Edit point page
	public function edit_point_details(Request $request){		
		$id = $request->id;
		
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}		
		
		$points = \App\Models\Points::where('id',$id)
			->get();				
		
		return view('Points_of_entry.edit_point', ['points' => $points]);
	}
	
	//Enter new point details
	public function post_edit_point(Request $request){
		$id = $request->id;
		$point = \App\Models\Points::find($id);

        $point->employee_no = $request->employee_no;
        $point->name = $request->name;
        $point->region = $request->region;
        $point->type = $request->type;

        $point->save();
		
		return redirect('view_points')->with('success','Point Edited Succesfully');
	}
	
	//Delete Departure
	public function delete_point(Request $request){
		$id = $request->id;;		
		
			$point = \App\Models\Points::find($id);

			$point->delete();
		
			return redirect('view_points')->with('success','Point Deleted Succesfully');
		
	}
	
	//Genrate excel
	public function point_excel(Request $request){
	$points = \App\Models\Points::all();
		
		return view('Points_of_entry.point_excel', ['points' => $points]);	
	}
	//end controller
}
