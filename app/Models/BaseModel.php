<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hash;

class BaseModel extends Model
{
    //if you want to use something on every model then input code into the basemodel
    public function getCreatedAtAttribute($value)
    {
		$utc = \Carbon\Carbon::createFromFormat($this->getDateFormat(), $value);
		return $utc->setTimezone('America/Chicago');
	}

	public function getUpdatedAtAttribute($value)
	{	
		$utc = \Carbon\Carbon::createFromFormat($this->getDateFormat(), $value);
		return $utc->setTimezone('America/Chicago');
	}


	public function setPasswordAttribute($value)
	{
	$this->attributes['password'] = Hash::make($value);
	}
}
