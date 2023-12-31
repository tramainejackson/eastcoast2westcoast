<?php

namespace App\Http\Controllers;

use App\TravelQuestions;
use App\Mail\Question;
use Illuminate\Http\Request;

class TravelQuestionsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['store', 'create']);
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
	    $getQuestionInfo = TravelQuestions::all();

        return view('admin.questions', compact('getQuestionInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('modals.questions');
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
		    'email_address' => 'required|email|max:100',
		    'question_text' => 'required',
	    ]);

        $question = new TravelQuestions();
		
		$question->first_name = $request->first_name;
		$question->last_name = $request->last_name;
		$question->user_email = $request->email_address;
		$question->user_question = $request->question_text;
		
		if($question->save()) {
			//Send mail to somebody
			\Mail::to('jackson521961@gmail.com')->send(new Question($question));

			return redirect()->back()->with('status', 'Question received. We will get back to you as soon as possible.');
		} else {
			return redirect()->back()->with('status', 'Question not received. Please try sending again.');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Travel_Questions  $travel_Questions
     * @return \Illuminate\Http\Response
     */
    public function show(TravelQuestions $travelQuestions) {
    	//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Travel_Questions  $travel_Questions
     * @return \Illuminate\Http\Response
     */
    public function edit(TravelQuestions $travel_Questions) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Travel_Questions  $travel_Questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TravelQuestions $travel_Questions) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Travel_Questions  $travel_Questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(TravelQuestions $question) {
	    //Remove admin question
	    if($question->delete()) {
		    return redirect()->action('TravelQuestionsController@index')->with('status', 'Question Removed Successfully');
	    }
    }
}
