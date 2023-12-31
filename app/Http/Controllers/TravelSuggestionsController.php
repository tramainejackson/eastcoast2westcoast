<?php

namespace App\Http\Controllers;

use App\TravelSuggestions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;

class TravelSuggestionsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $getSuggestionInfo = TravelSuggestions::all();
	    $getLocations = TravelSuggestions::distinct()->select('option_suggestion')->get()->pluck('option_suggestion');
	    $getTotalRows = TravelSuggestions::all()->count();
	    $date = new Carbon();

	    // Return the admin view if Auth is true
	    if(Auth::check()) {
		    return view('admin.suggestions', compact('date', 'getLocations', 'getTotalRows', 'getSuggestionInfo'));
	    } else {
		    return view('suggestions', compact('date', 'getLocations', 'getTotalRows'));
	    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('modals.suggestions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suggestion = new TravelSuggestions();
		
		if(isset($request->other_location)) {
			$suggestion->option_suggestion = $request->other_location;
		} else {
			$suggestion->option_suggestion = $request->next_location;
		}
		
		if($suggestion->save()) {
			return redirect()->back()->with('status', 'Suggestion received. Thanks for helping us figure out where to go next.');
		} else {
			return redirect()->back()->with('status', 'Suggestion not received. Please try sending your question again.');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Travel_Suggestions  $travel_Suggestions
     * @return \Illuminate\Http\Response
     */
    public function show(TravelSuggestions $travelSuggestions)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Travel_Suggestions  $travel_Suggestions
     * @return \Illuminate\Http\Response
     */
    public function edit(Travel_Suggestions $travel_Suggestions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Travel_Suggestions  $travel_Suggestions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Travel_Suggestions $travel_Suggestions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Travel_Suggestions  $travel_Suggestions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Travel_Suggestions $travel_Suggestions)
    {
        //
    }

}
