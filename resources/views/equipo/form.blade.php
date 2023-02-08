<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="row">
            <div class="col-md-4 mb-3">
                {{ Form::label('Codigo Equipo') }}
                {{ Form::text('codinventario', $equipo->codinventario, ['class' => 'form-control' . ($errors->has('RUN') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Equipo']) }}
                {!! $errors->first('RUN', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Nombre Equipo') }}
                {{ Form::text('nombreinventario', $equipo->nombreinventario, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Equipo']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-4 mb-3">
                {{ Form::label('Foto Inventario') }}
                {{ Form::text('fotoinventario', $equipo->fotoinventario, ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => 'Foto Equipo']) }}
                {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
                {{ Form::label('Tipo Inventario') }}
                {{ Form::text('tipoinventario', $equipo->tipoinventario, ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 mb-3">
                {{ Form::label('Estado Inventario') }}
                {{ Form::text('estadoinventario', $equipo->estadoinventario, ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-8 mb-3">
                {{ Form::label('Informacion Inventario') }}
                {{ Form::text('informacioninventario', $equipo->informacioninventario, ['class' => 'form-control' . ($errors->has('nomDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Equipo']) }}
                {!! $errors->first('nomDireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            
            
            
        </div>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" >Guardar</button>
    </div>
</div>