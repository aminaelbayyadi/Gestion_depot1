<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier une etablissement</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

<div class="bg-info py-3">
        <div class="container">
            <div class="h4 text-white">Modifier une etablissement</div>
        </div>
    </div>


    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Veuillez modifier les informations souhaitées :</div>
            <div>
                <a href="{{ route('etablissements.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </div>

        <form action="{{ route('etablissements.update',$etablissement->idetablissement) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="codetablissement" class="form-label">Code</label>
                        <input type="text" name="codetablissement" id="codetablissement" placeholder="Enter code" class="form-control @error('codetablissement') is-invalid @enderror" value="{{ old('codetablissement',$etablissement->codetablissement) }}">
                        @error('codetablissement')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="nometablissement" class="form-label">Nom</label>
                        <input type="text" name="nometablissement" id="nometablissement" placeholder="Enter nom de etablissement" class="form-control @error('nometablissement') is-invalid @enderror" value="{{ old('nometablissement',$etablissement->nometablissement) }}">
                        @error('nometablissement')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="tel_fixe_etablissement" class="form-label">Télephone</label>
                        <input type="text" name="tel_fixe_etablissement" id="tel_fixe_etablissement" placeholder="Enter Téléphone" class="form-control @error('tel_fixe_etablissement') is-invalid @enderror" value="{{ old('tel_fixe_etablissement',$etablissement->tel_fixe_etablissement) }}">
                        @error('tel_fixe_etablissement')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                    
                    <div class="mb-3">
                        <label for="adretablissement" class="form-label">Adresse</label>
                        <textarea name="adretablissement" id="adretablissement" cols="30" rows="4" placeholder="Enter Address" class="form-control">{{ old('adretablissement',$etablissement->adretablissement) }}</textarea>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary my-3">Modifier</button>

        </form>
    </div>

    
</body>
</html>