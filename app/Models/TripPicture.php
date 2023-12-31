<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TripPicture extends Model
{
    /**
     * Get the trip for the picture.
     */
    public function trip()
    {
        return $this->belongsTo(TripLocations::class);
    }
}
