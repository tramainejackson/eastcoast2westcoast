<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TripActivities extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'trip_event',
		'activity_date',
		'activity_location',
		'show_activity'
	];

	/**
	 * Get the deposit date for the vacation.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function setActivityDateAttribute($value) {
		$newDate = new Carbon($value);

		$this->attributes['activity_date'] = $value == null ? null : $newDate->toDateString();
	}

	/**
	 * Get the email address for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getDescriptionAttribute($value) {
		return ucfirst($value);
	}

	/**
	 * Set the first name for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function setDescriptionAttribute($value) {
		$this->attributes['description'] = ucfirst($value);
	}

    /**
     * Get the trip for the activity.
     */
    public function trip()
    {
        return $this->belongsTo(TripLocations::class);
    }
}
