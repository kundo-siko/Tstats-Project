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

class ByUserController extends Controller
{
    //
	
	//************* Ariivals By User**********\\
	//view arrival deatils by user only
	public function view_my_arrivals(){
		$arrivals = \App\Models\Arrival::where('employee_no',Auth::user()->employee_no)
			->orderBy('id')
			->paginate(30);		
		return view('Arrivals.view_arrivals', ['arrivals' => $arrivals]);
	}
	
	//Edit My arrival deatils
	public function edit_my_arrival(Request $request){
			$id = $request->id;		
			$id = Crypt::encryptString($id); //encrypt id		
		return redirect()->action(
		[ByUserController::class, 'edit_my_arrival_details'],['id' => $id]
		);		
	}
	
	//Edit My arrival page
	public function edit_my_arrival_details(Request $request){		
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
	
	//Enter My new arrival details
	public function post_my_edit_arrival(Request $request){
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
		return redirect('view_my_arrivals')->with('success','Arrival Edited Succesfully');
	}
	//************* Ariivals By User End **********\\
	//************* Ariivals By User End **********\\
	
	//************* Departures By User **********\\
	//************* Departures By User **********\\
	//view my departure deatils by user
	public function view_my_departures(){
		$departures = \App\Models\Departure::where('employee_no',Auth::user()->employee_no)
			->orderBy('id')
			->paginate(30);		
		return view('Departures.view_departures', ['departures' => $departures]);
	}
	
	//Edit arrival deatils
	public function edit_my_departure(Request $request){
			$id = $request->id;		
			$id = Crypt::encryptString($id); //encrypt id		
		return redirect()->action(
		[ByUserController::class, 'edit_my_departure_details'],['id' => $id]
		);		
	}	
	
	//Edit my departure page
	public function edit_my_departure_details(Request $request){		
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
	
	//Enter my new departure details
	public function post_my_edit_departure(Request $request){
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
		return redirect('view_my_departures')->with('success','Departure Edited Succesfully');
	}
	//************* Departures By User End **********\\
	
	//************* Museums Visits By User End **********\\
	//	museum visit
	public function view_my_museum_visits(){	
		$museum_visits = \App\Models\MuseumVisits::where('employee_no',Auth::user()->employee_no)
			->orderBy('id')
			->paginate(15);
		return view('Museums.view_museum_visits', ['museum_visits' => $museum_visits]);
	}
	//************* Museums Visits By User End **********\\
	
	//************* Museums By User End **********\\
	//	museums
	public function view_my_museums(){	
		$museums = \App\Models\Museum::where('employee_no',Auth::user()->employee_no)
			->orderBy('id')
			->paginate(15);
		return view('Museums.view_museums', ['museums' => $museums]);
	}
	//************* Museums By User End **********\\
	
	//************* National Park Visits By User End **********\\
	//	National Parks Visits
	public function all_my_park_visits(){
		$parkvisits = \App\Models\ParkVisit::where('employee_no',Auth::user()->employee_no)
			->orderBy('id')
			->paginate(15);	
		return view('Parks.all_park_visits',['parkvisits' => $parkvisits]);
	}
	//************* National Park Visits By User End **********\\
	
	//************* National Parks By User End **********\\
	//	National Parks 
	public function all_my_parks(){
		$parks = \App\Models\Park::where('employee_no',Auth::user()->employee_no)
			->orderBy('id')
			->paginate(15);	
		return view('Parks.view_parks',['parks' => $parks]);
	}
	//************* National Parks By User End **********\\
	
	//************* Heritage Sites By User End **********\\
	//	Heritage Sites
	public function view_my_heritage(){
		$sites = \App\Models\HeritageSite::where('employee_no',Auth::user()->employee_no)
			->orderBy('id')
			->paginate(15);	
		return view('Heritage.view_heritage_sites',['sites' => $sites]);
	}
	//************* Heritage Sites By User End **********\\
	
	//************* Heritage Sites Visits By User End **********\\
	//	Heritage Sites Visits
	public function view_my_heritage_visits(){
		$heritage_visits = \App\Models\HeritageVisit::where('employee_no',Auth::user()->employee_no)
			->orderBy('id')
			->paginate(15);	
		return view('Heritage.view_heritage_visits',['heritage_visits' => $heritage_visits]);
	}
	//************* Heritage Sites Visits By User End **********\\
	
	//End
}
