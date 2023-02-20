<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\MovimientoLista;
use Illuminate\Http\Request;

class MovimientoListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
    }

    /**
     * Muestra la lista de movimientos de un movimiento en particular.
     *
     * @param  \App\Models\MovimientoLista  $movimientoLista
     * @return \Illuminate\Http\Response
     */
    public function show(Movimiento $movimientolistum)
    {
        $listaMovimientos = MovimientoLista::where('idmovimientofk','=', $movimientolistum->idmovimiento)->get();
        return view('movimientolista.show', compact('listaMovimientos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MovimientoLista  $movimientoLista
     * @return \Illuminate\Http\Response
     */
    public function edit(MovimientoLista $movimientoLista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MovimientoLista  $movimientoLista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovimientoLista $movimientoLista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovimientoLista  $movimientoLista
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovimientoLista $movimientoLista)
    {
        //
    }
}
