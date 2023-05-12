<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<body>

<div   class="w3-sidebar w3-bar-block w3-green"  style="width:15%">
<br><br>
<br><br>
<br>

<a href="produits" class="w3-bar-item w3-button"><i class="fa fa-home"></i> home</a>
  <a href="produits" class="w3-bar-item w3-button">les produits</a>
  <a href="fournisseurs" class="w3-bar-item w3-button"> les fournisseurs</a>
  <a href="etablissements" class="w3-bar-item w3-button"> les établissements</a>
  <a href="receptions" class="w3-bar-item w3-button"> les receptions</a>
  <a href="beneficiaires" class="w3-bar-item w3-button"> les beneficiaires</a>
  <a href="stock" class="w3-bar-item w3-button"> stock</a>
  <a href="sorties" class="w3-bar-item w3-button"> les sorties</a>
  <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button"> {{ __('Déconnexion') }} </a>

  

</div>

<div style="margin-left:15% " >



<div class="w3-container">
  

</div>
      
</body>
</html>
