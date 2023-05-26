<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<body>

<div   class="w3-sidebar w3-bar-block w3-green"  style="width:15%">
<br><br>
<br><br>
<br>

<a href="#" class="w3-bar-item w3-button"><i class="bi bi-house"></i> Acceuil</a>
  <a href="{{ route('produits.index') }}" class="w3-bar-item w3-button"><i class="bi bi-box-seam"></i> Produits</a>
  <a href="{{ route('stock.index') }}" class="w3-bar-item w3-button"><i class="bi bi-archive"></i> Stock</a>
  <a href="{{ route('fournisseurs.index') }}" class="w3-bar-item w3-button"><i class="bi bi-truck"></i> Fournisseurs</a>
  <a href="{{ route('etablissements.index') }}" class="w3-bar-item w3-button"><i class="bi bi-building"></i> Etablissements</a>
  <a href="{{ route('beneficiaires.index') }}" class="w3-bar-item w3-button"><i class="bi bi-people"></i> Beneficiaires</a>
  <a href="{{ route('receptions.index') }}" class="w3-bar-item w3-button"><i class="bi bi-reception-3"></i> Receptions</a>
  <a href="{{ route('sortie.index') }}" class="w3-bar-item w3-button"><i class="bi bi-journal-richtext"></i> Sorties</a>
  <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button"> {{ __('Déconnexion') }} </a>

  

</div>

<div style="margin-left:15% " >



<div class="w3-container">
  

</div>
      
</body>
</html>
