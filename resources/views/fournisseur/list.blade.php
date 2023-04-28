<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMPLE LARAVEL 9 CRUD IN HINDI</title>
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
            <div class="h4">fournisseurs</div>
            <div>
                <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary">Create</a>
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
                        <th>Image</th>
                        <th >code</th>
                        <th>nomfournisseur</th>
                        <th>Télephone</th>
                        <th>EmailF</th>
                        <th >Address</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($fournisseurs->isNotEmpty())
                    @foreach ($fournisseurs as $fournisseur)
                    <tr valign="middle">
                        <td>{{ $fournisseur->id }}</td>
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
                            <a href="{{ route('fournisseurs.edit',$fournisseur->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteFournisseur({{ $fournisseur->id }})" class="btn btn-danger btn-sm">Delete</a>
                            <form id="fournisseur-edit-action-{{ $fournisseur->id }}" action="{{ route('fournisseurs.destroy',$fournisseur->id) }}" method="post">
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
            {{ $fournisseurs->links() }}
        </div>

    </div>

    
</body>
</html>
<script>
    function deleteFournisseur(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('fournisseur-edit-action-'+id).submit();
        }
    }
</script>