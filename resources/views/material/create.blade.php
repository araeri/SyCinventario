<div class="card-body">
    <form method="POST" class="row g-3" action="{{ route('material.store') }}"  role="form">
        @csrf

        @include('material.form')

    </form>
</div>