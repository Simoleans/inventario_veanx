<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    public $fillable = ['producto_id','cantidad'];

    public function producto()
    {
    	return $this->belongsTo(Producto::class);
    }

    public function colorInventario()
	{
		return $this->cantidad == 0 ? '#DC97A8' : '#AFDDA1';
	}

	public function scopeCantidad($query,$cantidad)
	{
		if ($cantidad) {
			return $query->where('cantidad','<',$cantidad);
		}
	}


}
