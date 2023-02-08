<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use App\Models\Inventario;
use Illuminate\Http\Request;

class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $herramientas = Inventario::where('tipoinventario', '=', 'Herramienta')->get();
        //dd($equipos);
        return view('herramienta.index',compact('herramientas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $herramienta = new Herramienta();
        return view('herramienta.create', compact('herramienta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $herramienta = $request->except('_token');
        Inventario::insert($herramienta);
        return redirect()->route('herramienta.index');
        //dd($equipo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $herramientum)
    {
        //$id = strval($idNum);
        $herramienta = Inventario::where("idinventario", "=",$herramientum->idinventario )->first();
        //dd($herramienta);
        //$estudiantes = Registro::where("idEs", "=", Estudiante::select("id"));
        return view('herramienta.show', compact('herramienta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $herramientum)
    {
        //dd($herramientum);
        $herramienta = $herramientum;

        return view('herramienta.edit', compact('herramienta') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idinventario)
    {
        $datosHerramienta = $request->except(['_token','_method']);
        //dd($id);
        Inventario::where('idinventario','=', $idinventario)->update($datosHerramienta);

        //$herramienta = Inventario::findOrFail($idinventario);
        //return view('estudiante.edit', compact('estudiante') );
        return redirect()->route('herramienta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $herramientum)
    {
        //dd($herramientum);
        $herramientum->delete();
        return redirect()->route('herramienta.index');
    }
}
