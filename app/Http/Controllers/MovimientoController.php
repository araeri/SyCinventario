<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Responsable;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientos = Movimiento::join('responsables', 'idresponsablefk', '=', 'responsables.idresponsable')
        ->join('inventarios', 'idinventariofk', '=', 'inventarios.idinventario')
        ->get();
        //dd($movimientos);
        return view('movimiento.index',compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movimiento = new Movimiento();
        return view('movimiento.create', compact('movimiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movimiento::insert([
            'idinventariofk' => $request->idinventariofk, 'idresponsablefk' => $request->idresponsablefk, 
            'tipomovimiento'=> $request->tipomovimiento, 'seleccioninventario' => $request->seleccioninventario,
            'fechamovimiento' => now()        
        ]);
        return redirect()->route('herramienta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Movimiento $movimiento)
    {
        $responsables = Responsable::where('idresponsable', '=', $movimiento->idresponsablefk)->first();
        $movimientos = Movimiento::join('responsables', 'idresponsablefk', '=', 'responsables.idresponsable')
        ->join('inventarios', 'idinventariofk', '=', 'inventarios.idinventario')
        ->where('idresponsablefk','=', $movimiento->idresponsablefk)
        ->get();
        //dd($movimientos);
        return view('movimiento.show', compact('movimientos'), compact('responsables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimiento $movimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimiento $movimiento)
    {
        //
    }
}
