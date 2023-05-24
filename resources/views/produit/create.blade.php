<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un produit </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-info py-3 shadow-sm" style="height: 65px;">
            <div class="container">
            <div><a class="navbar-brand" href="{{ url('/home') }}"><img src="{{asset('assets/images/logo.png')}}" style="height: 50px;" ></a></div>
               <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>-->
                <div class="container">
            <div class="h4 text-white" style="font-style: italic; padding-left: 150px;" >Ajouter un nouveau produit</div>
        </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

    
    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Veuillez saisir les informations du produit : </div>
            <div>
                <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </div>
        <form action="{{ route('produits.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="codeproduit" class="form-label">code</label>
                        <input type="text" name="codeproduit" id="codeproduit" placeholder="Enter code" class="form-control @error('codeproduit') is-invalid @enderror" value="{{ old('codeproduit') }}">
                        @error('codeproduit')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                    <div class="mb-3">
                        <label for="nomproduit" class="form-label">nom de produit</label>
                        <input type="text" name="nomproduit" id="nomproduit" placeholder="Enter nom de produit" class="form-control @error('nomproduit') is-invalid @enderror" value="{{ old('nomproduit') }}">
                        @error('nomproduit')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Ajouter</button>
        </form>
    </div>
</body>
</html>