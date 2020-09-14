<?php

namespace App\Http\Controllers;

use App\{ComboProducto,Combo,Producto};
use Illuminate\Http\Request;

class ComboController extends Controller
{
    protected $combo;

    /*
        injeccion de dependencias
     */
    public function __construct(Combo $combo)
    {
        $this->combo = $combo;
    }

    public function index()
    {
        return view('combo.index',['data' => $this->combo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

       $dato = new Combo;
       $dato->name= $request->name;

        if ($dato->save()) {
          
            return redirect()->route('combo.index')->with('success', 'Se registro el dato exitósamente.');

        }else{
            return redirect()->route('combo.index')->with('error', '¡Error!');
        }
    }

    
    public function edit(Combo $combo)
    {
        return view('combo.edit',['dato' => $combo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Combo $combo)
    {
        $combo->name = $request->name;

        if ($combo->save()) {
          
            return redirect()->route('combo.index')->with('warning', 'Se modifico el dato exitósamente.');

        }else{

            return redirect()->route('combo.index')->with('error', '¡Error!');
        }
    }

    public function add_productos($id)
    {
        $combo = $this->combo->findOrfail(decrypt($id));

        $lec = $combo->productos()->get(['producto_id']);

        return view('combo.add_producto',['productos' => Producto::get(['id','nombre','descripcion','atributo_id','c_unidad','unidad']),'combo' => $combo ]);
    }

    public function store_productos(Request $request)
    {
        if(!isset($request->producto_id))
        {
            return redirect()->back()->with('warning', '¡No seleccionaste ningún Producto!');
        }else{
            foreach ($request->producto_id as $a) {
                ComboProducto::where('combo_id',$request->combo_id)->where('producto_id',$a)->delete();
                ComboProducto::create([ 'combo_id' => $request->combo_id,
                                       'producto_id' => $a
                                       ]);
            }
            return redirect()->back()->with('success', 'Se agregaron los productos correctamente');
        }

    }

    public function delete_productos(Request $request)
    {
        $query = ComboProducto::where('combo_id',$request->combo_id)->where('producto_id',$request->producto_id)->delete();
        if ($query) {
            return redirect()->back()->with('success', 'Se elimino el producto de este combo');
        }else{
            return redirect()->back()->with('danger', '¡Error!');
        }
        

    }

    
}
