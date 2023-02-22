<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Material;
use App\Models\Movimiento;
use App\Models\MovimientoLista;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use function PHPSTORM_META\map;

class MovimientoController extends Controller
{
    /**
     * Muestra la lista de movimientos.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $movimientos = Movimiento::get();
        return view('movimiento.index',compact('movimientos'));
    }

    /**
     * Muestra la forma para crear un nuevo movimiento de SALIDA.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movimiento = new Movimiento();
        $numero = Movimiento::max('idmovimiento') +1;
        $cantMaterial = Material::get();
        $inventario = Inventario::where('estadoinventario', '=', 'Buenas Condiciones')->orWhere('estadoinventario','=', 'Con Existencias')->get();
        $selectedItems = ''; 
        return view('movimiento.create', compact('movimiento','numero','inventario','selectedItems','cantMaterial'));
    }

    /**
     * Muestra la forma para crear un nuevo movimiento de ENTRADA.
     */
    public function entrada(Movimiento $movimiento){
        $movimientoNuevo = new Movimiento();
        $inventarioSelec = MovimientoLista::where('idmovimientofk', '=', $movimiento->idmovimiento)->get();
        return view('movimiento.entrada', compact('movimientoNuevo','inventarioSelec','movimiento'));
    }

    /**
     * Guarda el nuevo movimiento de SALIDA a la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

            //Verificamos si el tipo de inventario es un 'Material'
            if ($item['tipoinventario'] == 'Material') {
                $numero =Material::select('cantidadmaterial')->where('idinventariofk', '=', $item['idinventario'])->first();

                //Restamos la cantidad guardada con la cantidad que vamos a pedir.
                $resta = $numero->cantidadmaterial - intval($item['cantidad']);

                //Si es menor a 0..
                if ($resta <= 0) {
                    //Significa que ya no quedan.
                    Inventario::where('idinventario','=', $item['idinventario'])->update([
                        'estadoinventario' => 'Sin Existencias'
                    ]);
                    
                    //Se coloca en nuevo numero
                    Material::select('cantidadmaterial')->where('idinventariofk', '=', $item['idinventario'])->update([
                        'cantidadmaterial' => $resta
                    ]);
                }
                //Si no, solamente se coloca la nueva cantidad restante.
                else{
                    Material::select('cantidadmaterial')->where('idinventariofk', '=', $item['idinventario'])->update([
                        'cantidadmaterial' => $resta
                    ]);
                }
            }
            //Si no es un material..
            else {
                //Actualizamos el material pertinente.
                Inventario::where('idinventario','=', $item['idinventario'])->update([
                    'estadoinventario' => 'En Uso'
                ]);  
            }
        }
        return redirect()->route('movimiento.index');
    }
    /**
     * Guarda el nuevo movimiento de ENTRADA en la base de datos.
     */
    public function entradainventario(Request $request){

        //Se considera que los inventarios con tipo inventario "Material" no se devuelven.
        $seleccionitems = json_decode(request('selected_items_data'), true);
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
    
    /**
     * Contiene la busqueda de movimientos por fecha y también la generación de PDF también por fecha
     */
    public function search(Request $request){
        $fromDate = $request->input('fromDate');
        $toDate   = $request->input('toDate');
        $dato1 = $request->input('boton1');
        $dato2 = $request->input('boton2');
        $listamov = movimientolista::all();

        //Si el dato es el botón presionado 1 o 'Filtrar por fecha'
        if ($dato1 == 1){
            //Se filtra los datos por la fecha
            $query = Movimiento::join('movimientolistas','movimientolistas.idmovimientofk','=','idmovimiento')
                ->where('movimientos.fechamovimiento','>=',$fromDate)
                ->where('movimientos.fechamovimiento','<=',$toDate)
                ->get();
            return view('movimiento.filtro',compact('query'));
        }
        //Si el dato es el botón presionado 2 o 'Generar PDF'
        else{
            //Se genera un PDF usando el filtro por fecha
            $query = Movimiento::join('movimientolistas','movimientolistas.idmovimientofk','=','idmovimiento')
            ->where('movimientos.fechamovimiento','>=',$fromDate)
            ->where('movimientos.fechamovimiento','<=',$toDate)
            ->get();
            $pdf = Pdf::loadview('movimiento.pdf',compact('query'));
        return $pdf->stream();
        }
    }
}