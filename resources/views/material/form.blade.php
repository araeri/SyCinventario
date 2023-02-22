<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                {{ Form::label('Codigo Material') }}
                {{ Form::text('codinventario', $material->codinventario ?? 'Inv-'.str_pad(strval($numero), 6, '0', STR_PAD_LEFT) , ['class' => 'form-control' . ($errors->has('codinventario') ? ' is-invalid' : ''), 'placeholder' => 'Codigo material', 'readonly' => 'true']) }}
                {!! $errors->first('RUN', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Nombre Material') }}
                {{ Form::text('nombreinventario', $material->nombreinventario ?? '', ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'id' => 'nombre-material', 'placeholder' => 'Nombre material']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Tipo Inventario') }}
                {{ Form::text('tipoinventario', 'Material', ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Tipo inventario', 'readonly' => 'true']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                {{ Form::label('Foto Material') }}
                {{ Form::file('fotoinventario',['class'=>'form-control ']) }}
                {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Estado Material') }}
                {{ Form::select('estadoinventario',['Con Existencias' => 'Con Existencias', 'Sin Existencias'=> 'Sin Existencias'], ['class' => 'form-control' . ($errors->has('estadoinventario') ? ' is-invalid' : ''), 'placeholder' => 'Estado material'],['class' => 'form-select']) }}
                {!! $errors->first('estadoinventario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Cantidad Material') }}
                {{ Form::number('cantidadmaterial', $material->cantidadmaterial ?? '', ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'id' => 'cantidad-material', 'placeholder' => 'Cantidad material']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-12 mb-3">
                {{ Form::label('Información Material') }}
                {{ Form::textarea('informacioninventario', $material->informacioninventario ?? '', ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''),'id' => 'informacion-material', 'placeholder' => 'Ingrese información del material...']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" >Guardar</button>
    </div>
</div>