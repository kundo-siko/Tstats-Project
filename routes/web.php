<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ArrivalsController;
use App\Http\Controllers\DeparturesController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\NationalParks;
use App\Http\Controllers\MuseumsController;
use App\Http\Controllers\HeritageController;
use App\Http\Controllers\SpecialTouristController;
use App\Http\Controllers\ByUserController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('home', function () {
    return view('home');
})->middleware('auth');

Route::get('signin', function () {
    return view('Auth.signin');
});

//Auth
Route::post('authenticate', [AuthController::class, 'authenticate']);
Route::get('signout', [AuthController::class, 'signout']);

Route::get('support', function () {
    return view('support');
})->middleware('auth');


Route::get('create_user', function () {
    return view('Users.create_user');
});

Route::get('trail', function () {
    return view('Arrivals.trail');
});

Route::get('a', function () {
    return view('Points_of_entry.a');
});

Route::get('p', function () {
    return view('Points_of_entry.p');
});


Route::get('fee', function () {
    return view('Parks.fee');
});

Route::get('museum_fee', function () {
    return view('Museums.museum_fee');
});

Route::get('site_fee', function () {
    return view('Heritage.site_fee');
});



//
// User Routes
//
Route::post('create_new_user', [UserController::class, 'create_new_user'])->middleware('auth');

//Edit user
Route::post('edit_user', [UserController::class, 'edit_user'])->middleware('auth');
Route::get('edit_user_details', [UserController::class, 'edit_user_details'])->middleware('auth');
Route::post('post_edit_user', [UserController::class, 'post_edit_user'])->middleware('auth');

Route::post('suspend_user', [UserController::class, 'suspend_user'])->middleware('auth');
Route::post('delete_user', [UserController::class, 'delete_user'])->middleware('auth');

//Reset Password Routes
Route::post('reset_password', [UserController::class, 'reset_password'])->middleware('auth');
Route::post('post_password_reset', [UserController::class, 'post_password_reset'])->middleware('auth');
Route::get('password', [UserController::class, 'password'])->middleware('auth');

Route::get('view_users', [UserController::class, 'view_users'])->middleware('auth');


Route::get('password', [UserController::class, 'password'])->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth');

//
// User Routes  End
//

//
// Arrival Routes
//
Route::post('create_arrival', [ArrivalsController::class, 'create_arrival'])->middleware('auth');

Route::post('edit_arrival', [ArrivalsController::class, 'edit_arrival'])->middleware('auth');
Route::get('edit_arrival_details', [ArrivalsController::class, 'edit_arrival_details'])->middleware('auth');
Route::post('post_edit_arrival', [ArrivalsController::class, 'post_edit_arrival'])->middleware('auth');

Route::get('arrivals', [ArrivalsController::class, 'arrivals'])->middleware('auth');

Route::get('view_arrivals', [ArrivalsController::class, 'view_arrivals'])->middleware('auth');

Route::post('delete_arrival', [ArrivalsController::class, 'delete_arrival'])->middleware('auth');

Route::get('arrival_excel', [ArrivalsController::class, 'arrival_excel'])->middleware('auth');

//
// Arrival Routes End
//

//
// ByUserController Routes 
//

Route::get('view_my_arrivals', [ByUserController::class, 'view_my_arrivals'])->middleware('auth');
Route::post('edit_my_arrival', [ByUserController::class, 'edit_my_arrival'])->middleware('auth');
Route::get('edit_my_arrival_details', [ByUserController::class, 'edit_my_arrival_details'])->middleware('auth');
Route::post('post_my_edit_arrival', [ByUserController::class, 'post_my_edit_arrival'])->middleware('auth');


Route::get('view_my_departures', [ByUserController::class, 'view_my_departures'])->middleware('auth');
Route::post('edit_my_departure', [ByUserController::class, 'edit_my_departure'])->middleware('auth');
Route::get('edit_my_departure_details', [ByUserController::class, 'edit_my_departure_details'])->middleware('auth');
Route::post('post_my_edit_departure', [ByUserController::class, 'post_my_edit_departure'])->middleware('auth');

Route::get('view_my_museums', [ByUserController::class, 'view_my_museums'])->middleware('auth');
Route::get('view_my_museum_visits', [ByUserController::class, 'view_my_museum_visits'])->middleware('auth');
Route::get('all_my_park_visits', [ByUserController::class, 'all_my_park_visits'])->middleware('auth');
Route::get('all_my_parks', [ByUserController::class, 'all_my_parks'])->middleware('auth');
Route::get('view_my_heritage', [ByUserController::class, 'view_my_heritage'])->middleware('auth');
Route::get('view_my_heritage_visits', [ByUserController::class, 'view_my_heritage_visits'])->middleware('auth');
//
// ByUserController Routes End
//

//
// SpecialTourist Routes End
//
Route::get('add_special', [SpecialTouristController::class, 'add_special'])->middleware('auth');
Route::post('create_special', [SpecialTouristController::class, 'create_special'])->middleware('auth');
Route::get('view_special', [SpecialTouristController::class, 'view_special'])->middleware('auth');
Route::post('edit_special', [SpecialTouristController::class, 'edit_special'])->middleware('auth');
Route::get('edit_special_details', [SpecialTouristController::class, 'edit_special_details'])->middleware('auth');
Route::post('post_edit_special', [SpecialTouristController::class, 'post_edit_special'])->middleware('auth');
Route::post('delete_special', [SpecialTouristController::class, 'delete_special'])->middleware('auth');
Route::get('special_excel', [SpecialTouristController::class, 'special_excel'])->middleware('auth');
//
// SpecialTourist Routes End
//

//
// Departures Routes
//
Route::get('departures', [DeparturesController::class, 'departures'])->middleware('auth');

Route::post('create_departure', [DeparturesController::class, 'create_departure'])->middleware('auth');

Route::get('view_departures', [DeparturesController::class, 'view_departures'])->middleware('auth');
Route::post('edit_departure', [DeparturesController::class, 'edit_departure'])->middleware('auth');
Route::get('edit_departure_details', [DeparturesController::class, 'edit_departure_details'])->middleware('auth');
Route::post('post_edit_departure', [DeparturesController::class, 'post_edit_departure'])->middleware('auth');

Route::post('delete_departure', [DeparturesController::class, 'delete_departure'])->middleware('auth');

Route::get('departure_excel', [DeparturesController::class, 'departure_excel'])->middleware('auth');
//
// Departures Routes End
//

///
//Reports Generation
//
Route::get('reports', [ReportsController::class, 'reports'])->middleware('auth');

Route::post('generate', [ReportsController::class, 'generate'])->middleware('auth');

Route::get('generated', [ReportsController::class, 'generated'])->middleware('auth');

Route::post('excel_report', [ReportsController::class, 'excel_report'])->middleware('auth');

Route::get('overview', [ReportsController::class, 'overview'])->middleware('auth');

Route::get('by_arrivals', [ReportsController::class, 'by_arrivals'])->middleware('auth');
Route::get('by_parks', [ReportsController::class, 'by_parks'])->middleware('auth');
Route::get('by_museums', [ReportsController::class, 'by_museums'])->middleware('auth');
Route::get('by_heritage', [ReportsController::class, 'by_heritage'])->middleware('auth');
Route::post('excel_visit_report', [ReportsController::class, 'excel_visit_report'])->middleware('auth');
//

//
//Points of Entry
//
Route::get('add_point', [PointsController::class, 'add_point'])->middleware('auth');

Route::post('create_point', [PointsController::class, 'create_point'])->middleware('auth');

Route::get('view_points', [PointsController::class, 'view_points'])->middleware('auth');

Route::post('edit_point', [PointsController::class, 'edit_point'])->middleware('auth');

Route::get('edit_point_details', [PointsController::class, 'edit_point_details'])->middleware('auth');

Route::post('post_edit_point', [PointsController::class, 'post_edit_point'])->middleware('auth');

Route::post('delete_point', [PointsController::class, 'delete_point'])->middleware('auth');

Route::get('point_excel', [PointsController::class, 'point_excel'])->middleware('auth');
//

//
//National Park Visits
//
Route::get('parks', [NationalParks::class, 'parks'])->middleware('auth');
Route::post('create_park', [NationalParks::class, 'create_park'])->middleware('auth');
Route::post('edit_park', [NationalParks::class, 'edit_park'])->middleware('auth');
Route::get('edit_park_details', [NationalParks::class, 'edit_park_details'])->middleware('auth');
Route::post('post_edit_park', [NationalParks::class, 'post_edit_park'])->middleware('auth');
Route::post('delete_park', [NationalParks::class, 'delete_park'])->middleware('auth');
Route::get('park_excel', [NationalParks::class, 'park_excel'])->middleware('auth');
Route::get('view_parks', [NationalParks::class, 'view_parks'])->middleware('auth');
//Visits
Route::get('add_park_visit', [NationalParks::class, 'add_park_visit'])->middleware('auth');
Route::get('enter_park_visit', [NationalParks::class, 'enter_park_visit'])->middleware('auth');
Route::post('create_park_visit', [NationalParks::class, 'create_park_visit'])->middleware('auth');
Route::get('all_park_visits', [NationalParks::class, 'all_park_visits'])->middleware('auth');
Route::post('edit_park_visit', [NationalParks::class, 'edit_park_visit'])->middleware('auth');
Route::get('edit_park_visit_details', [NationalParks::class, 'edit_park_visit_details'])->middleware('auth');
Route::post('delete_park_visit', [NationalParks::class, 'delete_park_visit'])->middleware('auth');
Route::get('park_vists_excel', [NationalParks::class, 'park_vists_excel'])->middleware('auth');
//

///
//Museums
//
Route::get('museums', [MuseumsController::class, 'museums'])->middleware('auth');
Route::post('create_museum', [MuseumsController::class, 'create_museum'])->middleware('auth');
Route::get('view_museums', [MuseumsController::class, 'view_museums'])->middleware('auth');
Route::post('edit_museum', [MuseumsController::class, 'edit_museum'])->middleware('auth');
Route::get('edit_museum_details', [MuseumsController::class, 'edit_museum_details'])->middleware('auth');
Route::post('post_edit_museum', [MuseumsController::class, 'post_edit_museum'])->middleware('auth');
Route::post('delete_museum', [MuseumsController::class, 'delete_museum'])->middleware('auth');
Route::get('museum_excel', [MuseumsController::class, 'museum_excel'])->middleware('auth');
//
Route::get('museum_visit', [MuseumsController::class, 'museum_visit'])->middleware('auth');
Route::post('add_museum_visit', [MuseumsController::class, 'add_museum_visit'])->middleware('auth');
Route::get('post_museum_visit', [MuseumsController::class, 'post_museum_visit'])->middleware('auth');
Route::get('view_museum_visits', [MuseumsController::class, 'view_museum_visits'])->middleware('auth');
Route::post('edit_museum_visit_details', [MuseumsController::class, 'edit_museum_visit_details'])->middleware('auth');
Route::get('edit_museum_visit', [MuseumsController::class, 'edit_museum_visit'])->middleware('auth');
Route::post('delete_museum_visit', [MuseumsController::class, 'delete_museum_visit'])->middleware('auth');
Route::get('museum_visit_excel', [MuseumsController::class, 'museum_visit_excel'])->middleware('auth');
//

///
//Heritage Sites
//
Route::get('heritage', [HeritageController::class, 'heritage'])->middleware('auth');
Route::post('create_heritage', [HeritageController::class, 'create_heritage'])->middleware('auth');
Route::get('view_heritage', [HeritageController::class, 'view_heritage'])->middleware('auth');
Route::post('edit_heritage', [HeritageController::class, 'edit_heritage'])->middleware('auth');
Route::get('edit_heritage_details', [HeritageController::class, 'edit_heritage_details'])->middleware('auth');
Route::post('post_edit_heritage', [HeritageController::class, 'post_edit_heritage'])->middleware('auth');
Route::post('delete_heritage', [HeritageController::class, 'delete_heritage'])->middleware('auth');
Route::get('heritage_excel', [HeritageController::class, 'heritage_excel'])->middleware('auth');
//
Route::get('heritage_visit', [HeritageController::class, 'heritage_visit'])->middleware('auth');
Route::post('add_heritage_visit', [HeritageController::class, 'add_heritage_visit'])->middleware('auth');
Route::get('view_heritage_visits', [HeritageController::class, 'view_heritage_visits'])->middleware('auth');
Route::get('post_heritage_visit', [HeritageController::class, 'post_heritage_visit'])->middleware('auth');
Route::post('edit_heritage_visit', [HeritageController::class, 'edit_heritage_visit'])->middleware('auth');
Route::get('post_edit_heritage_visit', [HeritageController::class, 'post_edit_heritage_visit'])->middleware('auth');
Route::post('delete_heritage_visit', [HeritageController::class, 'delete_heritage_visit'])->middleware('auth');
Route::get('heritage_visit_excel', [HeritageController::class, 'heritage_visit_excel'])->middleware('auth');


//
