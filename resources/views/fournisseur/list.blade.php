<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fournisseurs</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="bg-primary py-2" style="text-align : center;">
        <div class="container">
            <div class="h1 text-white fw-bold">Fournisseurs</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4"></div>
            <div>
                <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary">Ajouter un fournisseur</a>
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
                       
                        <th></th>
                        <th >Code</th>
                        <th>Nom</th>
                        <th>Télephone</th>
                        <th>Email</th>
                        <th >Adresse</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($fournisseurs->isNotEmpty())
                    @foreach ($fournisseurs as $fournisseur)
                    <tr valign="middle">
                      
                        <td>
                            @if($fournisseur->imagefour != '' && file_exists(public_path().'/uploads/fournisseurs/'.$fournisseur->imagefour))
                            <img src="{{ url('uploads/fournisseurs/'.$fournisseur->imagefour) }}" alt="" width="40" height="40" class="rounded-circle">
                            @else
                            <img src="{{ url('assets/images/no-image.png') }}" alt="" width="40" height="40" class="rounded-circle">
                            @endif
                        </td>
                        <td >{{ $fournisseur->codefour }}</td>
                        <td>{{ $fournisseur->nomfour }}</td>
                        <td>{{ $fournisseur->telfour }}</td>
                        <td>{{ $fournisseur->emailfour }}</td>
                        <td>{{ $fournisseur->adrfour }}</td>
                        <td>
                            <a href="{{ route('fournisseurs.edit',$fournisseur->id) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="#" onclick="deleteFournisseur({{ $fournisseur->id }})" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" ></span></a>
                            <form id="fournisseur-edit-action-{{ $fournisseur->id }}" action="{{ route('fournisseurs.destroy',$fournisseur->id) }}" method="post">
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
            {{ $fournisseurs->links() }}
        </div>

    </div>

    
</body>
</html>
<script>
    function deleteFournisseur(id) {
        if (confirm("Êtes vous sûres vous voulez supprimer ce fournisseur ?")) {
            document.getElementById('fournisseur-edit-action-'+id).submit();
        }
    }
</script>