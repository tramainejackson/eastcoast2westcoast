<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelQuestions extends Model
{
	/**
	 * Concat first and last name
	 */
	public function full_name() {
		return $this->first_name . ' ' . $this->last_name;
	}
}
