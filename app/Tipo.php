<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    public function getNameAttribute($value)
	{
	   return strtoupper($value);
	}
}
