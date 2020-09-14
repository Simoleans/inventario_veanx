<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
	public function getNameAttribute($value)
	{
	   return strtoupper($value);
	}
	
    public function productos()
    {
    	return $this->hasMany(ComboProducto::class,'combo_id');
    }
}
