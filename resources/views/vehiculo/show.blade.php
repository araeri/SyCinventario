<td>{{ $vehiculo->idinventario}}</td><br>
<td>{{ $vehiculo->codinventario}}</td><br>
<td>{{ $vehiculo->nombreinventario}}</td><br>
<td>{{ $vehiculo->patentevehiculo}}</td><br>
<td>{{ $vehiculo->tipovehiculo}}</td><br>
<td><img src="{{asset('/Imagenes/'.$vehiculo->fotoinventario)}}" class="img" alt="No imagen" style="width: 400px; height: 400px;"></td><br>
<td>{{ $vehiculo->estadoinventario}}</td><br>
<td>{{ $vehiculo->informacioninventario}}</td><br>