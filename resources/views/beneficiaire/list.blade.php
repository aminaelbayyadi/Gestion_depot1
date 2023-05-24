<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bénéficiaire</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            <div><a  href="{{ url('/home') }}"><img src="{{asset('assets/images/logo.png')}}" style="height: 50px;" ></a></div>
               <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto" style=" padding-left: 890px;">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4"></div>
            <div>
                <a href="{{ route('beneficiaires.create') }}" class="btn btn-primary">Ajouter un bénéficiaire</a>
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
                        <th >nom_etablissement</th>
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
                        <td>{{ $beneficiaire->nometablissement }}</td>
                        <td>{{ $beneficiaire->situation }}</td>

                        <td>
                            <a href="{{ route('beneficiaires.edit',$beneficiaire->idbeneficiaire) }}" class="btn btn-success btn-sm "><span class="glyphicon glyphicon-edit"></span>
</a>
                            <a href="#" onclick="deletebeneficiaire({{ $beneficiaire->idbeneficiaire }})" class="btn btn-danger btn-sm " > <span class="glyphicon glyphicon-trash" ></span> 
</a>
                            <form id="beneficiaire-edit-action-{{ $beneficiaire->idbeneficiaire }}" action="{{ route('beneficiaires.destroy',$beneficiaire->idbeneficiaire) }}" method="post">
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
            {{ $beneficiaires->links() }}
        </div>
    </div>
</body>
</html>
<script>
    function deletebeneficiaire(idbeneficiaire) {
        if (confirm("Êtes vous sûres vous voulez supprimer ce bénéficiaire ?")) {
            document.getElementById('beneficiaire-edit-action-'+idbeneficiaire).submit();
        }
    }
</script>