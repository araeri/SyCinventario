<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        if ($request->hasfile('fotoinventario')) {

            $file = $request->file('fotoinventario');
            $extention = $file->getClientOriginalExtension();
            $filename = '/'.time().'.'.$extention;
            $file->move(public_path().'/Imagenes', $filename);
            //dd($filename);
        }
        $id = Inventario::insertGetId([
            'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
            'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => $filename,
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
        $numero = Inventario::max('idinventario') +1;
        //dd($material);
        return view('vehiculo.show', compact('vehiculo'), compact('numero'));
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
        $numero = null;
        //dd($vehiculo);
        return view('vehiculo.edit', compact('vehiculo'), compact('numero') );
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
        $Vehiculo = Inventario::find($id);
        if ($request->hasfile('fotoinventario')) {
            $destination = storage_path('Imagenes\\'.$Vehiculo->fotoinventario);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('fotoinventario');
            $extention = $file->getClientOriginalExtension();
            $filename = '/'.time().'.'.$extention;
            $file->move(public_path().'/Imagenes', $filename);
        }
        Inventario::where('idinventario', $id)
        ->update([
            'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario,  
            'fotoinventario' => $filename, 'estadoinventario' => $request->estadoinventario, 
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
        $Vehiculo = Inventario::find($vehiculo->idinventario);
        $destination = storage_path('Imagenes\\'.$Vehiculo->fotoinventario);
            if (File::exists($destination)) {
                File::delete($destination);
            }
        //dd($vehiculo);
        $vehiculo->delete();
        return redirect()->route('vehiculo.index');
    }
}
