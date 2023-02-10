<div class="card-body">
    <form method="POST" class="row g-3" action="{{ route('movimiento.store') }}"  role="form" enctype="multipart/form-data">
        @csrf

        @include('movimiento.form')

    </form>
</div>