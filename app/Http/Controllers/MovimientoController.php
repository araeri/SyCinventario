<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\MovimientoLista;
use App\Models\Responsable;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $movimientos = Movimiento::get();
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
            'entregamovimiento' => $request->entregamovimiento, 'recepcionmovimiento' => $request->recepcionmovimiento, 
            'razonmovimiento'=> $request->razonmovimiento, 'tipomovimiento' => $request->tipoinventario,
            'fechamovimiento' => now()        
        ]);
        return redirect()->route('movimiento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Movimiento $movimiento)
    {
        $listaMovimientos = MovimientoLista::where('idmovimientofk','=', $movimiento->idmovimiento)->get();
        dd($listaMovimientos);
        return view('movimientolista.show', compact('listaMovimientos'));
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
    public function pdf(){
        $movimientos=Movimiento::all();
        $pdf = Pdf::loadview('movimiento.pdf',compact('movimientos'));
        return $pdf->stream();
    }
}
