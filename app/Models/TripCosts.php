<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TripCosts extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['package'];

    /**
     * Get the trip for the picture.
     */
    public function trip()
    {
        return $this->belongsTo(TripLocations::class);
    }
}
