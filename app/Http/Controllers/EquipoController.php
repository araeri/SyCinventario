<?php
namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EquipoController extends Controller
{
    /**
     * Muestra el inventario con tipo de inventario 'Equipo'.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $equipos = Inventario::where('tipoinventario', '=', 'Equipo')->get() ;
        return view('equipo.index',compact('equipos'));
    }

    /**
     * Muestra la creación de un nuevo equipo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipo = new Equipo();
        $numero = Inventario::max('idinventario') +1;
        return view('equipo.create', compact('equipo'), compact('numero'));
    }

    /**
     * Guarda la creación de un nuevo equipo.
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
        else {
            Inventario::insert([
                'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
                'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => 'sinimagen.jpg',
                'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario
            ]);
        }
        return redirect()->route('equipo.index');
    }

    /**
     * Muestra el equipo en específico.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $equipo)
    {
        $equipo = Inventario::where("idinventario", "=",$equipo->idinventario )->first();
        return view('equipo.show', compact('equipo'));
    }

    /**
     * Muesta la forma de edición del equipo.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $equipo)
    {
        $numero = null;
        return view('equipo.edit', compact('equipo'), compact('numero') );
    }

    /**
     * Actualiza el equipo en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idinventario)
    {
        $Equipo = Inventario::find($idinventario);

        //Revisa si hay una subida de imagen nueva
        if ($request->hasfile('fotoinventario')) {
            
            //Si la imagen a cambiar es la defecto, solamente le cambia el nombre
            if ($Equipo->fotoinventario == 'sinimagen.jpg') {
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
            //si no, reemplaza la imagen con la nueva imagen.
            else{
                
                $destination = public_path('Imagenes/'.$Equipo->fotoinventario);
                if (File::exists($destination)) {
                    //Lo Elimina
                    File::delete($destination);
                }
                
                //Realiza la nueva inserccion
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
        //Si no, actualiza los otros datos 
        else{
            Inventario::where('idinventario','=', $idinventario)->update([
                'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
                'tipoinventario'=> $request->tipoinventario, 
                'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario
            ]);
        }
        return redirect()->route('equipo.index');
    }

    /**
     * Borra el equipo de la base.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $equipo)
    {
        $Equipo = Inventario::find($equipo->idinventario);
        $destination = storage_path('Imagenes/'.$Equipo->fotoinventario);
            if (File::exists($destination)) {
                File::delete($destination);
            }
        $equipo->delete();
        return redirect()->route('equipo.index');
    }
}