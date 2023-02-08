<div class="card-body">
    <form method="POST" class="row g-3" action="{{ route('herramienta.store') }}"  role="form">
        @csrf

        @include('herramienta.form')

    </form>
</div>