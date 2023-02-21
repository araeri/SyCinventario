<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
  $(document).ready(function() {
   
    $('#form').submit(function(event) {
        // Validate EntradaMovimiento, SalidaMovimiento, and RazonMovimiento
        var entradaMovimiento = $('#entrada-movimiento').val();
        var salidaMovimiento = $('#salida-movimiento').val();
        var razonMovimiento = $('#razon-movimiento').val();
        console.log(entradaMovimiento);
        if (entradaMovimiento === '' || salidaMovimiento === '' || razonMovimiento === '') {
            alert('Please fill out all fields');
            event.preventDefault();
            return false;
        }
    });
  });
</script>
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Movimientos</span>
            <div class="float-right">
                <a href="{{ route('movimiento.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    {{ __('Volver') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" class="row g-3" action="{{ route('movimiento.entradainventario') }}"  role="form" enctype="multipart/form-data" id="form">
            @csrf
            <div class="box box-info padding-1">
                <div class="box-body">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            {{ Form::label('Codigo Movimiento') }}
                            {{ Form::text('codmovimiento', $movimiento->codmovimiento, ['class' => 'form-control' . ($errors->has('codinventario') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Equipo', 'readonly' => 'true']) }}
                            {!! $errors->first('codmovimiento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-6 mb-3">
                            {{ Form::label('Nombre Entrega') }}
                            {{ Form::text('entregamovimiento', $movimientoNuevo->entregamovimiento ?? '', ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'id' => 'entrada-movimiento', 'placeholder' => 'Nombre Equipo']) }}
                            {!! $errors->first('entregamovimiento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-6 mb-3">
                            {{ Form::label('Nombre Recepción') }}
                            {{ Form::text('recepcionmovimiento', $movimientoNuevo->recepcionmovimiento ?? '', ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'id' => 'salida-movimiento', 'placeholder' => 'Nombre Equipo']) }}
                            {!! $errors->first('recepcionmovimiento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-6 mb-3">
                            {{ Form::label('Razón Movimiento') }}
                            {{ Form::text('razonmovimiento', $movimientoNuevo->razonmovimiento ?? '', ['class' => 'form-control' . ($errors->has('RUN') ? ' is-invalid' : ''), 'id' => 'razon-movimiento', 'placeholder' => 'Codigo Equipo']) }}
                            {!! $errors->first('razonmovimiento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            {{ Form::label('Tipo Movimiento') }}
                            {{ Form::text('tipomovimiento', 'Entrada', ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo', 'readonly' => 'true']) }}
                            {!! $errors->first('tipomovimiento', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        
                        
                    </div>
                    <input type="hidden" name="selected_items_data"  value="{{$inventarioSelec}}">
                    

                </div>
                <div class="box-footer mt20">
                    <button type="submit" class="btn btn-primary" >Guardar</button>
                </div>
            </div>
        </form> 
        <div class="container">
            <div class="row justify-content-between">
                @foreach($inventarioSelec as $invent)
                <div class="col">
                    <h6 class="fw-bold">{{ $invent->tipoinventario }}</h6>
                    <p>{{ $invent->nombreinventario }}</p>
                    <p>{{ $invent->informacioninventario }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection