@extends('layouts.app')
@extends('layouts.sidebar')
<head>
    <meta charset="utf-8">
   
</head>
<style> 
#main {
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
      <div class="card" style="background-color: pink; text-align: center;">
        <div class="card-body" style="max-height: 150px;">
          <h5 class="card-title">Nombre total des fournisseurs</h5>
          <p class="card-text" style="font-size: 40px; font-weight: bold; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$totalFournisseurs}}</p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card" style="background-color: pink; text-align: center;">
        <div class="card-body" style="max-height: 150px;">
          <h5 class="card-title">Nombre des articles</h5>
          <p class="card-text" style="font-size: 40px; font-weight: bold; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$totalProduits}}</p>
        </div>
      </div>
    </div>
  </div>
</div>

<br>


<div id="main">

<div style="display: flex;  justify-content: center;flex-direction: column; ">
    <div style="width: 100%; margin-left: 25% ;box-sizing: border-box;">
        <div style="width: 50%; height: 300px;  box-sizing: border-box;">
            <h1 style="font-size: 24px; font-weight: bold;">Pourcentages des produits dans le stock</h1>
            {!! $produitsChart->container() !!}
            <br>
        </div>
        <br>
        <br>
    </div>

    <div style="width: 100%; display: flex;  justify-content: center;">
        <div style="width: 100%; height: 300px; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <h1 style="font-size: 24px; font-weight: bold;">Nombre de receptions par mois</h1>
            {!! $receptionsChart->container() !!}
        </div>

        <div style="width: 100%; height: 300px; border: 1px solid #ccc; padding: 10px;">
            <h1 style="font-size: 24px; font-weight: bold;">Nombre de sorties par mois</h1>
            {!! $sortiesChart->container() !!}
        </div>
    </div>
</div>

<div>

@endsection

