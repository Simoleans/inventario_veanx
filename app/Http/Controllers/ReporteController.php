<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Inventario};
use PDF;

class ReporteController extends Controller
{
    public function index()
    {
    	return view('reportes.index');
    }

    public function inventario(Request $request)
    {
    	$inventario = Inventario::cantidad($request->cantidad)->get();

        $pdf = PDF::loadView('reportes.pdfInventario', ['data' => $inventario]);

        return $pdf->setPaper('a3', 'portrait')->stream(date("dmYhms") . '.pdf');
    }
}
