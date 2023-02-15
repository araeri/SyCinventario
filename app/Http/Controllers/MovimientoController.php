<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
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
        $numero = Movimiento::max('idmovimiento') +1;
        $inventario = Inventario::get();
        $selectedItems = '';
        //dd($inventario);
        return view('movimiento.create', compact('movimiento','numero','inventario','selectedItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seleccionitems = json_decode(request('selected-items'), true);
        $idmov = Movimiento::insertGetId([
            'entregamovimiento' => $request->entregamovimiento, 'recepcionmovimiento' => $request->recepcionmovimiento, 
            'razonmovimiento'=> $request->razonmovimiento, 'tipomovimiento' => $request->tipomovimiento,
            'fechamovimiento' => now(), 'codmovimiento' => $request->codmovimiento  
        ]);
        
        foreach ($seleccionitems as $item){
            MovimientoLista::insert([
                'codinventario' => $item['codinventario'],
                'nombreinventario' => $item['nombreinventario'],
                'fotoinventario' => $item['fotoinventario'],
                'tipoinventario' => $item['tipoinventario'],
                'idmovimientofk' => $idmov
            ]);
        }

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
