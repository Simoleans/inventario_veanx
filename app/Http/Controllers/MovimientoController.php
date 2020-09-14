<?php

namespace App\Http\Controllers;

use App\{Movimiento,Combo,Inventario,Producto};
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function index()
    {
        return view('movimientos.index',['data' => Movimiento::get(['user_id','cantidad','precio','descripcion','created_at','tipo'])]);
    }

    public function ingreso_combo(Combo $combo)
    {
        if ($combo->productos->count() == 0) {
            return redirect()->back()->with('danger', '¡Este combo no tiene productos!');
        }

        return view('movimientos.ingreso-combo',['combo' => $combo]);
    }

    public function store_ingreso_combo(Request $request)
    {
        $movimiento = new Movimiento;
        $movimiento->fill($request->except(['producto_id']));

        if ($movimiento->save()) {
            foreach ($request->producto_id as $p) {
                $inventario = Inventario::where('producto_id',$p)->first();
                $inventario->cantidad = $request->cantidad + $inventario->cantidad;
                $inventario->save();
            }

            return redirect()->back()->with('success', 'Se hizo la entrada correctamente');
        }
    }

    public function ingreso_producto(Producto $producto)
    {
        
        return view('movimientos.ingreso-producto',['producto' => $producto]);
    }

    public function store_ingreso_producto(Request $request)
    {
        if ($request->cantidad <= 0) {
            return redirect()->back()->with('error', 'La cantidad no puede ser menor o igual a 0');
        }
        
        $movimiento = new Movimiento;
        $movimiento->fill($request->all());

        if ($movimiento->save()) {
            $inventario = Inventario::where('producto_id',$request->producto_id)->first();
            $inventario->cantidad = $request->cantidad + $inventario->cantidad;
            $inventario->save();

            return redirect()->route('producto.index')->with('success', 'Se hizo la entrada exitosamente.');
        }
    }

    public function egreso_combo(Combo $combo)
    {
        if ($combo->productos->count() == 0) {
            return redirect()->back()->with('danger', '¡Este combo no tiene productos!');
        }

        return view('movimientos.egreso-combo',['combo' => $combo]);
    }

    public function store_egreso_combo(Request $request)
    {
        if ($request->cantidad <= 0) {
            return redirect()->back()->with('error', 'La cantidad no puede ser menor o igual a 0');
        }

        $movimiento = new Movimiento;
        $movimiento->fill($request->except(['producto_id']));

        if ($movimiento->save()) {
            foreach ($request->producto_id as $p) {
                $inventario = Inventario::where('producto_id',$p)->first();
                if ($inventario->cantidad < $request->cantidad) {
                    return redirect()->back()->with('error', 'Hay productos que tienen una cantidad menor a la que estás ingresando');
                }
                $inventario->cantidad = $inventario->cantidad - $request->cantidad;
                $inventario->save();
            }

            return redirect()->back()->with('success', 'Se hizo la salida correctamente');
        }
    }

    public function egreso_producto(Producto $producto)
    {
        
        return view('movimientos.egreso-producto',['producto' => $producto]);
    }

    public function store_egreso_producto(Request $request)
    {
        if ($request->cantidad <= 0) {
            return redirect()->back()->with('error', 'La cantidad no puede ser menor o igual a 0');
        }
        $movimiento = new Movimiento;
        $movimiento->fill($request->all());

        if ($movimiento->save()) {
            $inventario = Inventario::where('producto_id',$request->producto_id)->first();

            if ($inventario->cantidad < $request->cantidad) {
                return redirect()->back()->with('error', 'El producto que tienen una cantidad menor a la que estás ingresando');
            }

            $inventario->cantidad = $inventario->cantidad - $request->cantidad;
            $inventario->save();

            return redirect()->route('producto.index')->with('success', 'Se hizo la salida exitosamente.');
        }
    }
}
