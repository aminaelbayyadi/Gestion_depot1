<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sortie</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">Sortie </div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Sorties</div>
            <div>
                <a href="{{ route('sortie.select') }}" class="btn btn-primary">Create</a>
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
                        <th width="30">idSortie</th>
                        <th>Date Sortie</th>
                        <th>Nombre des articles</th>
                        <th >Nom beneficiaire</th>
                       

                        <th width="150">Action</th>
                    </tr>

                    @if($Sorties->isNotEmpty())
                    @foreach ($Sorties as $Sortie)
                    <tr valign="middle">
                        <td>{{ $Sortie->idsortie }}</td>
                        <td >{{ $Sortie->datesortie }}</td>
                        <td>{{ $Sortie->nbr_article_sortie }}</td>
                        <td>{{ $Sortie->nombeneficiaire }}</td>
                        

                        <td>
                            <a href="{{ route('sortie.select',$Sortie->idSortie) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteSortie({{ $Sortie->idsortie }})" class="btn btn-danger btn-sm">Delete</a>
                            <form id="Sortie-edit-action-{{ $Sortie->idsortie }}" action="{{ route('sortie.select',$Sortie->idsortie) }}" method="post">
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
            {{ $Sorties->links() }}
        </div>
    </div>
</body>
</html>
<script>
    function deleteSortie(idsortie) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('Sortie-edit-action-'+idsortie).submit();
        }
    }
</script>