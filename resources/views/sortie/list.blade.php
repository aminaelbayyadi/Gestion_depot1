<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sorties</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="bg-primary py-2" style="text-align : center;">
        <div class="container">
            <div class="h1 text-white fw-bold">Sorties</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4"></div>
            <div>
                <a href="{{ route('sortie.select') }}" class="btn btn-primary">Ajouter une sortie</a>
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
                        <th >Numero de sortie</th>
                        <th>Date de la sortie</th>
                        <th>Nombre des articles</th>
                        <th >Nom du beneficiaire</th>
                       

                        <th width="150">Action</th>
                    </tr>

                    @if($Sorties->isNotEmpty())
                    @foreach ($Sorties as $Sortie)
                    <tr valign="middle">
                        <td>{{ $Sortie->numsortie }}</td>
                        <td >{{ $Sortie->datesortie }}</td>
                        <td>{{ $Sortie->nbr_article_sortie }}</td>
                        <td>{{ $Sortie->nombeneficiaire }}</td>
                        

                        <td>
                            <a href="{{ route('detailsortie.index', ['idsortie' => $Sortie->idsortie])}}" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg></a>
                            <a href="#" onclick="deleteSortie({{ $Sortie->idsortie }})" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" ></span></a>
                            <form id="Sortie-edit-action-{{ $Sortie->idsortie }}" action="{{ route('sortie.destroy',$Sortie->idsortie) }}" method="post">
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
            {{ $Sorties->links() }}
        </div>
    </div>
</body>
</html>
<script>
    function deleteSortie(idsortie) {
        if (confirm("Êtes vous sûres vous vouler supprimer cette sortie ?")) {
            document.getElementById('Sortie-edit-action-'+idsortie).submit();
        }
    }
</script>