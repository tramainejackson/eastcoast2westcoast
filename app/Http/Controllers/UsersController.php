<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
		$getAllusers = User::all();

        return view('admin.users.index', compact('getAllusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getAllusers = User::all();
        return view('admin.users.create', compact('getAllusers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
		$this->validate($request, [
			'first_name' => 'required|max:30',
			'last_name' => 'required|max:30',
			'email' => 'required|max:50',
			'password' => 'required|max:50',
		]);

		$user = new User();
        $user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->active = $request->active;
		$user->password = Hash::make($request->password);

		if($user->save()) {

			return redirect()->action('UsersController@edit', $user)->with('status', 'New User Added Successfully');

		}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show() {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id) {
		$user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
		$this->validate($request, [
			'first_name' => 'required|max:30',
			'last_name' => 'required|max:30',
			'email' => 'required|max:50',
		]);

		$user = User::find($id);

		if($request->password != "") {
			$this->validate($request, [
				'password' => 'required|min:7',
			]);

			$user->password = Hash::make($request->password);
		}

		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->active = $request->active;

		$user->save();

		return redirect()->action('UsersController@edit', $user)->with('status', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin) {
    	//Remove admin user
    	if($admin->delete()) {
		    return redirect()->action('UsersController@index')->with('status', 'User Removed Successfully');
	    }
    }
}

