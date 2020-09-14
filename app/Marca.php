<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function getNameAttribute($value)
	{
	   return strtoupper($value);
	}
}
