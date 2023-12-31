<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\DistributionList;
use App\Models\Settings;
use App\Models\ContactImages;
use App\Models\TripLocations;
use App\Mail\SignUpConfirmation;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ContactController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth')->except('store');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$contacts = Contact::all();
		$contactsCount = Contact::all()->count();

		return view('admin.contacts.index', compact('contacts', 'contactsCount'));
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
		if(Auth::guest()) {
			$this->validate($request, [
				'first_name' => 'required|max:30',
				'last_name' => 'required|max:30',
				'email' => 'required|max:50',
			]);

			//See if contact already exist by email
			$contactExist = Contact::query()->where('email', $request->email)->get();
			$contact = null;

			if($contactExist->isEmpty()) {
				$contact = new Contact();
				$contact->first_name = $request->first_name;
				$contact->last_name = $request->last_name;
				$contact->email = $request->email;

				if($contact->save()) {}
			} else {
				$contact = $contactExist->first();
			}

			//See if contact already exist for this trip
			$trip = TripLocations::find($request->trip_id);
			$tripParticipant = $contact->trips()->where('trip_id', $request->trip_id)->get();

			if($tripParticipant->isEmpty()) {
				$participant = new DistributionList();

				$participant->trip_id       = $trip->id;
				$participant->contact_id    = $contact->id;
				$participant->first_name    = $contact->first_name;
				$participant->last_name     = $contact->last_name;

				if($participant->save()) {
					//Send mail to somebody
					\Mail::to($contact->email)->send(new Update($contact, $participant));
				}
			} else {}

			if($tripParticipant->isNotEmpty()) {
				return redirect()->action('HomeController@index')->with('status', 'You Have Been Added To Our Contact And Will Be Updated With This Trip Information');
			} else {
				return redirect()->action('HomeController@index')->with('status', 'An User With This Email Address Has Already Been Added to Our Contacts and This Trip ' . $contact->email);
			}

		} else {
			$this->validate($request, [
				'first_name'    => 'required|max:50',
				'last_name'     => 'required|max:50',
				'email'         => 'unique:contacts,email',
				'family_size'   => 'nullable|numeric',
			]);

			$contact = new Contact();

			$contact->first_name = $request->first_name;
			$contact->last_name = $request->last_name;
			$contact->email = $request->email;
			$contact->phone = $request->phone;
			$contact->family_size = $request->family_size;
			$contact->dob = new Carbon($request->dob);

			if($contact->save()) {
				return redirect()->action('ContactController@edit', $contact->id)->with('status', 'Contact Added Successfully');
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Contact  $contact
	 * @return \Illuminate\Http\Response
	 */
	public function show(Contact $contact) {
//		return abort(404);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Contact  $contact
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Contact $contact) {
		$trips = $contact->trips;
		$missing_trips = collect();

		// Find all of the trips the user is not apart of
		// and add them into a collection instance
		foreach(TripLocations::all() as $trip) {
			if($trip->participants()->where('contact_id', $contact->id)->get()->isEmpty()) {
				$missing_trips->push($trip);
			}
		}

		return view('admin.contacts.edit', compact('contact', 'trips', 'missing_trips'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Contact  $contact
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Contact $contact) {
		$this->validate($request, [
			'first_name' => 'required|max:30',
			'last_name' => 'required|max:30',
			'contact_image' => 'nullable|image',
			'family_size' => 'nullable|numeric',
			'dob' => 'date',
		]);

		$contact->first_name = $request->first_name;
		$contact->last_name = $request->last_name;
		$contact->email = $request->email;
		$contact->phone = $request->phone;
		$contact->family_size = $request->family_size;
		$contact->dob = new Carbon($request->dob);

		if($contact->save()) {
			//Check of there are any more trips
			//this contact is added too
			foreach($contact->trips as $trip_participant) {
				$trip_participant->first_name = $contact->first_name;
				$trip_participant->last_name = $contact->last_name;

				$trip_participant->save();
			}

			//Check of there an image added for the contact
			if($request->hasFile('contact_image')) {
				$newImage = $request->file('contact_image');

				if(!$contact->image) {
					$addImage = new ContactImages();

					// Check to see if images is about 25MB
					// If it is then resize it
					if($newImage->getClientSize() < 25000000) {
						$image = Image::make($newImage->getRealPath())->orientate();
						$path = $newImage->store('public/images');
						$image->save(storage_path('app/'. $path));

						$addImage->path = $path;
						$addImage->contact_id = $contact->id;

						$addImage->save();
					} else {
						// Resize the image before storing. Will need to hash the filename first
						$path = $newImage->store('public/images');
						$image = Image::make($newImage)->orientate()->resize(1500, null, function ($constraint) {
							$constraint->aspectRatio();
							$constraint->upsize();
						});
						$image->save(storage_path('app/'. $path));

						$addImage->contact_id = $contact->id;
						$addImage->path = $path;
						$addImage->save();
					}
				} else {
					// Check to see if images is about 25MB
					// If it is then resize it
					if($newImage->getClientSize() < 25000000) {
						$image = Image::make($newImage->getRealPath())->orientate();
						$path = $newImage->store('public/images');
						$image->save(storage_path('app/'. $path));

						$contact->image->path = $path;
						$contact->image->save();
					} else {
						// Resize the image before storing. Will need to hash the filename first
						$path = $newImage->store('public/images');
						$image = Image::make($newImage)->orientate()->resize(1500, null, function ($constraint) {
							$constraint->aspectRatio();
							$constraint->upsize();
						});
						$image->save(storage_path('app/'. $path));

						$contact->image->path = $path;
						$contact->image->save();
					}
				}
			}

			return redirect()->back()->with('status', 'Contact Updated Successfully');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Contact  $contact
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Contact $contact) {
		//Remove email address before deleting contact
		$contact->email = NULL;

		if($contact->save()) {
			//Get trips user is added to and remove them
			foreach($contact->trips as $contactTrip) {
				if($contactTrip->delete()) {}
			}

			if($contact->delete()) {
				return redirect()->action('ContactController@index')->with('status', 'Contact Deleted Successfully');
			}
		}
	}

	/**
	 * Restore the specified resource from storage.
	 *
	 * @param  \App\Models\Contact  $contact
	 * @return \Illuminate\Http\Response
	 */
	public function restore($id) {
		$contact = Contact::onlyTrashed()->where('id', $id)->first();

		if($contact != null) {
			$contact->restore();
		}

		return redirect()->action('ContactController@index', $contact)->with('status', 'Contact Restored Successfully');
	}

	/**
	 * Send an email to the contact
	 *
	 * @param  \App\Models\Contact  $contact
	 * @return \Illuminate\Http\Response
	 */
	public function send_mail(Request $request, Contact $contact) {
		if($contact->email == null) {
			return redirect()->back()->with('status', 'The user doesn\'t have an email address listed. Please add an email address and try again');
		} else {
			if($request->hasFile('attachment')) {

				$path = $request->file('attachment');
				\Mail::to($contact->email)->send(new UpdateWithAttach($contact, $path, $request->email_subject, $request->email_body));

			} else {

				\Mail::to($contact->email)->send(new UpdateWithAttach($contact, '', $request->email_subject, $request->email_body));

			}
			return redirect()->back()->with('status', 'Email sent successfully');
		}
	}

	/**
	 * Send an email to multiple contacts at once.
	 *
	 * @param  \App\Property  $property
	 * @return \Illuminate\Http\Response
	 */
//	public function mass_email(Request $request) {
//		$sendToContacts = isset($request->send_to) ? $request->send_to : [];
//		$sendBody       = $request->send_body;
//		$sendSubject    = $request->send_subject;
//		$sendToAll      = $request->select_all;
//		$sendToArray    = [];
//
//		if($sendToAll == 'Y') {
//			$sendToArray = Contact::all()->toArray();
//		} else {
//
//			if(count($sendToContacts) > 0) {
//				foreach ($sendToContacts as $sendToContact) {
//					$to = Contact::find($sendToContact);
//					$sendToArray = array_prepend($sendToArray, $to->email);
//				}
//			}
//
//		}
//
//		if(empty($sendToArray) || empty($sendSubject)) {
//			return redirect()->back()->with('status', 'Email not sent. Make sure there is text in the body of the email and recipients are selected');
//		} else {
//
//			if($request->hasFile('attachment')) {
//				$path = $request->file('attachment');
//
//				\Mail::to('lorenzo@jacksonrentalhomesllc.com')
//					->bcc($sendToArray)
//					->send(new Mass($sendBody, $sendSubject)
//					);
//
//			} else {
//
//				\Mail::to('lorenzo@jacksonrentalhomesllc.com')
//					->bcc($sendToArray)
//					->send(new Mass($sendBody, $sendSubject)
//					);
//
//			}
//
//		}
//
//		return redirect()->back()->with('status', 'Email sent successfully to ' . count($sendToArray) . 'contact(s)');
//	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request) {
		$contacts = Contact::search($request->search);
		$deletedContacts = Contact::onlyTrashed()->get();
		$contactsCount = Contact::all()->count();
		$searchCriteria = $request->search;

		return view('contacts.search', compact('contacts', 'deletedContacts', 'contactsCount', 'searchCriteria'));
	}
}
