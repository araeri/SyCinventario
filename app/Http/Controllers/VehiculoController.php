<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VehiculoController extends Controller
{
    /**
     * Muestra un el listado de vehículos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Inventario::join('vehiculos', 'idinventario', '=', 'vehiculos.idinventariofk')->get();
        return view('vehiculo.index',compact('vehiculos'));
    }

    /**
     * Muestra la forma para crear un nuevo vehículo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculo = new Vehiculo();
        $numero = Inventario::max('idinventario') +1;
        return view('vehiculo.create', compact('vehiculo'),compact('numero'));
    }

    /**
     * Guarda un nuevo vehículo en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Insercción de la nueva imagen
        $file = $request->file('fotoinventario');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move(public_path().'/Imagenes', $filename);

        $id = Inventario::insertGetId([
            'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
            'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => $filename,
            'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario
        ]);     
        Vehiculo::insert([
            'idinventariofk' => $id, 'patentevehiculo' => $request->patentevehiculo,
            'tipovehiculo' => $request->tipovehiculo
        ]);
        return redirect()->route('vehiculo.index');
    }

    /**
     * Muestra un vehículo en específico.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $vehiculo)
    {
        $vehiculoEleg = Inventario::join('vehiculos', 'idinventario', '=', 'vehiculos.idinventariofk')->where('idinventario', '=', $vehiculo->idinventario)->first();
        $vehiculo = $vehiculoEleg;
        return view('vehiculo.show', compact('vehiculo'));
    }

    /**
     * Muestra la forma para editar un vehículo existente.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $vehiculo)
    {
        $vehiculoEleg = Inventario::join('vehiculos', 'idinventario', '=', 'vehiculos.idinventariofk')->where('idinventario', '=', $vehiculo->idinventario)->first();
        $vehiculo = $vehiculoEleg;
        $numero = null;
        return view('vehiculo.edit', compact('vehiculo'), compact('numero') );
    }

    /**
     * Actualiza el vehículo en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Vehiculo = Inventario::find($id);
        
        //Comprueba si hay una imagen nueva
        if ($request->hasfile('fotoinventario')) {
            $destination = public_path('Imagenes/'.$Vehiculo->fotoinventario);
            if (File::exists($destination)) {
                //Si existe ruta, lo borra
                File::delete($destination);
            }

            //Insercción de nueva imaben
            $file = $request->file('fotoinventario');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move(public_path().'/Imagenes', $filename);
        
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
        }
        //Si no, actualiza el resto de los datos
        else{
            Inventario::where('idinventario', $id)
            ->update([
                'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario,  
                'estadoinventario' => $request->estadoinventario, 
                'informacioninventario' => $request->informacioninventario
            ]);
            Vehiculo::where('idinventariofk', $id)
            ->update([
                'tipovehiculo' => $request->tipovehiculo, 'patentevehiculo' => $request->patentevehiculo

            ]);
        }
        return redirect()->route('vehiculo.index');
    }

    /**
     * Borra un vehículo de la lista.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $vehiculo)
    {
        $Vehiculo = Inventario::find($vehiculo->idinventario);
        $destination = storage_path('Imagenes/'.$Vehiculo->fotoinventario);
            if (File::exists($destination)) {
                File::delete($destination);
            }
        $vehiculo->delete();
        return redirect()->route('vehiculo.index');
    }
}