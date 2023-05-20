<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails d'une réception</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

<div class="bg-info py-3">
        <div class="container">
            <div class="h4 text-white fw-bold">Détails de la réception numero {{ $id }} </div>
        </div>
    </div>


 
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <div class="card border-0 shadow-lg" style="width: 100%; text-align : center;">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                    <th>Nom du produit</th>
                    <th>Quantité reçue</th>
                    </tr>

                    @if($detailreceptions->isNotEmpty())
                    @foreach ($detailreceptions as $detailreceptions)
                    <tr valign="middle">
                        <td>{{ $detailreceptions->nomproduit }}</td>
                        <td >{{ $detailreceptions->quantite_recue }}</td>
                    </tr>
                    @endforeach
                    
                    @else
                    <tr>
                        <td colspan="6">Rien à afficher</td>
                    </tr>
                    @endif

                </table>
            </div>
        </div>
        
    </div>
</body>
</html>
