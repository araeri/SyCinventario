<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\Inventario;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales = Inventario::join('materials', 'idinventario', '=', 'materials.idinventariofk')->get();
        //dd($materiales);
        return view('material.index',compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $material = new Inventario();
        return view('material.create', compact('material'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $id = Inventario::insertGetId([
            'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario, 
            'tipoinventario'=> $request->tipoinventario, 'fotoinventario' => $request->fotoinventario,
            'estadoinventario' => $request->estadoinventario, 'informacioninventario' => $request->informacioninventario]
            
        );
        Material::insert([
            'idinventariofk' => $id, 'cantidadmaterial' => $request->cantidadmaterial
        ]);
        return redirect()->route('material.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $material)
    {
        $materialEleg = Inventario::join('materials', 'idinventario', '=', 'materials.idinventariofk')->where('idinventario', '=', $material->idinventario)->first();
        //$herramienta = $herramientum;
        $material = $materialEleg;
        //dd($material);
        return view('material.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $material)
    {
        $materialEleg = Inventario::join('materials', 'idinventario', '=', 'materials.idinventariofk')->where('idinventario', '=', $material->idinventario)->first();
        //$herramienta = $herramientum;
        $material = $materialEleg;
        //dd($material);
        return view('material.edit', compact('material') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($id);
        Inventario::where('idinventario', $id)
        ->update([
            'codinventario' => $request->codinventario, 'nombreinventario' => $request->nombreinventario,  
            'fotoinventario' => $request->fotoinventario, 'estadoinventario' => $request->estadoinventario, 
            'informacioninventario' => $request->informacioninventario
        ]);
        Material::where('idinventariofk', $id)
        ->update([
            'cantidadmaterial' => $request->cantidadmaterial

        ]);
        return redirect()->route('material.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $material)
    {
        //dd($material);
        $material->delete();
        return redirect()->route('material.index');
    }
}
