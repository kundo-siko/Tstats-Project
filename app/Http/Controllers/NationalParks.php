<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use Session;
use Illuminate\Support\Facades\Storage;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\PDO;

use App\Models\Park;
use App\Models\ParkVisit;

class NationalParks extends Controller
{
    //Add a park in DB
	public function parks(){		
		return view('Parks.parks');
	}	
	
	//Enter new arrival details
	public function create_park(Request $request){
		$park = new Park;
		
		if($request->self_drivers == []){ $sd = '0'; }else{ $sd = $request->self_drivers; }
		
        $park->employee_no = $request->employee_no;
        $park->name = $request->name;
        $park->province = $request->province;
        $park->category = $request->category;
        $park->citizens = $request->citizens;
        $park->sadc = $request->sadc;
        $park->international = $request->international;
        $park->self_drivers = $sd;
		
		$park->save();
		
		return redirect('view_parks')->with('success','National Park Added Succesfully');
	}	
	
	//View Parks
	public function view_parks(){
		$parks = \App\Models\Park::orderBy('id')
			->paginate(15);		
		return view('Parks.view_parks',['parks' => $parks]);
	}
	
	//edit Park Visit
	public function edit_park(Request $request){
		$id = $request->id;
		
		$id = Crypt::encryptString($id); //encrypt id
		
		return redirect()->action(
		[NationalParks::class, 'edit_park_details'],['id' => $id]
		);
		
	}
	
	//Edit park page
	public function edit_park_details(Request $request){		
		$id = $request->id;
		
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}		
		
		$park = \App\Models\Park::where('id',$id)
			->get();
		$prov = \App\Models\Park::all();
			
		return view('Parks.edit_park', ['park' => $park,'prov' => $prov]);
	}
	
	//Enter new park details
	public function post_edit_park(Request $request){
		$id = $request->id;
		$park = \App\Models\Park::find($id);
		if($request->self_drivers == []){ $sd = '0'; }else{ $sd = $request->self_drivers; }
        $park->employee_no = $request->employee_no;
        $park->name = $request->name;
        $park->province = $request->province;
        $park->category = $request->category;
        $park->citizens = $request->citizens;
        $park->sadc = $request->sadc;
        $park->international = $request->international;
        $park->self_drivers = $sd;
		
		$park->save();
		
		return redirect('view_parks')->with('success',$request->name.' Edited Succesfully');
	}	
	
	//Delete Park
	public function delete_park(Request $request){
			$id = $request->id;;		
		
			$park = \App\Models\Park::find($id);
			$park->delete();
		
			return redirect('view_parks')->with('success','Deleted Succesfully');
		
	}
	
	//Genrate excel
	public function park_excel(Request $request){
	$parks = \App\Models\Park::all();
		
		return view('Parks.park_excel', ['parks' => $parks]);	
	}	
	
	//***************************************
	//Park Visits
	//**************************************
	//Add Park Visit
	public function add_park_visit(){
		$parks = \App\Models\Park::all();		
		return view('Parks.add_park_visit',['parks' => $parks]);
	}
	
	
	//create_park_visit
	public function create_park_visit(Request $request){
		
		$e = $request->employee_no;
		$n = $request->number;
		$na = $request->nationality;
		$pn = $request->park_name;
		$m = $request->month;
		$y = $request->year;
		$sd = $request->self_drivers;
		$id = $request->id;
		
		$parks = \App\Models\Park::where('name',$pn)
				->get();
		
		$sadc = array("Angola","Botswana","Comoros","Swaziland","Lesotho","Madagascar","Malawi","Mauritius","Mozambique","Namibia","Seychelles","South Africa","Tanzania","Zimbabwe");
	
		$pc = $parks[0]->citizens;
		$psa = $parks[0]->sadc;
		$psd = $parks[0]->self_drivers;
		$pi = $parks[0]->international;
	
	if($na == 'Zambia'){
		$ft = "Citizens (ZK)";
		$fee = $n * $pc;
	}elseif (in_array($na, $sadc)){ 
		$ft = "Residents/SADC Nationals (USD)";
		$fee = $n * $psa;
	}elseif($sd == 'Self Drivers'){ 
		$ft = "Self Drives (Residents/Non-Residents) (USD)";
		$fee = $n * $psd;  
	}else{ 
		$ft = "International (USD)";
		$fee = $n * $pi;
	}
	
	$id = Crypt::encryptString($id); //encrypt id		
		
		return redirect()->action(
		[NationalParks::class, 'enter_park_visit'],['e' => $e,'n' => $n,'na' => $na,'pn' => $pn,'ft' => $ft,'fee' => $fee,'m' => $m,'y' => $y,'id' => $id]
		);
		
	}		
	
	public function enter_park_visit(Request $request){
		$id = $request->id;
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}
		
		if($id != 'x'){
		$parkvisit = \App\Models\ParkVisit::find($id);
		$success = 'National Park Visit Edited Succesfully';
		}else{
		$parkvisit = new ParkVisit;
		$success = 'National Park Visit Added Succesfully';
		}
		
        $parkvisit->employee_no = $request->e;
        $parkvisit->number = $request->n;
        $parkvisit->nationality = $request->na;
        $parkvisit->park_name = $request->pn;
        $parkvisit->fee_type = $request->ft;
        $parkvisit->fee = $request->fee;
        $parkvisit->month = $request->m;
        $parkvisit->year = $request->y;
		
		$parkvisit->save();
		
		return redirect('all_park_visits')->with('success', $success);	
	}
	
	//all park visits
	public function all_park_visits(){
		$parkvisits = \App\Models\ParkVisit::orderBy('id')
			->paginate(15);	
		return view('Parks.all_park_visits',['parkvisits' => $parkvisits]);
	}
	
	
	//edit Park Visit
	public function edit_park_visit(Request $request){
		$id = $request->id;
		
		$id = Crypt::encryptString($id); //encrypt id
		
		return redirect()->action(
		[NationalParks::class, 'edit_park_visit_details'],['id' => $id]
		);
		
	}
	
	//Edit park page
	public function edit_park_visit_details(Request $request){		
		$id = $request->id;
		
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}		
		
		$parkvisit = \App\Models\ParkVisit::where('id',$id)
			->get();
		$parks = \App\Models\Park::all();	
		$pa = \App\Models\Park::where('name',$parkvisit[0]->park_name)
			->get();	
		return view('Parks.edit_park_visit', ['parkvisit' => $parkvisit,'arrival' => $parkvisit,'departure' => $parkvisit,'parks' => $parks,'pa' => $pa]);
	}
	
		//Delete Park
	public function delete_park_visit(Request $request){
			$id = $request->id;;		
		
			$parkvisit = \App\Models\ParkVisit::find($id);
			$parkvisit->delete();
		
			return redirect('all_park_visits')->with('success','Deleted Succesfully');
		
	}	
	
	//Genrate excel
	public function park_vists_excel(Request $request){
	$parkvisit = \App\Models\ParkVisit::all();		
		return view('Parks.park_vists_excel', ['parkvisit' => $parkvisit]);	
	}
	
	//End Controller
}
