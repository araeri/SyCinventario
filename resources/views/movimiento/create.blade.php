
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<script>
  $(document).ready(function() {
    var selectedItems = [];
    var cantMaterial = <?php echo json_encode($cantMaterial); ?>;
    var maxCantidadMaterial = cantMaterial.cantidadmaterial;

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
      var totalCantidadMaterial = 0;

      selectedItems.forEach(function(inventario) {
        selectedItemHtml += '<div id="item-info-' + inventario.idinventario + '">';
        selectedItemHtml += '<p>Item Name: ' + inventario.nombreinventario + '</p>';
        selectedItemHtml += '<p>Item Description: ' + inventario.tipoinventario + '</p>';
        selectedItemHtml += '<p>Item Detalle: ' + inventario.informacioninventario + '</p>';
        if (inventario.tipoinventario === 'Material') {
          selectedItemHtml += '<label for="item-cantidad-' + inventario.idinventario + '">Item Cantidad:</label>';
          selectedItemHtml += '<input type="number" name="item-cantidad-' + inventario.idinventario + '" id="item-cantidad-' + inventario.idinventario + '" value="1">';
          totalCantidadMaterial += 1;
        }
        selectedItemHtml += '<button class="delete-item" data-item-id="' + inventario.idinventario + '">Delete Item</button>';
        selectedItemHtml += '</div>';
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
      if (totalCantidadMaterial > maxCantidadMaterial) {
        alert('You have selected more materials than are available!');
        $('#add-item').prop('disabled', true);
      } else {
        $('#add-item').prop('disabled', false);
      }
    }

    $('#form').submit(function(event) {
  var selectedItemsData = [];

  selectedItems.forEach(function(inventario) {
    var itemData = {
      idinventario: inventario.idinventario,
      codinventario: inventario.codinventario,
      nombreinventario: inventario.nombreinventario,
      tipoinventario: inventario.tipoinventario,
      fotoinventario: inventario.fotoinventario
    };

    if (inventario.tipoinventario === 'Material') {
      var cantidadInput = $('#item-cantidad-' + inventario.idinventario);
      itemData.cantidad = cantidadInput.val();

      var cantMaterialItem = <?php echo json_encode($cantMaterial); ?>.find(item => item.idinventariofk == inventario.idinventario);
      if (cantMaterialItem && parseInt(itemData.cantidad) > parseInt(cantMaterialItem.cantidadmaterial)) {
        alert('Selected quantity of "' + inventario.nombreinventario + '" is greater than the available quantity');
        event.preventDefault();
        return false;
      }
    }

    selectedItemsData.push(itemData);
  });

  // Validate EntradaMovimiento, SalidaMovimiento, and RazonMovimiento
  var entradaMovimiento = $('#entrada-movimiento').val();
  var salidaMovimiento = $('#salida-movimiento').val();
  var razonMovimiento = $('#razon-movimiento').val();

  if (entradaMovimiento === '' || salidaMovimiento === '' || razonMovimiento === '') {
    alert('Please fill out all fields');
    event.preventDefault();
    return false;
  }
  if (selectedItemsData.length === 0) {
    alert('Please select at least one item');
    event.preventDefault();
    return false;
  }

  var selectedItemsJson = JSON.stringify(selectedItemsData);
  $('#selected-items-input').val(selectedItemsJson);
});
});
</script>


<div class="card-body">
    <form method="POST" class="row g-3" action="{{ route('movimiento.store') }}"  role="form" enctype="multipart/form-data" id='form'>
        @csrf

        @include('movimiento.form')

    </form>
    <button id="add-item">Add Item</button>
    <div class="item-info"></div>

    
</div>
