@extends('layouts.app')
@extends('layouts.sidebar')
<head>
    <meta charset="utf-8">
   
</head>
<style> 
#main {
  border: 1px solid black;
  display: flex;
  flex : wrap;
  flex-direction : column;
  text-align : center;
}

.chart-container {
        border: 1px solid #ccc;
        padding: 10px;
    }


</style>
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card" style="background-color : pink; text-align : center;">
        <div class="card-body">
          <h5 class="card-title">Nombre total des fournisseurs</h5>
          <p class="card-text" style="font-size: 30px;
        font-weight: bold;">{{$totalFournisseurs}}</p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card" style="background-color : pink; text-align : center;">
        <div class="card-body">
          <h5 class="card-title">Nombre des articles</h5>
          <p class="card-text" style="font-size: 30px;
        font-weight: bold;">{{$totalProduits}}</p>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>

<div id="main">

<div  style="width: 100% border: 1px solid #ccc;
        padding: 10px;">
        <h1 style="font-size: 24px;
        font-weight: bold;" >Pourcentage des produits dans le stock</h1>
    {!! $produitsChart->container() !!}
</div>
<hr>
<div style="width: 50% border: 1px solid #ccc;
        padding: 10px;">
        <h1 style="font-size: 24px;
        font-weight: bold;" >Nombre de receptions par mois</h1>
    {!! $receptionsChart->container() !!}
</div>
<hr>
<div style="width: 50% border: 1px solid #ccc;
        padding: 10px;">
        <h1 style="font-size: 24px;
        font-weight: bold;" >Nombre de sorties par mois</h1>
    {!! $sortiesChart->container() !!}
</div>

<div>

@endsection

