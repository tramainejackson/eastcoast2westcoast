<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
	use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * Get the user's first name.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getFirstNameAttribute($value)
	{
		return ucfirst(strtolower($value));
	}

	/**
	 * Set the user's first name.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setFirstNameAttribute($value)
	{
		$this->attributes['first_name'] = ucwords(strtolower($value));
	}

	/**
	 * Get the user's last name.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getLastNameAttribute($value)
	{
		return ucwords(strtolower($value));
	}

	/**
	 * Set the user's last name.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setLastNameAttribute($value)
	{
		$this->attributes['last_name'] = ucfirst(strtolower($value));
	}

	/**
	 * Get the user's last name.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function getEmailAttribute($value)
	{
		return strtolower($value);
	}

	/**
	 * Set the user's last name.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setEmailAttribute($value)
	{
		$this->attributes['email'] = strtolower($value);
	}

    /**
     * Get the customers last login.
     *
     * @param  string  $value
     * @return carbon
     */
    public function getLastLoginAttribute($value)
    {
        $last_login = $value;

        if($last_login == NULL) {
        } else {
            $last_login = new Carbon($value);
        }
        return $last_login;
    }
}
