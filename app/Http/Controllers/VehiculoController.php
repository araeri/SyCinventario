<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Inventario;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Inventario::join('vehiculos', 'idinventario', '=', 'vehiculos.idinventariofk')->get();
        //dd($vehiculos);
        return view('vehiculo.index',compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculo = new Vehiculo();
        return view('vehiculo.create', compact('vehiculo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Inventario::insertGetId([
            'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
            'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => $request->fotoinventario,
            'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario]
            
        );    
        //dd($id);    
        Vehiculo::insert([
            'idinventariofk' => $id, 'patentevehiculo' => $request->patentevehiculo,
            'tipovehiculo' => $request->tipovehiculo
        ]);
        return redirect()->route('vehiculo.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $vehiculo)
    {
        $vehiculoEleg = Inventario::join('vehiculos', 'idinventario', '=', 'vehiculos.idinventariofk')->where('idinventario', '=', $vehiculo->idinventario)->first();
        //$herramienta = $herramientum;
        $vehiculo = $vehiculoEleg;
        //dd($material);
        return view('vehiculo.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $vehiculo)
    {
        $vehiculoEleg = Inventario::join('vehiculos', 'idinventario', '=', 'vehiculos.idinventariofk')->where('idinventario', '=', $vehiculo->idinventario)->first();
        //$herramienta = $herramientum;
        $vehiculo = $vehiculoEleg;
        //dd($vehiculo);
        return view('vehiculo.edit', compact('vehiculo') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Inventario::where('idinventario', $id)
        ->update([
            'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario,  
            'fotoinventario' => $request->fotoinventario, 'estadoinventario' => $request->estadoinventario, 
            'informacioninventario' => $request->informacioninventario
        ]);
        Vehiculo::where('idinventariofk', $id)
        ->update([
            'tipovehiculo' => $request->tipovehiculo, 'patentevehiculo' => $request->patentevehiculo

        ]);
        return redirect()->route('vehiculo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $vehiculo)
    {
        //dd($vehiculo);
        $vehiculo->delete();
        return redirect()->route('vehiculo.index');
    }
}
