<?php

namespace App\Http\Controllers;


use App\Models\TripLocations;
use App\Models\TripPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\File;
use Jenssegers\Agent\Agent;

class TripPicturesController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'mobile_index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$pictures = TripPicture::all();
		$getLocations = TripLocations::all();

		return view('admin.pictures.index', compact('pictures', 'getLocations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pictures = TripPicture::all();
		$getLocations = TripLocations::all();

		return view('admin.pictures.create', compact('pictures', 'getLocations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$trip = TripLocations::find($request->trip_id);
		$error = "";
		$success = 0;

		if($request->hasFile('upload_photo')) {
			foreach($request->file('upload_photo') as $newImage) {
				$addImage = new TripPicture();
				$fileName = $newImage->getClientOriginalName();

				// Check to see if images is too large
				if($newImage->getError() == 1) {
					$error .= "The file " . $fileName . " is too large and could not be uploaded";
				} elseif($newImage->getError() == 0) {
					// Check to see if images is about 25MB
					// If it is then resize it
					if($newImage->getClientSize() < 25000000) {
						if($newImage->guessExtension() == 'jpeg' || $newImage->guessExtension() == 'png' || $newImage->guessExtension() == 'gif' || $newImage->guessExtension() == 'webp' || $newImage->guessExtension() == 'jpg') {
							$image = Image::make($newImage->getRealPath())->orientate();
							$path = $newImage->store('public/images');

							if($image->save(storage_path('app/'. $path))) {
								// prevent possible upsizing
								// Create a larger version of the image
								// and save to large image folder
								$image->resize(1800, null, function ($constraint) {
									$constraint->aspectRatio();
									// $constraint->upsize();
								});

								if ($image->save(storage_path('app/' . str_ireplace('images', 'images/lg', $path)))) {
									// Get the height of the current large image
									$addImage->lg_height = $image->height();

									// Create a smaller version of the image
									// and save to large image folder
									$image->resize(500, null, function ($constraint) {
										$constraint->aspectRatio();
									});

									if($image->save(storage_path('app/'. str_ireplace('images', 'images/sm', $path)))) {
										// Get the height of the current small image
										$addImage->sm_height = $image->height();
									}
								}
							}

							$addImage->trip_id = $request->trip_id;
							$addImage->picture_name = $path;

							if($addImage->save()) {
								$success++;
							}
						} else {
							$error .= "The file " . $fileName . " could not be added bcause it is the wrong image type.";
						}
					} else {
						// Resize the image before storing. Will need to hash the filename first
						$path = $newImage->store('public/images');
						$image = Image::make($newImage)->orientate()->resize(1500, null, function ($constraint) {
							$constraint->aspectRatio();
							$constraint->upsize();
						});
						$image->save(storage_path('app/'. $path));

						$addImage->trip_id = $request->trip_id;
						$addImage->picture_name = $path;

						if($addImage->save()) {
							$success++;
						}
					}
				} else {
					$error .= "The file " . $fileName . " may be corrupt and could not be uploaded.";
				}
			}
		}

		if($error != "") {
			if($success > 0) {
				return redirect()->action('TripPicturesController@create')->with('status', $success . ' pictures added successfully')->with('error', $error);
			} else {
				return redirect()->action('TripPicturesController@create')->with('error', $error);
			}
		} else {
			return redirect()->action('TripPicturesController@edit', $trip)->with('status', 'Pictures Added/Updated Successfully');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trip_Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(TripLocations $picture)
    {
	    $trip = $picture;
	    $trips = TripLocations::all();
	    $getPictures = $trip->pictures;

	    return view('admin.pictures.show', compact('trip', 'trips', 'getPictures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TripPicture  $trip_Pictures
     * @return \Illuminate\Http\Response
     */
    public function edit(TripPicture $tripPictures, $id)
    {
        $trip = TripLocations::find($id);
		$getPictures = $trip->pictures;

        return view('admin.pictures.edit', compact('trip', 'getPictures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TripPicture  $trip_Pictures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $trip = TripLocations::find($id);
		$pictures = $trip->pictures;
		$picturesID = $request->picture_id;
		// dd($request);

		// Update active trip participants
		for($i=0; $i < count($picturesID); $i++) {
			if($picturesID[$i] == $pictures[$i]->id) {
				$pictures[$i]->picture_caption = $request->picture_caption[$i];

				$pictures[$i]->save();
			}
		}

		return redirect()->action('TripPicturesController@edit', $trip)->with('status', 'Pictures Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TripPicture  $trip_Pictures
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get picture to remove
		$remove = TripPicture::find($id);
		$trip = $remove->trip;
		$status = "You have removed all of the photos for this trip";
		$getLocations = TripLocations::all();

		// Remove Picture
		Storage::delete(str_ireplace('public/images/', '', $remove->picture_name));
		$remove->delete();

		// After deleting picture retrieve current pictures
		$getPictures = $trip->pictures;

		if($trip->pictures()->count() < 1) {
			return view('admin.pictures.create', compact('status', 'getLocations'));
		} else {
			return view('admin.pictures.edit', compact('trip', 'getPictures'));
		}
    }

	/**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TripPicture  $trip_Pictures
     * @return \Illuminate\Http\Response
     */
    public function mobile_index()
    {
		$trips = TripLocations::all();

		return view('photos', compact('trips'));
	}
}
