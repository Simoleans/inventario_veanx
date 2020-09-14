<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComboProducto extends Model
{
    public $fillable = ['combo_id','producto_id'];

    public function producto()
	{
		return $this->belongsTo(Producto::class);
	}
}
