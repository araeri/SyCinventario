<?php
namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Inventario::where('tipoinventario', '=', 'Equipo')->get() ;
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
        $numero = Inventario::max('idinventario') +1;

        return view('equipo.create', compact('equipo'), compact('numero'));
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
        Inventario::insert([
            'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
            'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => $filename,
            'estadoinventario' => 'En Buenas Condiciones', 'informacioninventario' => $request->informacioninventario
        
        ]);
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
        $numero = null;
        return view('equipo.edit', compact('equipo'), compact('numero') );
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
        $Equipo = Inventario::find($idinventario);
        if ($request->hasfile('fotoinventario')) {
            $destination = storage_path('Imagenes\\'.$Equipo->fotoinventario);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('fotoinventario');
            $extention = $file->getClientOriginalExtension();
            $filename = '/'.time().'.'.$extention;
            $file->move(public_path().'/Imagenes', $filename);
        }

        $datosEquipo = $request->except(['_token','_method']);
        Inventario::where('idinventario','=', $idinventario)->update([
            'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
            'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => $filename,
            'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario
        
        ]);

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
        $Equipo = Inventario::find($equipo->idinventario);
        $destination = storage_path('Imagenes\\'.$Equipo->fotoinventario);
            if (File::exists($destination)) {
                File::delete($destination);
            }
        //dd($equipo);
        $equipo->delete();
        return redirect()->route('equipo.index');
    }
}
