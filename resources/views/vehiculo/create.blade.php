<div class="card-body">
    <form method="POST" class="row g-3" action="{{ route('vehiculo.store') }}"  role="form" enctype="multipart/form-data">
        @csrf

        @include('vehiculo.form')

    </form>
</div>