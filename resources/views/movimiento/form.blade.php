<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="row">
            <div class="col-md-4 mb-3">
                {{ Form::label('Codigo Movimiento') }}
                {{ Form::text('codmovimiento', $movimiento->codmovimiento ?? 'Mov-'.str_pad(strval($numero), 6, '0', STR_PAD_LEFT) , ['class' => 'form-control' . ($errors->has('codinventario') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Equipo', 'readonly' => 'true']) }}
                {!! $errors->first('RUN', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Nombre Entrega') }}
                {{ Form::text('entregamovimiento', $movimiento->entregamovimiento ?? '', ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'id' => 'entrada-movimiento',  'placeholder' => 'Nombre Equipo']) }}
                {!! $errors->first('entregamovimiento', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Nombre Recepción') }}
                {{ Form::text('recepcionmovimiento', $movimiento->recepcionmovimiento ?? '', ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'id' => 'salida-movimiento', 'placeholder' => 'Nombre Equipo']) }}
                {!! $errors->first('recepcionmovimiento', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Razón Movimiento') }}
                {{ Form::text('razonmovimiento', $movimiento->razonmovimiento ?? '', ['class' => 'form-control' . ($errors->has('RUN') ? ' is-invalid' : ''), 'id' => 'razon-movimiento',  'placeholder' => 'Codigo Equipo']) }}
                {!! $errors->first('razonmovimiento', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                <select id= 'item-select'>
                    <option> Selecciona un Objeto </option>
                    @foreach ($inventario as $objeto)
                        <option value="{{$objeto->idinventario}}">{{$objeto->nombreinventario}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
                {{ Form::label('Tipo Movimiento') }}
                {{ Form::text('tipomovimiento', 'Salida', ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo', 'readonly' => 'true']) }}
                {!! $errors->first('tipomovimiento', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            
            
        </div>
        <input type="hidden" name="selected-items" id="selected-items-input" value="">
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" >Guardar</button>
    </div>
</div>