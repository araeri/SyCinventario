<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                {{ Form::label('Codigo Herramienta') }}
                {{ Form::text('codinventario', $herramienta->codinventario ?? 'Inv-'.str_pad(strval($numero), 6, '0', STR_PAD_LEFT), ['class' => 'form-control' . ($errors->has('codigoinventario') ? ' is-invalid' : ''), 'placeholder' => 'Codigo herramienta', 'readonly' => 'true']) }}
                {!! $errors->first('codinventario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Nombre Herramienta') }}
                {{ Form::text('nombreinventario', $herramienta->nombreinventario ?? '', ['class' => 'form-control' . ($errors->has('nombreinventario') ? ' is-invalid' : ''), 'id' => 'nombre-herramienta', 'placeholder' => 'Nombre herramienta']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Tipo Inventario') }}
                {{ Form::text('tipoinventario', 'Herramienta', ['class' => 'form-control' . ($errors->has('tipoinventario') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Inventario', 'readonly' => 'true']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                {{ Form::label('Foto Herramienta') }}
                {{ Form::file('fotoinventario', ['class' => 'form-control']) }}
                {!! $errors->first('fotoinventario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6 mb-3">
                {{ Form::label('Estado Herramienta') }}
                {{ Form::select('estadoinventario',['En Buenas Condiciones' => 'Disponible', 'En Uso'=> 'No Disponible', 'En Mantencion' => 'Mantencion', 'En Malas Condiciones' => 'Mal Estado'], ['class' => 'form-control' . ($errors->has('estadoinventario') ? ' is-invalid' : ''), 'placeholder' => 'Estado Herramienta'], ['class' => 'form-select']) }}
                {!! $errors->first('estadoinventario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-12 mb-3">
                {{ Form::label('Información Herramienta') }}
                {{ Form::textarea('informacioninventario', $herramienta->informacioninventario ?? '', ['class' => 'form-control' . ($errors->has('informacioninventario') ? ' is-invalid' : ''), 'id' => 'informacion-herramienta', 'placeholder' => 'Ingrese información de la herramienta...']) }}
                {!! $errors->first('informacioninventario', '<div class="invalid-feedback">:message</div>') !!}
            </div>           
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" >Guardar</button>
    </div>
</div>