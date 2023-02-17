<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Material;
use App\Models\Movimiento;
use App\Models\MovimientoLista;
use App\Models\Responsable;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use function PHPSTORM_META\map;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $movimientos = Movimiento::get();
        //dd($movimientos);
        return view('movimiento.index',compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movimiento = new Movimiento();
        $numero = Movimiento::max('idmovimiento') +1;
        $cantMaterial = Material::get();
        $inventario = Inventario::where('estadoinventario', '=', 'Buenas Condiciones')->get();
        $selectedItems = ''; 
        //dd($inventario);
        return view('movimiento.create', compact('movimiento','numero','inventario','selectedItems','cantMaterial'));
    }
    public function entrada(Movimiento $movimiento){
        $movimientoNuevo = new Movimiento();
        $inventarioSelec = MovimientoLista::where('idmovimientofk', '=', $movimiento->idmovimiento)->get();
        return view('movimiento.entrada', compact('movimientoNuevo','inventarioSelec','movimiento'));
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
        $seleccionitems = json_decode(request('selected-items'), true);
        $idmov = Movimiento::insertGetId([
            'entregamovimiento' => $request->entregamovimiento, 'recepcionmovimiento' => $request->recepcionmovimiento, 
            'razonmovimiento'=> $request->razonmovimiento, 'tipomovimiento' => $request->tipomovimiento,
            'fechamovimiento' => now(), 'codmovimiento' => $request->codmovimiento  
        ]);
        
        foreach ($seleccionitems as $item){
            MovimientoLista::insert([
                'codinventario' => $item['codinventario'],
                'nombreinventario' => $item['nombreinventario'],
                'fotoinventario' => $item['fotoinventario'],
                'tipoinventario' => $item['tipoinventario'],
                'idmovimientofk' => $idmov
            ]);
            if ($item['tipoinventario'] == 'Material') {
                $numero =Material::select('cantidadmaterial')->where('idinventariofk', '=', $item['idinventario'])->first();
                $resta = $numero->cantidadmaterial - intval($item['cantidad']);
                if ($resta <= 0) {
                    Inventario::where('idinventario','=', $item['idinventario'])->update([
                        'estadoinventario' => 'Sin Existencias'
                    ]);
                    Material::select('cantidadmaterial')->where('idinventariofk', '=', $item['idinventario'])->update([
                        'cantidadmaterial' => $resta
                    ]);
                }else{
                    Material::select('cantidadmaterial')->where('idinventariofk', '=', $item['idinventario'])->update([
                        'cantidadmaterial' => $resta
                    ]);
                }
                
                
            }
            else {
                Inventario::where('idinventario','=', $item['idinventario'])->update([
                    'estadoinventario' => 'En Uso'
                ]);  
            }
        }
        return redirect()->route('movimiento.index');
    }
    public function entradainventario(Request $request){
        
        $seleccionitems = json_decode(request('selected_items_data'), true);
        //dd($seleccionitems);
        //dd(sizeof($seleccionitems));
        $idmov = Movimiento::insertGetId([
            'entregamovimiento' => $request->entregamovimiento, 'recepcionmovimiento' => $request->recepcionmovimiento, 
            'razonmovimiento'=> $request->razonmovimiento, 'tipomovimiento' => $request->tipomovimiento,
            'fechamovimiento' => now(), 'codmovimiento' => $request->codmovimiento  
        ]);
        for ($i = 0; $i<sizeof($seleccionitems); $i++){
            MovimientoLista::insert([
                'codinventario' => $seleccionitems[$i]['codinventario'],
                'nombreinventario'=> $seleccionitems[$i]['nombreinventario'],
                'fotoinventario' => $seleccionitems[$i]['fotoinventario'],
                'tipoinventario' => $seleccionitems[$i]['tipoinventario'],
                'idmovimientofk' => $idmov
            ]);
            Inventario::where('codinventario','=', $seleccionitems[$i]['codinventario'])->update([
                'estadoinventario' => 'En Buenas Condiciones'
            ]);

        }

        return redirect()->route('movimiento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Movimiento $movimiento)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimiento $movimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimiento $movimiento)
    {
        //
    }
    public function pdf(){
        $movimientos=Movimiento::all();
        $pdf = Pdf::loadview('movimiento.pdf',compact('movimientos'));
        return $pdf->stream();
    }
    public function search(Request $request){


        $fromDate = $request->input('fromDate');
        $toDate   = $request->input('toDate');
        $dato1 = $request->input('boton1');
        $dato2 = $request->input('boton2');
        $listamov = movimientolista::all();
        /**('idmovimientofk','=', $movimiento->idmovimiento) */
        if ($dato1 == 1){
        /**$query = Movimiento::where('fechamovimiento','>=',$fromDate)
        ->where('fechamovimiento','<=',$toDate) codigo que funciona*/
        /**$query = Movimiento::table('movimiento')
                ->join('movimientolista','movimiento.idmovimiento','=','movimientolista.idmovimientofk')
                ->select('movimiento.*')
                ->get();
                dd($query);*/
        $query = Movimiento::join('movimientolistas','movimientolistas.idmovimientofk','=','idmovimiento')
            ->where('movimientos.fechamovimiento','>=',$fromDate)
            ->where('movimientos.fechamovimiento','<=',$toDate)
            ->get();
        return view('movimiento.filtro',compact('query'));
        }
        else{

            $query = Movimiento::join('movimientolistas','movimientolistas.idmovimientofk','=','idmovimiento')
            ->where('movimientos.fechamovimiento','>=',$fromDate)
            ->where('movimientos.fechamovimiento','<=',$toDate)
            ->get();
        $pdf = Pdf::loadview('movimiento.filtro',compact('query'));
        
        return $pdf->stream();
        }
        

    }
}
