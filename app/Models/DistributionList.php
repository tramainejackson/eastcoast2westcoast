<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class DistributionList extends Model
{
	use Notifiable;
	use SoftDeletes;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'first_name',
		'last_name',
		'contact_id',
		'notes',
		'paid_in_full',
	];

	/**
	 * Get the first name for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getFirstNameAttribute($value) {
		return mb_convert_case(mb_strtolower($value, "UTF-8"), MB_CASE_TITLE, "UTF-8");
	}

	/**
	 * Get the last name for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getLastNameAttribute($value) {
		return mb_convert_case(mb_strtolower($value, "UTF-8"), MB_CASE_TITLE, "UTF-8");
	}

	/**
	 * Get the email address for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getEmailAttribute($value) {
		return strtolower($value);
	}

	/**
	 * Get the phone number for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getPhoneAttribute($value) {
		return $value != null ? $value : 'No Phone Number Added';
	}

	/**
	 * Set the phone number for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function setPhoneAttribute($value) {
		return $value == 'No Phone Number Added' ? null : $value;
	}

	/**
	 * Set the first name for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function setFirstNameAttribute($value) {
		$this->attributes['first_name'] = mb_convert_case(mb_strtolower($value, "UTF-8"), MB_CASE_TITLE, "UTF-8");
	}

	/**
	 * Set the last name for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function setLastNameAttribute($value) {
		$this->attributes['last_name'] = mb_convert_case(mb_strtolower($value, "UTF-8"), MB_CASE_TITLE, "UTF-8");
	}

	/**
	 * Set the email address for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function setEmailAttribute($value) {
		$this->attributes['email'] = strtolower($value);
	}

	/**
	 * Get the contact for the participant.
	 */
	public function contact() {
		return $this->belongsTo(Contact::class);
	}

	/**
	 * Get the trip for the participant.
	 */
	public function trip() {
		return $this->belongsTo(TripLocations::class);
	}

	/**
	 * Set the email address for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function full_name() {
		return $this->first_name . " " . $this->last_name;
	}
}
