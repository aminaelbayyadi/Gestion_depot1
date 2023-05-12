<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receptions</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">Reception </div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Receptions</div>
            <div>
                <a href="{{ route('form/select') }}" class="btn btn-primary">Create</a>
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
                        <th width="30">idreception</th>
                        <th>Date reception</th>
                        <th>Nombre des articles</th>
                        <th >Nom fournisseur</th>
                       

                        <th width="150">Action</th>
                    </tr>

                    @if($receptions->isNotEmpty())
                    @foreach ($receptions as $reception)
                    <tr valign="middle">
                        <td>{{ $reception->idreception }}</td>
                        <td >{{ $reception->datereception }}</td>
                        <td>{{ $reception->nbrarticle }}</td>
                        <td>{{ $reception->nomfour }}</td>
                        

                        <td>
                            <a href="{{ route('detailreception.index', ['idreception' => $reception->idreception]) }} }}" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg></a>
                            <a href="#" onclick="deletereception({{ $reception->idreception }})" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" ></span></a>
                            <form id="reception-edit-action-{{ $reception->idreception }}" action="{{ route('form/select',$reception->idreception) }}" method="post">
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
            {{ $receptions->links() }}
        </div>
    </div>
</body>
</html>
<script>
    function deletereception(idreception) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('reception-edit-action-'+idreception).submit();
        }
    }
</script>