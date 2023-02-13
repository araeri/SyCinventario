<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="row">
            <div class="col-md-4 mb-3">
                {{ Form::label('Nombre Entrega') }}
                {{ Form::text('nomentresponsable', $movimiento->nomentresponsable, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Equipo']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Nombre Recepción') }}
                {{ Form::text('nomrecepresponsable', $movimiento->nomrecepresponsable, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Equipo']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Id Inventario') }}
                {{ Form::text('razonresponsable', $movimiento->razonresponsable, ['class' => 'form-control' . ($errors->has('RUN') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Equipo']) }}
                {!! $errors->first('RUN', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
                {{ Form::label('Tipo Movimiento') }}
                {{ Form::text('tipomovimiento', $movimiento->tipomovimiento, ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 mb-3">
                {{ Form::label('Seleccion Inventario') }}
                {{ Form::text('seleccioninventario', $movimiento->seleccioninventario, ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div>NO ESTA TERMINADO EL RELLENO DE DATOS A</div>
            
            
        </div>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" >Guardar</button>
    </div>
</div>