<div class="box box-info padding-1">
    <div class="box-body">    
        <div class="row">
            <div class="col-md-4 mb-3">
                {{ Form::label('Codigo Vehículo') }}
                {{ Form::text('codinventario', $vehiculo->codinventario ?? 'Inv-'.str_pad(strval($numero), 6, '0', STR_PAD_LEFT), ['class' => 'form-control' . ($errors->has('RUN') ? ' is-invalid' : ''), 'placeholder' => 'Codigo vehículo', 'readonly' => 'true']) }}
                {!! $errors->first('RUN', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Nombre Vehículo') }}
                {{ Form::text('nombreinventario', $vehiculo->nombreinventario ?? '', ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'id' => 'nombre-vehiculo', 'placeholder' => 'Nombre vehículo']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Tipo Inventario') }}
                {{ Form::text('tipoinventario', 'Vehiculo', ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado vehículo', 'readonly' => 'true']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                {{ Form::label('Foto Vehículo')}}<br>
                {{ Form::file('fotoinventario',['class'=>'form-control '])}}
                {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6 mb-3">
                {{ Form::label('Patente Vehículo') }}
                {{ Form::text('patentevehiculo', $vehiculo->patentevehiculo ?? '', ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'id' => 'patente-vehiculo', 'placeholder' => 'Estado vehículo']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6 mb-3">
                {{ Form::label('Estado Vehículo') }}
                {{ Form::select('estadoinventario',['En Buenas Condiciones' => 'Disponible', 'En Uso'=> 'No Disponible', 'En Mantencion' => 'Mantencion', 'En Malas Condiciones' => 'Mal Estado'], ['class' => 'form-control' . ($errors->has('estadoinventario') ? ' is-invalid' : ''), 'placeholder' => 'Estado vehículo'],['class' => 'form-select']) }}
                {!! $errors->first('estadoinventario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6 mb-3">
                {{ Form::label('Tipo Vehículo') }}
                {{ Form::select('tipovehiculo', ['Ligero' => 'Ligero', 'Pesado'=> 'Pesado'], ['class' => '' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'id'=> 'tipo-vehiculo', 'placeholder' => 'Tipo vehículo'], ['class' => 'form-select']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-12 mb-3">
                {{ Form::label('Información Vehículo') }}
                {{ Form::textarea('informacioninventario', $vehiculo->informacioninventario ?? '', ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'id' => 'informacion-vehiculo', 'placeholder' => 'Ingrese información del vehículo...']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>        
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" >Guardar</button>
    </div>
</div>