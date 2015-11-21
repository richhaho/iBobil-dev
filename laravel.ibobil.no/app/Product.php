<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function getLinksAttribute($value)
	{
	  return unserialize($value);
	}

	public function getLocationAttribute($value)
	{
	  return unserialize($value);
	}

	public function getImagesAttribute($value)
	{
	  return unserialize($value);
	}

	public function getAdataAttribute($value)
	{
	  return unserialize($value);
	}
}
