<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Arrival;
use App\Models\Points;
use App\Models\Special_Tourist;

class ArrivalsController extends Controller
{
    //
	//view arrival deatils
	public function arrivals(){
		$arrival = \App\Models\Arrival::all();
		$points = \App\Models\Points::all();
		$special = \App\Models\Special_Tourist::all();
		
		return view('Arrivals.arrivals', ['arrival' => $arrival,'points' => $points,'special' => $special]);
	}
	
	//Enter new arrival details
	public function create_arrival(Request $request){
		$arrival = new Arrival;
		
		if($request->point_region == null){
			return redirect('arrivals')->with('success','Please fill in the fields again');
		}
			
        $arrival->employee_no = $request->employee_no;
        $arrival->number = $request->number;
        $arrival->nationality = $request->nationality;
        $arrival->continent = $request->continent;
		$arrival->point = $request->point;
        $arrival->point_region = $request->point_region;
        $arrival->point_type = $request->point_type;        
        $arrival->month = $request->month;
        $arrival->year = $request->year;

		$arrival->save();
		
		return redirect('view_arrivals')->with('success','Arrival Added Succesfully');
	}	
	
	//view arrival deatils
	public function view_arrivals(){
		$arrivals = \App\Models\Arrival::orderBy('id')
			->paginate(30);
		
		return view('Arrivals.view_arrivals', ['arrivals' => $arrivals]);
	}
	
	//Edit arrival deatils
	public function edit_arrival(Request $request){
		$id = $request->id;
		
		$id = Crypt::encryptString($id); //encrypt id
		
		return redirect()->action(
		[ArrivalsController::class, 'edit_arrival_details'],['id' => $id]
		);
		
	}
	
	//Edit arrival page
	public function edit_arrival_details(Request $request){		
		$id = $request->id;
		
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}		
		
		$arrival = \App\Models\Arrival::where('id',$id)
			->get();		
		$departure = \App\Models\Arrival::where('id',$id)
			->get();
		$points = \App\Models\Points::all();		
		
		return view('Arrivals.edit_arrival', ['arrival' => $arrival, 'departure' => $departure, 'points' => $points]);
	}
	
	//Enter new arrival details
	public function post_edit_arrival(Request $request){
		$id = $request->id;
		$arrival = \App\Models\Arrival::find($id);

        $arrival->employee_no = $request->employee_no;
        $arrival->number = $request->number;
        $arrival->nationality = $request->nationality;
        $arrival->continent = $request->continent;
		$arrival->point = $request->point;
        $arrival->point_region = $request->point_region;
        $arrival->point_type = $request->point_type;        
        $arrival->month = $request->month;
        $arrival->year = $request->year;

        $arrival->save();
		
		return redirect('view_arrivals')->with('success','Arrival Edited Succesfully');
	}
	
	//Delete Arrival
	public function delete_arrival(Request $request){
		$id = $request->id;;		
		
			$arrival = \App\Models\Arrival::find($id);

			$arrival->delete();
		
			return redirect('view_arrivals')->with('success','Arrival Deleted Succesfully');
		
	}
	
	//Genrate excel
	public function arrival_excel(Request $request){
	$arrivals = \App\Models\Arrival::all();
		
		return view('Arrivals.arrival_excel', ['arrivals' => $arrivals]);	
	}
	
	
	
	//end controller
}
