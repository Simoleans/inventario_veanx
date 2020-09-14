<?php

namespace App\Http\Controllers;

use App\Atributo;
use Illuminate\Http\Request;

class AtributoController extends Controller
{
    protected $atributo;

    /*
        injeccion de dependencias
     */
    public function __construct(Atributo $atributo)
    {
        $this->atributo = $atributo;
    }

    public function index()
    {
        return view('atributo.index',['data' => $this->atributo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atributo.create');
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

       $dato = new Atributo;
       $dato->name= $request->name;

        if ($dato->save()) {
          
            return redirect()->route('atributo.index')->with('success', 'Se registro el dato exitósamente.');

        }else{
            return redirect()->route('atributo.index')->with('error', '¡Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atributo  $atributo
     * @return \Illuminate\Http\Response
     */
    public function show(Atributo $atributo)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atributo  $atributo
     * @return \Illuminate\Http\Response
     */
    public function edit(Atributo $atributo)
    {
        return view('atributo.edit',['dato' => $atributo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atributo  $atributo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atributo $atributo)
    {
        $atributo->name = $request->name;

        if ($atributo->save()) {
          
            return redirect()->route('atributo.index')->with('warning', 'Se modifico el dato exitósamente.');

        }else{

            return redirect()->route('atributo.index')->with('error', '¡Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atributo  $atributo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atributo $atributo)
    {
        //
    }
}
