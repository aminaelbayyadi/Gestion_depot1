<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter une etablissement</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-info py-3 shadow-sm" style="height: 65px;">
            <div class="container">
            <div><a class="navbar-brand" href="{{ url('/home') }}"><img src="{{asset('assets/images/logo.png')}}" style="height: 50px;" ></a></div>
               <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>-->
                <div class="container">
            <div class="h4 text-white" style="font-style: italic; padding-left: 150px;" >Ajouter un nouveau etablissement</div>
        </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>


    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Veuillez saisir les informations de l'etablissement :</div>
            <div>
                <a href="{{ route('etablissements.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>

        <form action="{{ route('etablissements.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="codetablissement" class="form-label">Code</label>
                        <input type="text" name="codetablissement" id="codetablissement" placeholder="Enter le code de l'etablissement" class="form-control @error('codetablissement') is-invalid @enderror" value="{{ old('codetablissement') }}">
                        @error('codetablissement')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="nometablissement" class="form-label">Nom</label>
                        <input type="text" name="nometablissement" id="nometablissement" placeholder="Enter le nom de l'etablissement" class="form-control @error('nometablissement') is-invalid @enderror" value="{{ old('nometablissement') }}">
                        @error('nometablissement')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="tel_fixe_etablissement" class="form-label">Télephone</label>
                        <input type="text" name="tel_fixe_etablissement" id="tel_fixe_etablissement" placeholder="Enter le téléphone" class="form-control @error('tel_fixe_etablissement') is-invalid @enderror" value="{{ old('tel_fixe_etablissement') }}">
                        @error('tel_fixe_etablissement')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                    <div class="mb-3">
                        <label for="adretablissement" class="form-label">Adresse</label>
                        <textarea name="adretablissement" id="adretablissement" cols="30" rows="4" placeholder="Enter l'adresse" class="form-control">{{ old('adretablissement') }}</textarea>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary mt-3">Ajouter</button>

        </form>
    </div>
</body>
</html>