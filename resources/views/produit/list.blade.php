<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMPLE LARAVEL 9 CRUD </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>




    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">SIMPLE LARAVEL </div>
        </div>
    </div>
    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">produits</div>
            <div>
                <a href="{{ route('produits.create') }}" class="btn btn-primary">Create</a>
            </div>
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
                        <th width="30">IDproduit</th>
                        <th >codeproduit</th>
                        <th>nomproduit</th>
                        <th width="150">Action</th>
                    </tr>
                    @if($produits->isNotEmpty())
                    @foreach ($produits as $produit)
                    <tr valign="middle">
                        <td>{{ $produit->idproduit }}</td>
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
                        <td colspan="6">Record Not Found</td>
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
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('produit-edit-action-'+id).submit();
        }
    }
</script>