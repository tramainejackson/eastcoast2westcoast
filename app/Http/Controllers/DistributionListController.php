<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\DistributionList;
use App\Models\TripLocations;
use App\Mail\SignUpConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class DistributionListController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
    	$contacts = Contact::all();

	    return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
       $this->validate($request, [
			'first_name'    => 'required|max:50',
			'last_name'     => 'required|max:50',
			'email'         => 'required|max:100',
			'phone'         => 'nullable|max:15|min:10'
		]);

		if(isset($request->trip_id)) {
			$tripLocation = TripLocations::find($request->trip_id);

			if($tripLocation->participants()->create([
				'first_name'    => $request->first_name,
				'last_name'     => $request->last_name,
				'email_address' => $request->email
			])) {
				\Mail::to($request->email)->cc(['jacksond1961@yahoo.com', 'rhonda.lambert@sbcglobal.com'])->send(new SignUpConfirmation($tripLocation, $request->first_name, $request->last_name, $request->email));
//				\Mail::to($request->email)->send(new SignUpConfirmation($tripLocation, $request->first_name, $request->last_name, $request->email));

				return redirect()->action('TripLocationsController@show', $tripLocation)->with('status', 'Thanks for signing up for the trip to ' . $tripLocation->trip_location);
			}
		} else {
			$contact = new DistributionList();

			$contact->first_name    = $request->first_name;
			$contact->last_name     = $request->last_name;
			$contact->email         = $request->email;
			$contact->phone         = $request->phone;

			if($contact->save()) {
				return redirect()->action('DistributionListController@index')->with('status', 'New Contact Added Successfully');
			}
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distribution_List  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(DistributionList $participant) {
        $contact = $participant;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distribution_List  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(DistributionList $participant) {
	    $contact = $participant;
	    $trips = $contact->allTrips($contact->id);
	    $missing_trips = collect();

	    // Find all of the trips the user is not apart of
	    // and add them into a collection instance
	    foreach(TripLocations::all() as $trip) {
		    if($trip->participants()->where('parent_acct_id', $contact->id)->get()->isEmpty()) {
			    $missing_trips->push($trip);
		    }
	    }

	    return view('admin.contacts.edit', compact('contact', 'trips', 'missing_trips'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distribution_List  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DistributionList $participant)
    {
        $participant->first_name = $request->first_name;
        $participant->last_name = $request->last_name;
        $participant->email = $request->email;
        $participant->phone = $request->phone;

	    if($participant->save()) {
		    return redirect()->back()->with('status', 'Contact Updated Successfully');
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distribution_List  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(DistributionList $participant)
    {
        //
    }
}
