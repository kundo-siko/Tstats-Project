<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Departure;
use App\Models\Special_Tourist;

class DeparturesController extends Controller
{
    //
	//view departure deatils
	public function departures(){
		$departure = \App\Models\Departure::all();
		$points = \App\Models\Points::all();
		$special = \App\Models\Special_Tourist::all();
		return view('Departures.departures', ['departure' => $departure,'points' => $points,'special' => $special]);
	}
	
	//Enter new departure details
	public function create_departure(Request $request){
		$departure = new Departure;
		
		if($request->point_region == null){
			return redirect('departures')->with('success','Please fill in the fields again');
		}
		
        $departure->employee_no = $request->employee_no;
        $departure->number = $request->number;
        $departure->nationality = $request->nationality;
        $departure->continent = $request->continent;
        $departure->point = $request->point;
        $departure->point_region = $request->point_region;
        $departure->point_type = $request->point_type;
        $departure->month = $request->month;
        $departure->year = $request->year;

        $departure->save();
		
		return redirect('view_departures')->with('success','Departure Added Succesfully');
	}	
	
	//view departure deatils
	public function view_departures(){
		$departures = \App\Models\Departure::orderBy('id')
			->paginate(30);
		
		return view('Departures.view_departures', ['departures' => $departures]);
	}
	
	//Edit arrival deatils
	public function edit_departure(Request $request){
		$id = $request->id;
		
		$id = Crypt::encryptString($id); //encrypt id
		
		return redirect()->action(
		[DeparturesController::class, 'edit_departure_details'],['id' => $id]
		);
		
	}
	
	//Edit departure page
	public function edit_departure_details(Request $request){		
		$id = $request->id;
		
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}		
		
		$departure = \App\Models\Departure::where('id',$id)
			->get();
			$arrival = \App\Models\Departure::where('id',$id)
			->get();
			$points = \App\Models\Points::all();			
		
		return view('Departures.edit_departure', ['departure' => $departure, 'arrival' => $arrival, 'points' => $points ]);
	}
	
	//Enter new departure details
	public function post_edit_departure(Request $request){
		$id = $request->id;
		$departure = \App\Models\Departure::find($id);

         $departure->employee_no = $request->employee_no;
        $departure->number = $request->number;
        $departure->nationality = $request->nationality;
        $departure->continent = $request->continent;
        $departure->point = $request->point;
        $departure->point_region = $request->point_region;
        $departure->point_type = $request->point_type;
        $departure->month = $request->month;
        $departure->year = $request->year;


        $departure->save();
		
		return redirect('view_departures')->with('success','Departure Edited Succesfully');
	}
	
	//Delete Departure
	public function delete_departure(Request $request){
		$id = $request->id;;		
		
			$departure = \App\Models\Departure::find($id);

			$departure->delete();
		
			return redirect('view_departures')->with('success','Departure Deleted Succesfully');
		
	}
	
	//Genrate excel
	public function departure_excel(Request $request){
	$departures = \App\Models\Departure::all();
		
		return view('Departures.departure_excel', ['departures' => $departures]);	
	}
	
	
	
	//end controller
	
	//Controller end
}
