
@extends('layouts.app')
@section('content')
<script>
  $(document).ready(function() {
   
    $('#form').submit(function(event) {
        var nombreEquipo = $('#nombre-equipo').val();
        var informacionEquipo = $('#informacion-equipo').val();
        if (nombreEquipo === '' || informacionEquipo === '') {
            alert('Please fill out all fields');
            event.preventDefault();
            return false;
        }
    });
  });
</script>
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Editar</span>
            <div class="float-right">
                <a href="{{ route('equipo.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    {{ __('Volver') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ url('/equipo/'.$equipo->idinventario) }}" enctype="multipart/form-data" id="form">
            @csrf
            {{ method_field('PATCH')}}
            
            @include('equipo.form')
        </form>
    </div>
</div>
@endsection