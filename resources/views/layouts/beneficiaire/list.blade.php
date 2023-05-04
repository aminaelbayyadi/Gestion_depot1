<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>beneficiaire</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">beneficiaire </div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">beneficiaires</div>
            <div>
                <a href="{{ route('beneficiaires.create') }}" class="btn btn-primary">Create</a>
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
                        <th width="30">idbeneficiaire</th>
                        <th >code_beneficiaire</th>
                        <th>nombeneficiaire</th>
                        <th>fonction</th>
                        <th >etablissement_id</th>
                        <th >situation</th>

                        <th width="150">Action</th>
                    </tr>

                    @if($beneficiaires->isNotEmpty())
                    @foreach ($beneficiaires as $beneficiaire)
                    <tr valign="middle">
                        <td>{{ $beneficiaire->idbeneficiaire }}</td>
                        <td >{{ $beneficiaire->code_beneficiaire }}</td>
                        <td>{{ $beneficiaire->nombeneficiaire }}</td>
                        <td>{{ $beneficiaire->fonction }}</td>
                        <td>{{ $beneficiaire->etablissement_id }}</td>
                        <td>{{ $beneficiaire->situation }}</td>

                        <td>
                            <a href="{{ route('beneficiaires.edit',$beneficiaire->idbeneficiaire) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deletebeneficiaire({{ $beneficiaire->idbeneficiaire }})" class="btn btn-danger btn-sm">Delete</a>
                            <form id="beneficiaire-edit-action-{{ $beneficiaire->idbeneficiaire }}" action="{{ route('beneficiaires.destroy',$beneficiaire->idbeneficiaire) }}" method="post">
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
            {{ $beneficiaires->links() }}
        </div>
    </div>
</body>
</html>
<script>
    function deletebeneficiaire(idbeneficiaire) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('beneficiaire-edit-action-'+idbeneficiaire).submit();
        }
    }
</script>