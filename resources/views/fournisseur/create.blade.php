<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un nouveau fournisseur</title>
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
            <div class="h4 text-white" style="font-style: italic; padding-left: 150px;" >Ajouter un nouveau fournisseur</div>
        </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>


    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Veuillez saisir les informations du fournisseur : </div>
            <div>
                <a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>

        <form action="{{ route('fournisseurs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="codefour" class="form-label">Code</label>
                        <input type="text" name="codefour" id="codefour" placeholder="Enter le code" class="form-control @error('codefour') is-invalid @enderror" value="{{ old('codefour') }}">
                        @error('codefour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="nomfour" class="form-label">Nom du fournisseur</label>
                        <input type="text" name="nomfour" id="nomfour" placeholder="Enter le nom du fournisseur" class="form-control @error('nomfour') is-invalid @enderror" value="{{ old('nomfour') }}">
                        @error('nomfour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="telfour" class="form-label">Télephone de fournisseur</label>
                        <input type="text" name="telfour" id="telfour" placeholder="Enter le numéro de téléphone" class="form-control @error('telfour') is-invalid @enderror" value="{{ old('telfour') }}">
                        @error('telfour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="emailfour" class="form-label">Email</label>
                        <input type="text" name="emailfour" id="emailfour" placeholder="Enter l'adresse email" class="form-control @error('emailfour') is-invalid @enderror" value="{{ old('emailfour') }}">
                        @error('emailfour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror      
                    </div>

                    <div class="mb-3">
                        <label for="adrfour" class="form-label">Adresse</label>
                        <textarea name="adrfour" id="adrfour" cols="30" rows="4" placeholder="Enter l'adresse" class="form-control">{{ old('adrfour') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imagefour" class="form-label">Ajouter une image du fournisseur :</label>
                        <input type="file" name="imagefour" id="imagefour" class="@error('imagefour') is-invalid @enderror">

                       @error('imagefour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror   
                    </div>
                
                </div>
            </div>

            <button class="btn btn-primary mt-3">Save fournisseur</button>

        </form>
    </div>
</body>
</html>