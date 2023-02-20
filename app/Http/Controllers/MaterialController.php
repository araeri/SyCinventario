<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\Inventario;
use Illuminate\Support\Facades\File;

class MaterialController extends Controller
{
    /**
     * Muestra la lista de materiales.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales = Inventario::join('materials', 'idinventario', '=', 'materials.idinventariofk')->get();
        return view('material.index',compact('materiales'));
    }

    /**
     * Muestra la forma para un nuevo material.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $material = new Inventario();
        $numero = Inventario::max('idinventario') +1;
        return view('material.create', compact('material'), compact('numero'));
    }

    /**
     * Guarda el material en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Establece la existencialidad del material verificando el numero ingresado
        if ($request->cantidadmaterial > 0) {
            $estadoInv = 'Con Existencias';
        }
        else {
            $estadoInv = 'Sin Existencias';
        }

        //Inserccion de la imagen
        $file = $request->file('fotoinventario');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move(public_path().'/Imagenes', $filename);

        $id = Inventario::insertGetId([
            'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
            'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => $filename,
            'estadoinventario' => $estadoInv, 'informacioninventario' => $request->informacioninventario
        
        ]);
        Material::insert([
            'idinventariofk' => $id, 'cantidadmaterial' => $request->cantidadmaterial
        ]);
        return redirect()->route('material.index');
    }

    /**
     * Muestra del material más en detalle.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $material)
    {
        $materialEleg = Inventario::join('materials', 'idinventario', '=', 'materials.idinventariofk')->where('idinventario', '=', $material->idinventario)->first();
        $material = $materialEleg;
        return view('material.show', compact('material'));
    }

    /**
     * Muestra la forma de edición de un material.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $material)
    {
        $materialEleg = Inventario::join('materials', 'idinventario', '=', 'materials.idinventariofk')->where('idinventario', '=', $material->idinventario)->first();
        $material = $materialEleg;
        $numero = null;
        return view('material.edit', compact('material'), compact('numero') );
    }

    /**
     * Actualiza el material en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Establece la existencialidad del material verificando el numero ingresado
        if ($request->cantidadmaterial > 0) {
            $estadoInv = 'Con Existencias';
        }
        else {
            $estadoInv = 'Sin Existencias';
        }
        $Material = Inventario::find($id);
        
        //Verifica si hay un ingreso de imagen nueva
        if ($request->hasfile('fotoinventario')) {
            $destination = public_path('Imagenes/'.$Material->fotoinventario);
            if (File::exists($destination)) {
                //Si existe la ruta, lo borra
                File::delete($destination);
            }

            //Insercción de la nueva imagen
            $file = $request->file('fotoinventario');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move(public_path().'/Imagenes', $filename);
        
            Inventario::where('idinventario', $id)
            ->update([
                'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario,  
                'fotoinventario' => $filename, 'estadoinventario' => $estadoInv, 
                'informacioninventario' => $request->informacioninventario
            ]);
            Material::where('idinventariofk', $id)
            ->update([
                'cantidadmaterial' => $request->cantidadmaterial
            ]);
        }
        //Si no, se actualiza el resto de información entregada excepto la nueva imagen
        else{
            Inventario::where('idinventario', $id)
            ->update([
                'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario,  
                'estadoinventario' => $estadoInv, 
                'informacioninventario' => $request->informacioninventario
            ]);
            Material::where('idinventariofk', $id)
            ->update([
                'cantidadmaterial' => $request->cantidadmaterial
            ]);
        }
        return redirect()->route('material.index');
    }

    /**
     * Borra el Material de la base de datos.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $material)
    {
        $Material = Inventario::find($material->idinventario);
        $destination = storage_path('Imagenes/'.$Material->fotoinventario);
            if (File::exists($destination)) {
                File::delete($destination);
            }
        $material->delete();
        return redirect()->route('material.index');
    }
}
