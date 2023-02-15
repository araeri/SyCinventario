
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Ver</span>
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
                        <th>Codigo Inventario</th>
                        <th>Nombre Inventario</th>
                        <th>Foto Inventario</th>
                        <th>Tipo Inventario</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($listaMovimientos as $lista)
                        <tr>
                            <td>{{ $lista->codinventario }}</td>
                            <td>{{ $lista->nombreinventario }}</td>
                            <td>{{ $lista->fotoinventario}}</td>
                            <td>{{ $lista->tipoinventario}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
