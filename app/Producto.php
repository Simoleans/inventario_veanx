<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $fillable = [
				    		'tipo_id',
				            'marca_id',
				            'atributo_id',
				            'pack_id',
				           	'nombre',
				           	'descripcion',
				           	'c_unidad',
				           	'atributo_1',
				           	'atributo_2',
				           	'valor_venta',
				           	'valor_venta_1',
				          	'valor_venta_2'
			          	];

	public function getDescripcionAttribute($value)
	{
	   return $value ? : 'N/T';
	}

	public function getUnidadAttribute($value)
	{
	   return $value ? : 'N/T';
	}

	public function getCUnidadAttribute($value)
	{
	   return $value ? : 'N/T';
	}

	public function atributo()
	{
		return $this->belongsTo(Atributo::class,'atributo_id')->withDefault(['name' => 'N/T']);
	}

	public function marca()
	{
		return $this->belongsTo(Marca::class,'marca_id')->withDefault(['name' => 'N/T']);
	}

	public function tipo()
	{
		return $this->belongsTo(Tipo::class,'tipo_id')->withDefault(['name' => 'N/T']);
	}

	public function pack()
	{
		return $this->belongsTo(Pack::class,'pack_id')->withDefault(['name' => 'N/T']);
	}

	public function inventario()
	{
		return $this->hasOne(Inventario::class,'producto_id');
	}

	public function colorInventario()
	{
		return $this->inventario->cantidad == 0 ? '#DC97A8' : '#AFDDA1';
	}

	public function optionTableCombo($combo)
	{
		$exists =  ComboProducto::where('combo_id',$combo)->where('producto_id',$this->id)->exists();

		if ($exists) {
			return '<button class="btn btn-danger deleteProductCombo" data-toggle="tooltip" data-placement="top" title="Sacar '.strtoupper($this->nombre).' de este combo"  data-combo="'.$combo.'" data-producto="'.$this->id.'" data-nombre="'.strtoupper($this->nombre).'">X</button>';
		}else{
			return '<input class="form-check-input" type="checkbox" value="'.$this->id.'" id="producto-'.$this->id.'">';
		}
	}

}
