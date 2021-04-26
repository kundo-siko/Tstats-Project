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

use App\Models\HeritageSite;
use App\Models\HeritageVisit;

class HeritageController extends Controller
{
    //
	//Add a museum in DB
	public function heritage(){		
		return view('Heritage.heritage');
	}
	
	//Enter new museum details
	public function create_heritage(Request $request){
		$heritage = new HeritageSite;
		
        $heritage->employee_no = $request->employee_no;
        $heritage->name = $request->name;
        $heritage->province = $request->province;
        $heritage->domestic = $request->domestic;
        $heritage->international = $request->international;
		
		$heritage->save();
		
		return redirect('view_heritage')->with('success','Heritage Site Added Succesfully');
	}
	
	//View Museums
	public function view_heritage(){
		$sites = \App\Models\HeritageSite::orderBy('id')
			->paginate(15);		
		return view('Heritage.view_heritage_sites',['sites' => $sites]);
	}
	
	//edit Heritage
	public function edit_heritage(Request $request){
		$id = $request->id;
		
		$id = Crypt::encryptString($id); //encrypt id
		
		return redirect()->action(
		[HeritageController::class, 'edit_heritage_details'],['id' => $id]
		);		
	}
	
	//Edit HeritageSite view
	public function edit_heritage_details(Request $request){		
		$id = $request->id;
		
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}		
		
		$site = \App\Models\HeritageSite::where('id',$id)
			->get();
		$prov = \App\Models\HeritageSite::all();
			
		return view('Heritage.edit_heritage', ['site' => $site,'prov' => $prov]);
	}
	
	//Enter new heritage details
	public function post_edit_heritage(Request $request){
		$id = $request->id;
		$heritage = \App\Models\HeritageSite::find($id);
		
        $heritage->employee_no = $request->employee_no;
        $heritage->name = $request->name;
        $heritage->province = $request->province;
        $heritage->domestic = $request->domestic;
        $heritage->international = $request->international;
		
		$heritage->save();		
		return redirect('view_heritage')->with('success','Heritage Site Edited Succesfully');
	}
	
	//Delete Museum
	public function delete_heritage(Request $request){
			$id = $request->id;;		
		
			$heritage = \App\Models\HeritageSite::find($id);
			$heritage->delete();		
			return redirect('view_heritage')->with('success','Deleted Succesfully');		
	}
	
	//Genrate excel
	public function heritage_excel(){
		$heritage = \App\Models\HeritageSite::all();	
		return view('Heritage.heritage_excel', ['heritage' => $heritage]);	
	}
	
	//***************************************
	//Heritage Site Visits
	//**************************************
	//Add a heritage site visit in DB
	public function heritage_visit(){
			$heritage = \App\Models\HeritageSite::all();
		return view('Heritage.heritage_visit', ['heritage' => $heritage]);
	}
	
	
	//Enter new museum details
	public function add_heritage_visit(Request $request){			
        $e = $request->employee_no;
        $n = $request->number;
        $a = $request->age;
        $nat = $request->nationality;
        $m= $request->museum;
        $mo = $request->month;
        $y = $request->year;
        $id = $request->id;
		
		$sites = \App\Models\HeritageSite::where('name',$m)
					->get();
					
		if($a == "Below"){
			$prc = 	$sites[0]->domestic/2;
			$pri = 	$sites[0]->international/2;
		}elseif($a == "Above"){
			$prc = 	$sites[0]->domestic;
			$pri = 	$sites[0]->international;
		}
		
		if($nat == 'Zambia'){
			$ft = 'Domestic (ZK)';
			$fee = $n * $prc;
		}else{
			$ft = 'International (USD)';
			$fee = $n * $pri;
		}
		
		$id = Crypt::encryptString($id); //encrypt id
		$e = Crypt::encryptString($e); //encrypt id
		
		return redirect()->action(
		[HeritageController::class, 'post_heritage_visit'],['id' => $id, 'e' => $e, 'n' => $n, 'a' => $a, 'nat' => $nat, 'm' => $m,
		'fee' => $fee, 'ft' => $ft, 'mo' => $mo, 'y' => $y, ]
		);		
	}	
	
	//Enter new museum details
	public function post_heritage_visit(Request $request){
		try{
			$id = Crypt::decryptString($request->id); //Decrypt id
			$e = Crypt::decryptString($request->e); //Decrypt e
		} catch(DecryptException $e){
			//
		}
		if($id == 'x'){
			$heritage_visit = new HeritageVisit;
			$success = 'Museum Visit Added Succesfully';
		}else{
			$heritage_visit = \App\Models\HeritageVisit::find($id);
			$success = 'Museum Visit Edited Succesfully';		
		}
		
		$heritage_visit->employee_no = $e;
        $heritage_visit->number = $request->n;
        $heritage_visit->age = $request->a;
        $heritage_visit->nationality = $request->nat;
        $heritage_visit->heritage_site = $request->m;
        $heritage_visit->fee_type = $request->ft;
        $heritage_visit->fee = $request->fee;
        $heritage_visit->month = $request->mo;
        $heritage_visit->year = $request->y;
		
		$heritage_visit->save();		
		return redirect('view_heritage_visits')->with('success',$success);
	}
	
	//	heritage visit
	public function view_heritage_visits(){	
		$heritage_visits = \App\Models\HeritageVisit::orderBy('id')
			->paginate(15);
		return view('Heritage.view_heritage_visits', ['heritage_visits' => $heritage_visits]);
	}
	
	//edit heritage Visit
	public function edit_heritage_visit(Request $request){
		$id = $request->id;
		
		$id = Crypt::encryptString($id); //encrypt id
		
		return redirect()->action(
		[HeritageController::class, 'post_edit_heritage_visit'],['id' => $id]
		);		
	}
	//Edit heritage view
	public function post_edit_heritage_visit(Request $request){		
		$id = $request->id;
		
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}		
		
		$heritage_visit = \App\Models\HeritageVisit::where('id',$id)
			->get();
		$heritage = \App\Models\HeritageSite::all();
			
		return view('Heritage.edit_heritage_visit', ['heritage_visit' => $heritage_visit, 'arrival' => $heritage_visit,'departure' => $heritage_visit, 'heritage' => $heritage]);
	}	
	
	//Delete Museum Visit
	public function delete_heritage_visit(Request $request){
			$id = $request->id;;		
		
			$heritage_visit = \App\Models\HeritageVisit::find($id);
			$heritage_visit->delete();		
			return redirect('view_heritage_visits')->with('success','Deleted Succesfully');		
	}
	
	//Genrate excel
	public function heritage_visit_excel(){
			$heritage_visit = \App\Models\HeritageVisit::all();	
		return view('Heritage.heritage_visit_excel', ['heritage_visit' => $heritage_visit]);	
	}
	
	
    //End Controller
}
