<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DistributionListController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TravelSuggestionsController;
use App\Http\Controllers\TripLocationsController;
use App\Http\Controllers\TripPicturesController;
use App\Http\Controllers\UsersController;
use App\Models\TripLocations;
use Illuminate\Support\Facades\Route;

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

/*Welcome/Index Page*/
Route::get('/', [TripLocationsController::class, 'web_index'])->name('welcome');

/*Photos Page*/
Route::get('/photos', [TripPicturesController::class, 'mobile_index'])->name('photos');

/*About Us Page*/
Route::get('/about_us', function() {
    return view('about_us');
})->name('about_us');

/*Contact Us Page*/
Route::get('/contact_us', function() {
    return view('contact_us');
})->name('contact_us');

Route::resource('admin', UsersController::class);
Route::resource('location', TripLocationsController::class);
Route::resource('pictures', TripPicturesController::class);
Route::resource('suggestions', TravelSuggestionsController::class);
Route::resource('settings', SettingsController::class);
Route::resource('participants', DistributionListController::class);
Route::resource('contacts', ContactController::class);

//Route::get('/trips', 'TripLocationsController@web_index')->name('web_index');
//
//Route::post('/locations/ajax_add', 'TripLocationsController@ajax_add');
//
//Route::patch('/locations/ajax_update', 'TripLocationsController@ajax_update');
//
Route::patch('/locations/add_contact', [TripLocationsController::class, 'add_contact']);
//
//Route::delete('/locations/ajax_delete', 'TripLocationsController@ajax_delete');


require __DIR__.'/auth.php';
