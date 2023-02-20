<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="row">
            <div class="col-md-4 mb-3">
                {{ Form::label('Codigo Equipo') }}
                {{ Form::text('codinventario', $equipo->codinventario ?? 'Inv-'.str_pad(strval($numero), 6, '0', STR_PAD_LEFT) , ['class' => 'form-control' . ($errors->has('codinventario') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Equipo', 'readonly' => 'true']) }}
                {!! $errors->first('codinventario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Nombre Equipo') }}
                {{ Form::text('nombreinventario', $equipo->nombreinventario ?? '', ['class' => 'form-control' . ($errors->has('nombreinventario') ? ' is-invalid' : ''),'id' => 'nombre-equipo', 'placeholder' => 'Nombre Equipo']) }}
                {!! $errors->first('nombreinventario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                <input type="file" value="{{ asset('Imagenes' . $equipo->fotoinventario) }}" name ="fotoinventario" class="form-control" id = 'foto-inventario'>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
                {{ Form::label('Tipo Inventario') }}
                {{ Form::text('tipoinventario', 'Equipo', ['class' => 'form-control' . ($errors->has('tipoinventario') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Inventario', 'readonly' => 'true']) }}
                {!! $errors->first('tipoinventario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 mb-3">
                {{ Form::label('Estado Equipo') }}
                {{ Form::select('estadoinventario',['En Buenas Condiciones' => 'Disponible', 'En Uso'=> 'No Disponible', 'En Mantencion' => 'Mantencion', 'En Malas Condiciones' => 'Mal Estado'], ['class' => 'form-control' . ($errors->has('estadoinventario') ? ' is-invalid' : ''), 'placeholder' => 'Estado Herramienta']) }}
                {!! $errors->first('estadoinventario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 mb-3">
                {{ Form::label('Informacion Inventario') }}
                {{ Form::text('informacioninventario', $equipo->informacioninventario ?? '', ['class' => 'form-control' . ($errors->has('informacioninventario') ? ' is-invalid' : ''), 'id' => 'informacion-equipo', 'placeholder' => 'Estado Equipo']) }}
                {!! $errors->first('informacioninventario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            
            
            
        </div>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" >Guardar</button>
    </div>
</div>