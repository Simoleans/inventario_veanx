<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    public function getNameAttribute($value)
	{
	   return strtoupper($value);
	}
}
