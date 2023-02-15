<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $numero = Inventario::max('idinventario') +1;
        return view('herramienta.create', compact('herramienta'), compact('numero'));
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
        $herramienta = $request->except('_token');
        Inventario::insert([
            'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
            'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => $filename,
            'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario
        
        ]);
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
        $numero = null;
        $herramienta = $herramientum;

        return view('herramienta.edit', compact('herramienta'), compact('numero') );
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
        $Herramienta = Inventario::find($idinventario);
        if ($request->hasfile('fotoinventario')) {
            $destination = storage_path('Imagenes\\'.$Herramienta->fotoinventario);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('fotoinventario');
            $extention = $file->getClientOriginalExtension();
            $filename = '/'.time().'.'.$extention;
            $file->move(public_path().'/Imagenes', $filename);
        }
        $datosHerramienta = $request->except(['_token','_method']);
        //dd($id);
        Inventario::where('idinventario','=', $idinventario)->update([
            'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
            'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => $filename,
            'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario
        
        ]);

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
        $Equipo = Inventario::find($herramientum->idinventario);
        $destination = storage_path('Imagenes\\'.$Equipo->fotoinventario);
            if (File::exists($destination)) {
                File::delete($destination);
            }
        //dd($herramientum);
        $herramientum->delete();
        return redirect()->route('herramienta.index');
    }
}
