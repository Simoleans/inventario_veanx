<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    

	public function getNameAttribute($value)
	{
	   return strtoupper($value);
	}
}
