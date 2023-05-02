<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMPLE LARAVEL 9 CRUD </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">SIMPLE LARAVEL </div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Stock</div>
            <div>
                <a href="{{ route('stock.create') }}" class="btn btn-primary">Create</a>
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
                        <th width="30">ID</th>
                        <th >Code Produit</th>
                        <th>Nom Produit</th>
                        <th>Quantite</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($stock->isNotEmpty())
                    @foreach ($stock as $stock)
                    <tr valign="middle">
                        <td>{{ $stock->idstock }}</td>
                        <td >{{ $stock->codeproduit }}</td>
                        <td>{{ $stock->nomproduit }}</td>
                        <td>{{ $stock->quantiter}}</td>
                       
                        <td>
                            <a href="{{ route('stock.edit',$stock->idstock) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deletestock({{ $stock->idstock }})" class="btn btn-danger btn-sm">Delete</a>
                            <form id="stock-edit-action-{{ $stock->idstock }}" action="{{ route('stock.destroy',$stock->idstock) }}" method="post">
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
        <!-- Erreur dans cette section
        <div class="mt-3">
            
        </div>
-->
    </div>
</body>
</html>
<script>
    function deletestock(idstock) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('stock-edit-action-'+idstock).submit();
        }
    }
</script>