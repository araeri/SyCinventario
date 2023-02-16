@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Movimientos</span>
            <div class="float-right">
                <!--<a href="{{ route('movimiento.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    <i class="fas fa-add"></i> {{ __('Nuevo') }}
                </a>--->
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('movimiento.search')}}" method="POST">
            @csrf  
            <br>
            <div class="container">
                <div class="row">
                    <div class="container-fluid">
                        <div class="form-group row">
                            <label for="date" class="col-form-label col-sm-2">Informes desde</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required>
                            </div>
                            <label for="date" class="col-form-label col-sm-2">Informes hasta</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control input-sm" id="toDate" name="toDate" required>
                            </div>
                            <div class="col-sm-2">
                            <button class="btn btn btn-secondary" type="submit" id="boton1" name="boton1" value="1" >Buscar por Fecha</button>
                            </div>
                            <div class="col-sm-2">
                            <button class="btn btn-danger" type="submit" id="boton2" name="boton2" value="2" >Generar PDF</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="table-responsive mt-3">
            <table class="table align-middle bg-white table-hover table-borderless">
                <thead class="bg-light text-secondary">
                    <tr>
                        <th>Entrega Movimiento</th>
                        <th>Recepcion Movimiento</th>
                        <th>Tipo Movimiento</th>
                        <th>Razón Movimiento</th>
                        <th>Fecha Movimiento</th>

                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movimientos as $movimiento)
                        <tr>
                            <td>{{ $movimiento->entregamovimiento }}</td>
                            <td>{{ $movimiento->recepcionmovimiento }}</td>
                            <td>{{ $movimiento->tipomovimiento}}</td>
                            <td>{{ $movimiento->razonmovimiento}}</td>
                            <td>{{ $movimiento->fechamovimiento}}</td>
                            <td>
                                    <a class="btn btn-sm btn-primary " href="{{ route('movimientolista.show',$movimiento->idmovimiento) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
