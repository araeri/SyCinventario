@extends('layouts.app')
@section('content')
<script>
  $(document).ready(function() {
   
    $('#form').submit(function(event) {
        // Validate EntradaMovimiento, SalidaMovimiento, and RazonMovimiento
        var nombreVehiculo = $('#nombre-vehiculo').val();
        var informacionVehiculo = $('#informacion-vehiculo').val();
        var tipoVehiculo = $('#tipo-vehiculo').val();
        var patenteVehiculo = $('#patente-vehiculo').val();
        if (nombreVehiculo === '' || informacionVehiculo === ''||tipoVehiculo === ''|| patenteVehiculo === '') {
            alert('Please fill out all fields');
            event.preventDefault();
            return false;
        }
    });
  });
</script>
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Editar</span>
            <div class="float-right">
                <a href="{{ route('vehiculo.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    {{ __('Volver') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ url('/vehiculo/'.$vehiculo->idinventariofk) }}" enctype="multipart/form-data" id ="form">
            @csrf
            {{ method_field('PATCH')}}
            
            @include('vehiculo.form')
        </form>
    </div>
</div>
@endsection