<p>holaaaaa</p>
<table class="table table-responsive table-bordered" id="datatablesSimple">
                    <thead class="thead">
                        <tr>
                            <th>Codigo Inventario</th>
                            <th>Nombre Inventario</th>
                            <th>Foto Inventario</th>
                            <th>Tipo Inventario</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listaMovimientos as $lista)
                            <tr>
                                <td>{{ $lista->codinventario }}</td>
                                <td>{{ $lista->nombreinventario }}</td>
                                <td>{{ $lista->fotoinventario}}</td>
                                <td>{{ $lista->tipoinventario}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>