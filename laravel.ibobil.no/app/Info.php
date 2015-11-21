<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
	public function getValueAttribute($value)
	{
	  return unserialize($value);
	}
	// public function setValueAttribute($value)
	// {
	//   return serialize($value);
	// }
}
