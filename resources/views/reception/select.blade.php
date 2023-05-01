<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMPLE LARAVEL 9 </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
<!-- Select Fournisseur -->


<!-- Produits and Receptions Tables -->
<div class="row">
    <div class="col-md-6">
        <h3>Produits</h3>
        <table id="produitsTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantite</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <h3>Receptions</h3>
        <table id="receptionsTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                  
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- Quantity Input -->
<div class="form-group">
    <label for="quantity">Quantité:</label>
    <input type="number" class="form-control" id="quantity" value="1" min="1">
</div>

<!-- Add Button -->
<div class="form-group">
    <button id="addButton" class="btn btn-primary">Add</button>
</div>

</body>

<script>
    function deleteFournisseur(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('fournisseur-edit-action-'+id).submit();
        }
    }




// Select the elements
const fournisseurSelect = document.querySelector('#fournisseur');
const produitsTable = document.querySelector('#produitsTable tbody');
const receptionsTable = document.querySelector('#receptionsTable tbody');
const quantityInput = document.querySelector('#quantity');
const addButton = document.querySelector('#addButton');

// Create a dummy data object to simulate data from the database
const data = {
  '1': [
    { id: 1, nom: 'Produit A', prix: 12 },
    { id: 2, nom: 'Produit B', prix: 20 },
    { id: 3, nom: 'Produit C', prix: 34 },
  ],
  '2': [
    { id: 4, nom: 'Produit D', prix: 15.99 },
    { id: 5, nom: 'Produit E', prix: 9.99 },
  ],
};

// Helper function to clear the table rows
function clearTableRows(table) {
  while (table.firstChild) {
    table.removeChild(table.firstChild);
  }
}

// Helper function to create a table row
function createTableRow(columns) {
  const row = document.createElement('tr');

  columns.forEach(column => {
    const cell = document.createElement('td');
    cell.textContent = column;
    row.appendChild(cell);
  });

  return row;
}

// Helper function to add a product to the receptions table
function addProductToReceptions(product, quantity) {
  const row = createTableRow([product.nom, quantity]);
  receptionsTable.appendChild(row);
}

// Helper function to handle the add button click event
function handleAddButtonClick() {
  // Get the selected fournisseur ID
  const fournisseurId = fournisseurSelect.value;

  // Get the selected product
  const selectedProduct = produitsTable.querySelector('tr.selected');

  // Get the quantity
  const quantity = parseInt(quantityInput.value);

  // Check if a fournisseur is selected
  if (fournisseurId === '') {
    alert('Please select a fournisseur.');
    return;
  }

  // Check if a product is selected
  if (selectedProduct === null) {
    alert('Please select a product.');
    return;
  }

  // Add the product to the receptions table
  const product = {
    nom: selectedProduct.querySelector('td:nth-child(1)').textContent,
  };
  addProductToReceptions(product, quantity);

  // Reset the quantity input
  quantityInput.value = '1';
}

// Helper function to handle the product click event
function handleProductClick(event) {
  // Deselect all rows
  const rows = produitsTable.querySelectorAll('tr');
  rows.forEach(row => {
    row.classList.remove('selected');
  });

  // Select the clicked row
  const row = event.target.closest('tr');
  row.classList.add('selected');
}

// Helper function to display the produits table for the selected fournisseur
function displayProduitsTable(fournisseurId) {
  // Clear the produits table
  clearTableRows(produitsTable);

  // Add the produits for the selected fournisseur
 
  const produits = data[fournisseurId];

  function createTableRow(columns) {
  const row = document.createElement('tr');

  columns.forEach(column => {
    const cell = document.createElement('td');
    if (typeof column === 'string') {
      cell.innerHTML = column;
    } else {
      cell.appendChild(column);
    }
    row.appendChild(cell);
  });

  return row;
}

  produits.forEach(produit => {
    const row = createTableRow([
  produit.nom,
  produit.prix.toFixed(2),
  document.createRange().createContextualFragment(`<button class="btn btn-sm btn-primary">Select</button>`)
]);

    row.addEventListener('click', handleProductClick);
    produitsTable.appendChild(row);
  });
}

// Attach event listeners
fournisseurSelect.addEventListener('change', () => {
  const fournisseurId = fournisseurSelect.value;
  if (fournisseurId !== '') {
    // Call the displayProduitsTable function to display the produits table for the selected fournisseur
displayProduitsTable(fournisseurId);
} else {
// Clear the produits table if no fournisseur is selected
clearTableRows(produitsTable);
}
});

addButton.addEventListener('click', handleAddButtonClick);
   

    
</script>