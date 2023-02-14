@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Movimientos</span>
            <div class="float-right">
                <a href="{{ route('movimiento.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    <i class="fas fa-add"></i> {{ __('Nuevo') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
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