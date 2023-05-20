<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="bg-primary py-4" style="text-align : center;">
        <div class="container">
            <div class="h1 text-white fw-bold">Stock</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4"></div>
        </div>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        
                        <th >Code Produit</th>
                        <th>Nom du produit</th>
                        <th>Quantité</th>
                        <th width="150">Modifier</th>
                        
                    </tr>

                    @if($stock->isNotEmpty())
                    @foreach ($stock as $stock)
                    <tr valign="middle">
                       
                        <td >{{ $stock->codeproduit }}</td>
                        <td>{{ $stock->nomproduit }}</td>
                        <td>{{ $stock->quantiter}}</td>
                       
                        <td>

                        <a href="{{  route('stock.edit',$stock->idstock) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                            
                            <!-- <form id="stock-edit-action-{{ $stock->idstock }}" action="{{ route('stock.destroy',$stock->idstock) }}" method="post">
                            @csrf
                                @method('delete')
                            </form> -->
                        </td>
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
        <!-- Erreur dans cette section
        <div class="mt-3">
            
        </div>
-->
    </div>
</body>
</html>
<script>
  
</script>