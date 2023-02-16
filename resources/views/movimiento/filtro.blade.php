@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Herramientas</span>
            <div class="float-right">
                <a href="{{ route('movimiento.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    {{ __('Volver') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle bg-white table-hover table-borderless">
                <thead class="bg-light text-secondary">
                    <tr>
                        <th>ID movimiento</th>
                        <th>Nombre de inventario</th>
                        <th>Entrega del movimiento</th>
                        <th>Recepcion del movimiento</th>
                        <th>Razón Movimiento</th>
                        <th>Tipo de movimiento</th>
                        <th>Fecha de movimiento</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($query as $movimiento)
                    <tr>
                    <td>{{ $movimiento->idmovimiento}}</td>
                    <td>{{ $movimiento->nombreinventario}}</td>
                    <td>{{ $movimiento->entregamovimiento}}</td>
                    <td>{{ $movimiento->recepcionmovimiento }}</td>
                    <td>{{ $movimiento->razonmovimiento }}</td>
                    <td>{{ $movimiento->tipomovimiento}}</td>
                    <td>{{ $movimiento->fechamovimiento}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
