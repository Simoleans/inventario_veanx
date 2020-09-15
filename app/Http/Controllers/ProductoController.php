<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    protected $producto;

    /*
        injeccion de dependencias
     */
    public function __construct(Producto $producto)
    {
        $this->producto = $producto;
    }

    public function index()
    {
        return view('producto.index',['data' => $this->producto->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $dato = $this->producto->create($request->all());

        if ($dato) {
            
            $dato->inventario()->create([
                                        'producto_id' => $dato->id,
                                        'cantidad' => 0
                                      ]);

            return redirect()->route('producto.index')->with('success', 'Se registro el dato exitósamente.');

        }else{
            return redirect()->route('producto.index')->with('error', '¡Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('producto.edit',['producto' => $this->producto->findOrfail(decrypt($id))]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $update = $producto->update($request->all());

        if ($update) {
          return redirect()->route('producto.index')->with('success', 'Se edito el producto exitósamente.');

        }else{
            return redirect()->route('producto.index')->with('error', '¡Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        if ($producto->delete()) {
             return redirect()->route('producto.index')->with('success', 'Se Elimino esté producto correctamente.');
        }else{
            return redirect()->route('producto.index')->with('error', '¡Error!');
        }
    }
}
