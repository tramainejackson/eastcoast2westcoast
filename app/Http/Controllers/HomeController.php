<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TripLocations;
use App\TripPicture;
use App\TripActivities;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//		$trips = TripLocations::all();
//		$activeTrips = TripLocations::active();
//	    $tripsPics = TripPicture::all();
//	    $getInactiveTrips = TripLocations::inactive(7);
//	    $inactiveTrips = collect();
//
//	    foreach($getInactiveTrips as $trip) {
//	    	if($trip->description != null) {
//			    $inactiveTrips->push($trip);
//		    }
//	    }
//
//	    return view('welcome', compact('trips', 'inactiveTrips', 'tripsPics', 'activeTrips'));

	    return redirect()->action('TripLocationsController@web_index');
    }
	
	 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function past() {
		$trips = TripLocations::all();
		$activeTrips = TripLocations::active();
		$inactiveTrips = TripLocations::inactive();
		$tripsPics = TripPicture::all();
		
		return view('past', compact('trips', 'inactiveTrips', 'tripsPics', 'activeTrips'));
    }
}
