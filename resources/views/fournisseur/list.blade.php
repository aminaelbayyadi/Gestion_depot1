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