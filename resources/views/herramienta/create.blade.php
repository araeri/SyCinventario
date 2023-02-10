@extends('layouts.app')
@section('content')

<div class="card-body">
    <form method="POST" class="row g-3" action="{{ route('herramienta.store') }}"  role="form" enctype="multipart/form-data">
        @csrf

        @include('herramienta.form')

    </form>
</div>
@endsection