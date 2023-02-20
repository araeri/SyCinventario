<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="row">
            <div class="col-md-4 mb-3">
                {{ Form::label('Codigo Material') }}
                {{ Form::text('codinventario', $material->codinventario ?? 'Inv-'.str_pad(strval($numero), 6, '0', STR_PAD_LEFT) , ['class' => 'form-control' . ($errors->has('codinventario') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Equipo', 'readonly' => 'true']) }}
                {!! $errors->first('RUN', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Nombre Material') }}
                {{ Form::text('nombreinventario', $material->nombreinventario ?? '', ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'id' => 'nombre-material', 'placeholder' => 'Nombre Equipo']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Foto Material') }}
                {{ Form::file('fotoinventario') }}
                {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
                {{ Form::label('Tipo Inventario') }}
                {{ Form::text('tipoinventario', 'Material', ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo', 'readonly' => 'true']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 mb-3">
                {{ Form::label('Estado Material') }}
                {{ Form::select('estadoinventario',['Con Existencias' => 'Con Existencias', 'Sin Existencias'=> 'Sin Existencias'], ['class' => 'form-control' . ($errors->has('estadoinventario') ? ' is-invalid' : ''), 'placeholder' => 'Estado Material']) }}
                {!! $errors->first('estadoinventario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 mb-3">
                {{ Form::label('Informacion Material') }}
                {{ Form::text('informacioninventario', $material->informacioninventario ?? '', ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''),'id' => 'informacion-material', 'placeholder' => 'Estado Equipo']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 mb-3">
                {{ Form::label('Cantidad Material') }}
                {{ Form::number('cantidadmaterial', $material->cantidadmaterial ?? '', ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'id' => 'cantidad-material', 'placeholder' => 'Estado Equipo']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            
            
            
        </div>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" >Guardar</button>
    </div>
</div>