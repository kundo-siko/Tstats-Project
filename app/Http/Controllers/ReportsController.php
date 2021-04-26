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

use App\Models\User;
use App\Models\Arrival;
use App\Models\Departure;
use App\Models\Points;
use App\Models\Park;
use App\Models\ParkVisits;
use App\Models\Museum;
use App\Models\MuseumVisits;
use App\Models\HeritageSite;
use App\Models\HeritageVisits;
use App\Models\Special_Tourist;

class ReportsController extends Controller
{
    //
	//Reports
	public function reports(){
		$departure = \App\Models\Departure::all();

		$arrival = \App\Models\Arrival::all();
		
		$user = \App\Models\User::all();
		$points = \App\Models\Points::all();
		
		return view('Reports.reports', ['departure' => $departure , 'arrival' => $arrival , 'user' => $user, 'points' => $points]);
	}
	
	//Reports on arrivals and departures
	public function by_arrivals(){
		$departure = \App\Models\Departure::all();
		$arrival = \App\Models\Arrival::all();		
		$user = \App\Models\User::all();
		$points = \App\Models\Points::all();
		$special = \App\Models\Special_Tourist::all();
		
		return view('Reports.by_arrivals', ['departure' => $departure , 'arrival' => $arrival , 'user' => $user, 'points' => $points,'special' => $special]);
	}
	
	//Reports on national parks
	public function by_parks(){
		$parks = \App\Models\Park::all();
		$park_visits = \App\Models\ParkVisit::all();		
		$user = \App\Models\User::all();
		$special = \App\Models\Special_Tourist::all();
		
		return view('Reports.by_parks', ['parks' => $parks , 'park_visits' => $park_visits , 'user' => $user,'special' => $special]);
	}
	
	//Reports on museums
	public function by_museums(){
		$museums = \App\Models\Museum::all();
		$museum_visits = \App\Models\MuseumVisits::all();		
		$user = \App\Models\User::all();
		$special = \App\Models\Special_Tourist::all();
		
		return view('Reports.by_museums', ['museums' => $museums , 'museum_visits' => $museum_visits , 'user' => $user,'special' => $special]);
	}
	
	//Reports on Heritage Sites
	public function by_heritage(){
		$sites = \App\Models\HeritageSite::all();
		$site_visits = \App\Models\HeritageVisit::all();		
		$user = \App\Models\User::all();
		$special = \App\Models\Special_Tourist::all();
		
		return view('Reports.by_heritage', ['sites' => $sites , 'site_visits' => $site_visits , 'user' => $user,'special' => $special]);
	}
	
	
	
	//generate report
	public function generate(Request $request){
		
		//echo $request->filter.'<br>'.$request->to;
		
		return redirect()->action(
		[ReportsController::class, 'generated'],['report' => $request->report , 'type' => $request->type, 'filter' => $request->filter, 'to' => $request->to]
		);
		
	}
	
	//Edit departure page
	public function generated(Request $request){		
		$report = $request->report;
		$type = $request->type;
		$filter = $request->filter;
		$to = $request->to;
		
		//try{
		//	$id = Crypt::decryptString($id); //Decrypt id
		//} catch(DecryptException $e){
			//
		//}		
		
		if( $type == 'arrival' && $to != []){
		$rp = \App\Models\Arrival::WhereBetween($report,[$filter,$to])
			->orderBy('id')
			->paginate(30);	
		}else if( $type == 'arrival' && $to == []){
		$rp = \App\Models\Arrival::where($report,$filter)
			->orderBy('id')
			->paginate(30);	
		}else if( $type == 'departure' && $to == []){
		$rp = \App\Models\Departure::where($report,$filter)
			->orderBy('id')
			->paginate(30);
		}else if( $type == 'Park Visits' && $to == []){
			$n = 'park_name';
			$u = 'by_parks';			
			$rp = \App\Models\ParkVisit::where($report,$filter)
				->orderBy('id')
				->paginate(30);				
			return view('Reports.show_visit_report', ['rp' => $rp , 'report' => $report , 'type' => $type , 'filter' => $filter , 'n' => $n , 'u' => $u, 'to' => $to ]);
		}else if( $type == 'Park Visits' && $to != []){
			$n = 'park_name';
			$u = 'by_parks';			
			$rp = \App\Models\ParkVisit::WhereBetween($report,[$filter,$to])
				->orderBy('id')
				->paginate(30);
			return view('Reports.show_visit_report', ['rp' => $rp , 'report' => $report , 'type' => $type , 'filter' => $filter , 'n' => $n , 'u' => $u, 'to' => $to ]);
		}else if( $type == 'Museum Visits' && $to == []){
			$n = 'museum';
			$u = 'by_museums';	
			$rp = \App\Models\MuseumVisits::where($report,$filter)
				->orderBy('id')
				->paginate(30);
			return view('Reports.show_visit_report', ['rp' => $rp , 'report' => $report , 'type' => $type , 'filter' => $filter , 'n' => $n , 'u' => $u, 'to' => $to ]);
		}else if( $type == 'Museum Visits' && $to != []){
			$n = 'museum';
			$u = 'by_museums';	
			$rp = \App\Models\MuseumVisits::WhereBetween($report,[$filter,$to])
				->orderBy('id')
				->paginate(30);
			return view('Reports.show_visit_report', ['rp' => $rp , 'report' => $report , 'type' => $type , 'filter' => $filter , 'n' => $n , 'u' => $u, 'to' => $to ]);
		}else if( $type == 'Heritage Site Visits' && $to == []){
			$n = 'heritage_site';
			$u = 'by_heritage';
			$rp = \App\Models\HeritageVisit::where($report,$filter)
				->orderBy('id')
				->paginate(30);
			return view('Reports.show_visit_report', ['rp' => $rp , 'report' => $report , 'type' => $type , 'filter' => $filter , 'n' => $n , 'u' => $u, 'to' => $to ]);
		}else if( $type == 'Heritage Site Visits' && $to != []){
			$n = 'heritage_site';
			$u = 'by_heritage';
			$rp = \App\Models\HeritageVisit::WhereBetween($report,[$filter,$to])
				->orderBy('id')
				->paginate(30);
			return view('Reports.show_visit_report', ['rp' => $rp , 'report' => $report , 'type' => $type , 'filter' => $filter , 'n' => $n , 'u' => $u, 'to' => $to ]);
		}		
		
		return view('Reports.show_report', ['rp' => $rp , 'report' => $report , 'type' => $type , 'filter' => $filter, 'to' => $to ]);
	}
	
	//Excel
	public function excel_report(Request $request){	
		$report = $request->report;
		$type = $request->type;
		$filter = $request->filter;
		
		return view('Reports/excel_report',['report' => $report, 'type' => $type, 'filter' => $filter ]);
	}
	
	//Excel Visits
	public function excel_visit_report(Request $request){
		$report = $request->report;
		$type = $request->type;
		$filter = $request->filter;
		$to = $request->to;		
		
			if( $type == 'Park Visits' && $to == []){
			$n = 'park_name';			
			$rp = \App\Models\ParkVisit::where($report,$filter)
				->get();	
		}else if( $type == 'Park Visits' && $to != []){
			$n = 'park_name';		
			$rp = \App\Models\ParkVisit::WhereBetween($report,[$filter,$to])
			->get();		
		}else if( $type == 'Museum Visits' && $to == []){
			$n = 'museum';
			$rp = \App\Models\MuseumVisits::where($report,$filter)
				->get();
		}else if( $type == 'Museum Visits' && $to != []){
			$n = 'museum';
			$rp = \App\Models\MuseumVisits::WhereBetween($report,[$filter,$to])
			->get();
		}else if( $type == 'Heritage Site Visits' && $to == []){
			$n = 'heritage_site';
			$rp = \App\Models\HeritageVisit::where($report,$filter)
				->get();
		}else if( $type == 'Heritage Site Visits' && $to != []){
			$n = 'heritage_site';
			$rp = \App\Models\HeritageVisit::WhereBetween($report,[$filter,$to])
			->get();
		}		
		
		
		return view('Reports/excel_visit_report',['report' => $report, 'type' => $type, 'filter' => $filter , 'n' => $n , 'rp' => $rp, 'to' => $to ]);
	}
	
	//Overview
	public function overview(){
		$arrivals = \App\Models\Arrival::all();
		$departures = \App\Models\Departure::all();
		$users = \App\Models\User::all();
		$points = \App\Models\Points::all();
		
		return view('Reports/overview',['arrivals' => $arrivals, 'departures' => $departures, 'points' => $points, 'users' => $users ]);
	}
	
	///end controller
}
