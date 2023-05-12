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
            <div class="h4">etablissements</div>
            <div>
                <a href="{{ route('etablissements.create') }}" class="btn btn-primary">Create</a>
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
                        <th width="30">IDetablissement</th>
                        <th >codeetablissement</th>
                        <th>nometablissement</th>
                        <th>Télephone</th>
                        <th >Addressetablissement</th>
                        <th width="150">Action</th>
                    </tr>

                    @if($etablissements->isNotEmpty())
                    @foreach ($etablissements as $etablissement)
                    <tr valign="middle">
                        <td>{{ $etablissement->idetablissement }}</td>
                        <td >{{ $etablissement->codetablissement }}</td>
                        <td>{{ $etablissement->nometablissement }}</td>
                        <td>{{ $etablissement->tel_fixe_etablissement }}</td>
                        <td>{{ $etablissement->adretablissement }}</td>
                        <td>
                            <a href="{{ route('etablissements.edit',$etablissement->idetablissement) }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="#" onclick="deleteetablissement({{ $etablissement->idetablissement }})" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" ></span></a>
                            <form id="etablissement-edit-action-{{ $etablissement->idetablissement }}" action="{{ route('etablissements.destroy',$etablissement->idetablissement) }}" method="post">
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
            {{ $etablissements->links() }}
        </div>
    </div>
</body>
</html>
<script>
    function deleteetablissement(idetablissement) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('etablissement-edit-action-'+idetablissement).submit();
        }
    }
</script>