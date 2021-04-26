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

use App\Models\Museum;
use App\Models\MuseumVisits;

class MuseumsController extends Controller
{
    //
	//Add a museum in DB
	public function museums(){		
		return view('Museums.museums');
	}
	
	//Enter new museum details
	public function create_museum(Request $request){
		$museum = new Museum;
		
        $museum->employee_no = $request->employee_no;
        $museum->name = $request->name;
		 $museum->province = $request->province;
        $museum->domestic = $request->domestic;
        $museum->international = $request->international;
		
		$museum->save();
		
		return redirect('view_museums')->with('success','Museum Added Succesfully');
	}	
	
	//View Museums
	public function view_museums(){
		$museums = \App\Models\Museum::orderBy('id')
			->paginate(15);		
		return view('Museums.view_museums',['museums' => $museums]);
	}
	
	//edit Park Visit
	public function edit_museum(Request $request){
		$id = $request->id;
		
		$id = Crypt::encryptString($id); //encrypt id
		
		return redirect()->action(
		[MuseumsController::class, 'edit_museum_details'],['id' => $id]
		);		
	}
	
	//Edit museum view
	public function edit_museum_details(Request $request){		
		$id = $request->id;
		
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}		
		
		$museum = \App\Models\Museum::where('id',$id)
			->get();
		$prov = \App\Models\Museum::all();
			
		return view('Museums.edit_museum', ['museum' => $museum,'prov' => $prov]);
	}
	
	//
	public function post_edit_museum(Request $request){
		$id = $request->id;
		$museum = \App\Models\Museum::find($id);
		
        $museum->employee_no = $request->employee_no;
        $museum->name = $request->name;
        $museum->province = $request->province;
        $museum->domestic = $request->domestic;
        $museum->international = $request->international;
		
		$museum->save();
		
		return redirect('view_museums')->with('success','Museum Edited Succesfully');
	}
	
	//Delete Museum
	public function delete_museum(Request $request){
			$id = $request->id;;		
		
			$museum = \App\Models\Museum::find($id);
			$museum->delete();
		
			return redirect('view_museums')->with('success','Deleted Succesfully');		
	}	
	
	//Genrate excel
	public function museum_excel(){
	$museums = \App\Models\Museum::all();
	
		return view('Museums.museum_excel', ['museums' => $museums]);	
	}	
	
	//***************************************
	//Museum Visits
	//**************************************
	
	//	museum visit
	public function museum_visit(){	
		$museums = \App\Models\Museum::all();
		return view('Museums.museum_visit', ['museums' => $museums]);
	}
	
	//Enter new museum details
	public function add_museum_visit(Request $request){			
        $e = $request->employee_no;
        $n = $request->number;
        $a = $request->age;
        $nat = $request->nationality;
        $m= $request->museum;
        $mo = $request->month;
        $y = $request->year;
        $id = $request->id;
		
		$museums = \App\Models\Museum::where('name',$m)
					->get();
					
		if($a == "Below"){
			$prc = 	$museums[0]->domestic/2;
			$pri = 	$museums[0]->international/2;
		}elseif($a == "Above"){
			$prc = 	$museums[0]->domestic;
			$pri = 	$museums[0]->international;
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
		[MuseumsController::class, 'post_museum_visit'],['id' => $id, 'e' => $e, 'n' => $n, 'a' => $a, 'nat' => $nat, 'm' => $m,
		'fee' => $fee, 'ft' => $ft, 'mo' => $mo, 'y' => $y, ]
		);		
	}	
	
	//Enter new museum details
	public function post_museum_visit(Request $request){
		try{
			$id = Crypt::decryptString($request->id); //Decrypt id
			$e = Crypt::decryptString($request->e); //Decrypt e
		} catch(DecryptException $e){
			//
		}
		if($id == 'x'){
			$museum_visit = new MuseumVisits;
			$success = 'Museum Visit Added Succesfully';
		}else{
			$museum_visit = \App\Models\MuseumVisits::find($id);
			$success = 'Museum Visit Edited Succesfully';		
		}
		
		$museum_visit->employee_no = $e;
        $museum_visit->number = $request->n;
        $museum_visit->age = $request->a;
        $museum_visit->nationality = $request->nat;
        $museum_visit->museum = $request->m;
        $museum_visit->fee_type = $request->ft;
        $museum_visit->fee = $request->fee;
        $museum_visit->month = $request->mo;
        $museum_visit->year = $request->y;
		
		$museum_visit->save();
		
		return redirect('view_museum_visits')->with('success',$success);
	}

	//	museum visit
	public function view_museum_visits(){	
		$museum_visits = \App\Models\MuseumVisits::orderBy('id')
			->paginate(15);
		return view('Museums.view_museum_visits', ['museum_visits' => $museum_visits]);
	}
	
	//edit Museum Visit
	public function edit_museum_visit_details(Request $request){
		$id = $request->id;
		
		$id = Crypt::encryptString($id); //encrypt id
		
		return redirect()->action(
		[MuseumsController::class, 'edit_museum_visit'],['id' => $id]
		);		
	}
	
	//Edit museum view
	public function edit_museum_visit(Request $request){		
		$id = $request->id;
		
		try{
			$id = Crypt::decryptString($id); //Decrypt id
		} catch(DecryptException $e){
			//
		}		
		
		$museum_visit = \App\Models\MuseumVisits::where('id',$id)
			->get();
		$museums = \App\Models\Museum::all();
			
		return view('Museums.edit_museum_visit', ['museum_visit' => $museum_visit, 'arrival' => $museum_visit,'departure' => $museum_visit, 'museums' => $museums]);
	}
	
	//Delete Museum Visit
	public function delete_museum_visit(Request $request){
			$id = $request->id;;		
		
			$museum_visit = \App\Models\MuseumVisits::find($id);
			$museum_visit->delete();
		
			return redirect('view_museum_visits')->with('success','Deleted Succesfully');		
	}
	
	//Genrate excel
	public function museum_visit_excel(){
	$museum_visit = \App\Models\MuseumVisits::all();
	
		return view('Museums.museum_visit_excel', ['museum_visit' => $museum_visit]);	
	}	
	
	//End Controller
}
