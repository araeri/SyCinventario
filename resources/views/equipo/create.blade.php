<div class="card-body">
    <form method="POST" class="row g-3" action="{{ route('equipo.store') }}"  role="form">
        @csrf

        @include('equipo.form')

    </form>
</div>