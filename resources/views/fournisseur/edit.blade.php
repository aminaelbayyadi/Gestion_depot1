<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier un fournisseur</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

<div class="bg-info py-3">
        <div class="container">
            <div class="h4 text-white">Modifier un fournisseur</div>
        </div>
    </div>
    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Veuillez modifier les informations souhaitées :</div>
            <div>
                <a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </div>

        <form action="{{ route('fournisseurs.update',$fournisseur->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="codefour" class="form-label">Code</label>
                        <input type="text" name="codefour" id="codefour" placeholder="Enter code" class="form-control @error('codefour') is-invalid @enderror" value="{{ old('codefour',$fournisseur->codefour) }}">
                        @error('codefour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="nomfour" class="form-label">Nom du fournisseur</label>
                        <input type="text" name="nomfour" id="nomfour" placeholder="Enter nom de fournisseur" class="form-control @error('nomfour') is-invalid @enderror" value="{{ old('nomfour',$fournisseur->nomfour) }}">
                        @error('nomfour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="telfour" class="form-label">Télephone</label>
                        <input type="text" name="telfour" id="telfour" placeholder="Enter Téléphone" class="form-control @error('telfour') is-invalid @enderror" value="{{ old('telfour',$fournisseur->telfour) }}">
                        @error('telfour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="emailfour" class="form-label">Email</label>
                        <input type="text" name="emailfour" id="emailfour" placeholder="Enter Email" class="form-control @error('emailfour') is-invalid @enderror" value="{{ old('emailfour',$fournisseur->emailfour) }}">
                        @error('emailfour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror      
                    </div>

                    <div class="mb-3">
                        <label for="adrfour" class="form-label">Adresse</label>
                        <textarea name="adrfour" id="adrfour" cols="30" rows="4" placeholder="Enter Address" class="form-control">{{ old('adrfour',$fournisseur->adrfour) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imagefour" class="form-label"></label>
                        <input type="file" name="imagefour" id="imagefour" class="@error('imagefour') is-invalid @enderror">

                       @error('imagefour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror   
                        <div class="pt-3">
                        @if($fournisseur->imagefour != '' && file_exists(public_path().'/uploads/fournisseurs/'.$fournisseur->imagefour))
                            <img src="{{ url('uploads/fournisseurs/'.$fournisseur->imagefour) }}" alt="" width="100" height="100" >
                            
                            @endif
                            <div>

                    </div>
                
                </div>
            </div>

            <button class="btn btn-primary my-3">Modifier le fournisseur</button>

        </form>
    </div>

    
</body>
</html>