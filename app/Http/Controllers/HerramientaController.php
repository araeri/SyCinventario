<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HerramientaController extends Controller
{
    /**
     * Muestra el listado de herramientas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $herramientas = Inventario::where('tipoinventario', '=', 'Herramienta')->get();
        return view('herramienta.index',compact('herramientas'));
    }

    /**
     * Muestra la forma para crear una nueva herramienta.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $herramienta = new Herramienta();
        $numero = Inventario::max('idinventario') +1;
        return view('herramienta.create', compact('herramienta'), compact('numero'));
    }

    /**
     * Guerda la nueva herramienta en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Revisa si hay una imagen insertandose
        if ($request->hasfile('fotoinventario')) {
            $file = $request->file('fotoinventario');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move(public_path().'/Imagenes', $filename);

            Inventario::insert([
                'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
                'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => $filename,
                'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario
            ]);
        }
        //Si no, se incluye una imagen por defecto para mostrar.
        else{
            Inventario::insert([
                'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
                'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => 'sinimagen.jpg',
                'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario
            ]);
        } 
        return redirect()->route('herramienta.index');
    }

    /**
     * Muestra una herramienta en específico.
     *
     * @param  \App\Models\Herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $herramientum)
    {
        $herramienta = Inventario::where("idinventario", "=",$herramientum->idinventario )->first();
        return view('herramienta.show', compact('herramienta'));
    }

    /**
     * Muestra la forma para actualizar la herramienta.
     *
     * @param  \App\Models\Herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $herramientum)
    {
        $numero = null;
        $herramienta = $herramientum;
        return view('herramienta.edit', compact('herramienta'), compact('numero') );
    }

    /**
     * Actualia la herramienta en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idinventario)
    {
        $Herramienta = Inventario::find($idinventario);
        //Revisa si hay una subida de imagen
        if ($request->hasfile('fotoinventario')) {
            //Si la imagen a cambiar es la defecto, solamente le cambia el nombre
            if ($Herramienta->fotoinventario == 'sinimagen.jpg') {
                $file = $request->file('fotoinventario');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move(public_path().'/Imagenes', $filename);

                Inventario::where('idinventario','=', $idinventario)->update([
                    'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
                    'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => $filename,
                    'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario
                ]);
            }
            //si no, reemplaza la imagen con la nueva imagen
            else{
                $destination = public_path('Imagenes/'.$Herramienta->fotoinventario);
                if (File::exists($destination)) {
                    //Si hay, lo borra
                    File::delete($destination);
                }

                //Inserccion de nueva imagen
                $file = $request->file('fotoinventario');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move(public_path().'/Imagenes', $filename);
            
                Inventario::where('idinventario','=', $idinventario)->update([
                    'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
                    'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => $filename,
                    'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario
                ]);
            }   
        }
        //Si no, Sube los otros datos respectivos.
        else{
            Inventario::where('idinventario','=', $idinventario)->update([
                'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
                'tipoinventario'=> $request->tipoinventario, 
                'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario
            ]);
        }
        return redirect()->route('herramienta.index');
    }

    /**
     * Remueve la herramienta de la base de datos.
     *
     * @param  \App\Models\Herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $herramientum)
    {
        $Equipo = Inventario::find($herramientum->idinventario);
        $destination = storage_path('Imagenes/'.$Equipo->fotoinventario);
            if (File::exists($destination)) {
                File::delete($destination);
            }
        $herramientum->delete();
        return redirect()->route('herramienta.index');
    }
}
