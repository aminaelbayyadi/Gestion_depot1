<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produits </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>




    <div class="bg-primary py-2" style="text-align : center;">
        <div class="container">
            <div class="h1 text-white fw-bold">Produits</div>
        </div>
    </div>
    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4"></div>
            <div>
                <a href="{{ route('produits.create') }}" class="btn btn-primary">Ajouter un produit</a>
            </div>
        </div>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-warning">
            {{ Session::get('error') }}
        </div>
        @endif

        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                       
                        <th >Code</th>
                        <th>Nom du produit</th>
                        <th width="150">Action</th>
                    </tr>
                    @if($produits->isNotEmpty())
                    @foreach ($produits as $produit)
                    <tr valign="middle">
                        
                        <td >{{ $produit->codeproduit }}</td>
                        <td>{{ $produit->nomproduit }}</td>
                        <td>
                            <a href="{{ route('produits.edit',$produit->idproduit) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="#" onclick="deleteproduit({{ $produit->idproduit }})" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" ></span></a>
                            <form id="produit-edit-action-{{ $produit->idproduit }}" action="{{ route('produits.destroy',$produit->idproduit) }}" method="post">
                            @csrf
                                @method('delete')
                            </form>
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
        <div class="mt-3">
            {{ $produits->links() }}
        </div>
    </div>
</body>
</html>
<script>
    function deleteproduit(id) {
        if (confirm("Êtes vous sûres vous voulez supprimer ce produit ?")) {
            document.getElementById('produit-edit-action-'+id).submit();
        }
    }
</script>