<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
	use SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name', 'email', 'last_name',
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * Set the user's last name.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setLastNameAttribute($value) {
		$this->attributes['last_name'] = ucwords(strtolower($value));
	}

	/**
	 * Set the user's first name.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setFirstNameAttribute($value) {
		$this->attributes['first_name'] = ucwords(strtolower($value));
	}

	/**
	 * Set the user's email.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setEmailAttribute($value) {
		$this->attributes['email'] = strtolower($value);
	}

	/**
	 * Get the documents for the contact.
	 */
	public function trips() {
		return $this->hasMany(DistributionList::class);
	}

	/**
	 * Get the contact/tenant for the property.
	 */
	public function image() {
		return $this->hasOne(ContactImages::class);
	}

	/**
	 * Concat first and last name
	 */
	public function full_name() {
		return $this->first_name . ' ' . $this->last_name;
	}

	/**
	 * Search contacts with criteria
	 */
	public function scopeSearch($query, $search) {
		return $query->where('first_name', 'like', '%' . $search . '%')
			->orWhere('last_name', 'like', '%' . $search . '%')
			->orWhere('email', 'like', '%' . $search . '%')
			->orWhere('phone', 'like', '%' . $search . '%')
			->get();
	}
}
