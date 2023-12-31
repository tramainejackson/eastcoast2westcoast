<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelPayments extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['payment_description', 'occurrence'];

	/**
	 * Get the email address for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getDescriptionAttribute($value)
	{
		return ucfirst($value);
	}

	/**
	 * Set the first name for the participant.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function setDescriptionAttribute($value)
	{
		$this->attributes['description'] = ucfirst($value);
	}
}
