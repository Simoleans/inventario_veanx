<?php

namespace App\Http\Controllers;

use App\Pack;
use Illuminate\Http\Request;

class PackController extends Controller
{
    protected $pack;

    /*
        injeccion de dependencias
     */
    public function __construct(Pack $pack)
    {
        $this->pack = $pack;
    }

    public function index()
    {
        return view('pack.index',['data' => $this->pack->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pack.create');
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

       $dato = new Pack;
       $dato->name= $request->name;

        if ($dato->save()) {
          
            return redirect()->route('pack.index')->with('success', 'Se registro el dato exitósamente.');

        }else{
            return redirect()->route('pack.index')->with('error', '¡Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function show(Pack $pack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function edit(Pack $pack)
    {
        return view('pack.edit',['dato' => $pack]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pack $pack)
    {
        $pack->name = $request->name;

        if ($pack->save()) {
          
            return redirect()->route('pack.index')->with('warning', 'Se modifico el dato exitósamente.');

        }else{

            return redirect()->route('pack.index')->with('error', '¡Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pack $pack)
    {
        //
    }
}
