<div class="box box-info padding-1">
<div class="box-body">
        
        <div class="row">
            <div class="col-md-4 mb-3">
                {{ Form::label('Codigo Vehiculo') }}
                {{ Form::text('codinventario', $vehiculo->codinventario, ['class' => 'form-control' . ($errors->has('RUN') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Equipo']) }}
                {!! $errors->first('RUN', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Nombre Vehiculo') }}
                {{ Form::text('nombreinventario', $vehiculo->nombreinventario, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Equipo']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Foto Vehiculo') }}
                {{ Form::file('fotoinventario') }}
                {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
                {{ Form::label('Tipo Inventario') }}
                {{ Form::text('tipoinventario', 'Vehiculo', ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo', 'readonly' => 'true']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 mb-3">
                {{ Form::label('Estado Vehiculo') }}
                {{ Form::text('estadoinventario', $vehiculo->estadoinventario, ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 mb-3">
                {{ Form::label('Informacion Vehiculo') }}
                {{ Form::text('informacioninventario', $vehiculo->informacioninventario, ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 mb-3">
                {{ Form::label('Tipo Vehiculo') }}
                {{ Form::text('tipovehiculo', $vehiculo->tipovehiculo, ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 mb-3">
                {{ Form::label('Patente Vehiculo') }}
                {{ Form::text('patentevehiculo', $vehiculo->patentevehiculo, ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            
        </div>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" >Guardar</button>
    </div>
</div>