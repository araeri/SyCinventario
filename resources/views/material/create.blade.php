@extends('layouts.app')
@section('content')
<script>
  $(document).ready(function() {
   
    $('#form').submit(function(event) {
        // Validate EntradaMovimiento, SalidaMovimiento, and RazonMovimiento
        var nombreMaterial = $('#nombre-material').val();
        var informacionMaterial = $('#informacion-material').val();
        var cantidadMaterial = $('#cantidad-material').val();
        if (nombreMaterial === '' || informacionMaterial === ''|| cantidadMaterial === '') {
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
            <span id="card_title">Crear</span>
            <div class="float-right">
                <a href="{{ route('material.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    {{ __('Volver') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" class="row g-3" action="{{ route('material.store') }}"  role="form" enctype="multipart/form-data" id="form">
            @csrf

            @include('material.form')

        </form>
    </div>
</div>
@endsection