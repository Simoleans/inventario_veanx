<?php

namespace App\Http\Controllers;

use App\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    protected $tipo;

    /*
        injeccion de dependencias
     */
    public function __construct(Tipo $tipo)
    {
        $this->tipo = $tipo;
    }

    public function index()
    {
        return view('tipo.index',['data' => $this->tipo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo.create');
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

       $dato = new Tipo;
       $dato->name= $request->name;

        if ($dato->save()) {
          
            return redirect()->route('tipo.index')->with('success', 'Se registro el dato exitósamente.');

        }else{
            return redirect()->route('tipo.index')->with('error', '¡Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo $tipo)
    {
        return view('tipo.edit',['dato' => $tipo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo $tipo)
    {
        $tipo->name = $request->name;

        if ($tipo->save()) {
          
            return redirect()->route('tipo.index')->with('warning', 'Se modifico el dato exitósamente.');

        }else{

            return redirect()->route('tipo.index')->with('error', '¡Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        //
    }
}
