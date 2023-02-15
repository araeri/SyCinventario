
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  </head>
  <script>
    $(document).ready(function() {
      var selectedItems = [];
  
      $('#add-item').click(function() {
        var itemId = $('#item-select').val();
        console.log(itemId);
        var selectedItem = <?php echo json_encode($inventario); ?>.find(inventario => inventario.idinventario == itemId);
        if (!selectedItems.find(inventario => inventario.idinventario == selectedItem.idinventario)) {
          selectedItems.push(selectedItem);
          updateSelectedItemInfo();
        } else {
          alert('Item already selected!');
        }
      });
  
      $(document).on('click', '.delete-item', function() {
        var itemId = $(this).data('item-id');
        selectedItems = selectedItems.filter(item => item.idinventario != itemId);
        updateSelectedItemInfo();
      });
  
      function updateSelectedItemInfo() {
        var selectedItemHtml = '';
  
        selectedItems.forEach(function(inventario) {
          selectedItemHtml += '<div id="item-info-' + inventario.idinventario + '">';
          selectedItemHtml += '<p>Item Name: ' + inventario.nombreinventario + '</p>';
          selectedItemHtml += '<p>Item Description: ' + inventario.tipoinventario + '</p>';
          selectedItemHtml += '<p>Item Detalle: ' + inventario.informacioninventario + '</p>';
          selectedItemHtml += '<button class="delete-item" data-item-id="' + inventario.idinventario + '">Delete Item</button>';
          selectedItemHtml += '</div>';
        });
  
        $('.item-info').html(selectedItemHtml);
        if (selectedItems.length > 0) {
          $('.item-info').show();
        } else {
          $('.item-info').hide();
        }
      }
  
      $('#form').submit(function() {
        var selectedItemsJson = JSON.stringify(selectedItems);
        $('#selected-items-input').val(selectedItemsJson);
      });
    });
  </script>
  @extends('layouts.app')
  
  @section('content')
  <div class="card">
      <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">
              <span id="card_title">Crear</span>
              <div class="float-right">
                  <a href="{{ route('movimiento.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                      {{ __('Volver') }}
                  </a>
              </div>
          </div>
      </div>
      <div class="card-body">
        <form method="POST" class="row g-3" action="{{ route('movimiento.store') }}"  role="form" enctype="multipart/form-data" id='form'>
            @csrf
  
            @include('movimiento.form')
  
        </form>
        <button id="add-item">Add Item</button>
        <div class="item-info"></div>
  
      </div>
  </div>
  
  @endsection