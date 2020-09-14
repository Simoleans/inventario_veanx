<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    protected $marca;

    /*
        injeccion de dependencias
     */
    public function __construct(Marca $marca)
    {
        $this->marca = $marca;
    }

    public function index()
    {
        return view('marca.index',['data' => $this->marca->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.create');
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

       $dato = new Marca;
       $dato->name= $request->name;

        if ($dato->save()) {
          
            return redirect()->route('marca.index')->with('success', 'Se registro el dato exitósamente.');

        }else{
            return redirect()->route('marca.index')->with('error', '¡Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        return view('marca.edit',['dato' => $marca]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        $marca->name = $request->name;

        if ($marca->save()) {
          
            return redirect()->route('marca.index')->with('warning', 'Se modifico el dato exitósamente.');

        }else{

            return redirect()->route('marca.index')->with('error', '¡Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        //
    }
}
