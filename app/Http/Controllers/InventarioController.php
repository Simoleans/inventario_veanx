<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;

class InventarioController extends Controller
{
    public function index()
    {
    	$inventario = Inventario::all();

    	return view('inventario.index',['data' => $inventario]);
    }

}
