<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Inventario;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Inventario::where('tipoinventario', '=', 'Equipo')->get();
        //dd($equipos);
        return view('equipo.index',compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipo = new Equipo();
        return view('equipo.create', compact('equipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipo = $request->except('_token');
        Inventario::insert($equipo);
        return redirect()->route('equipo.index');
        //dd($equipo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $equipo)
    {
        $equipo = Inventario::where("idinventario", "=",$equipo->idinventario )->first();
        //dd($equipo);
        return view('equipo.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $equipo)
    {
        //dd($equipo);

        return view('equipo.edit', compact('equipo') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idinventario)
    {
        $datosEquipo = $request->except(['_token','_method']);
        Inventario::where('idinventario','=', $idinventario)->update($datosEquipo);

        //$herramienta = Inventario::findOrFail($idinventario);
        return redirect()->route('equipo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $equipo)
    {
        //dd($equipo);
        $equipo->delete();
        return redirect()->route('equipo.index');
    }
}
