<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    public $fillable = ['combo_id','producto_id','proveedor','descripcion','precio','user_id','cantidad','tipo'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($data) {
            $data->user_id = auth()->user()->id;
        });
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
