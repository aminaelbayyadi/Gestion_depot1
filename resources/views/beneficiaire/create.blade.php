<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un nouveau bénéficiaire</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-info py-3 shadow-sm" style="height: 65px;">
            <div class="container">
            <div><a  href="{{ url('/home') }}"><img src="{{asset('assets/images/logo.png')}}" style="height: 50px;" ></a></div>
               <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>-->
                <div class="container">
            <div class="h4 text-white" style="font-style: italic; padding-left: 150px;" >Ajouter un nouveau bénéficiaire</div>
        </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4"></div>
            <div>
                <a href="{{ route('beneficiaires.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </div>

        <form action="{{ route('beneficiaires.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="code_beneficiaire" class="form-label">Code</label>
                        <input type="text" name="code_beneficiaire" id="code_beneficiaire" placeholder="Enter code" class="form-control @error('codbeneficiaire') is-invalid @enderror" value="{{ old('codbeneficiaire') }}">
                        @error('code_beneficiaire')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="nombeneficiaire" class="form-label">Nom du bénéficiaire</label>
                        <input type="text" name="nombeneficiaire" id="nombeneficiaire" placeholder="Enter nom de beneficiaire" class="form-control @error('nombeneficiaire') is-invalid @enderror" value="{{ old('nombeneficiaire') }}">
                        @error('nombeneficiaire')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="fonction" class="form-label">Fonction</label>
                        <select class="form-control" name="fonction" id="fonction">
                            <option selected disabled>--- sélectionner la fonction ---</option>
                            <option value="Directeur(rice)">Directeur(rice)</option>
                            <option value="Fonctionnaire">Fonctionnaire</option>
                          
                        </select>                       
                    </div>
                    <div class="mb-3">
                        <label for="etablissement" class="form-label">Nom de l'établissement d'origine </label>

                        <select class="form-control" name="etablissement" id="etablissement">
                            <option selected disabled>--- sélectionner une établissement ---</option>
                            @foreach ($etablissements as $etablissement )
                            <option value="{{ $etablissement->idetablissement }}">{{ $etablissement->nometablissement }}</option>
                            @endforeach
                        </select>
                                              
                    </div>
                    <div class="mb-3">
                        <label for="situation" class="form-label">Situation</label>
                        <select class="form-control" name="situation" id="situation">
                            <option selected disabled>--- sélectionner la situation ---</option>
                            <option value="Actif">Actif</option>
                            <option value="non actif">Non actif</option>
                          
                        </select>                        
                    </div>
                </div>
            </div>

            <button class="btn btn-primary mt-3">Ajouter</button>

        </form>
    </div>
</body>
</html>