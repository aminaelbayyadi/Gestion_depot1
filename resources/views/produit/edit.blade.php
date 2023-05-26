<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier un produit</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-info py-3">
        <div class="container">
            <div class="h4 text-white">Modifier un produit</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Veuillez modifier les informations souhaitées : </div>
            <div>
                <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </div>

        <form action="{{ route('produits.update',$produit->idproduit) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="codeproduit" class="form-label">code</label>
                        <input type="text" name="codeproduit" id="codeproduit" placeholder="Enter code" class="form-control @error('codeproduit') is-invalid @enderror" value="{{ old('codeproduit',$produit->codeproduit) }}">
                        @error('codeproduit')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="nomproduit" class="form-label">nom de produit</label>
                        <input type="text" name="nomproduit" id="nomproduit" placeholder="Enter nom de produit" class="form-control @error('nomproduit') is-invalid @enderror" value="{{ old('nomproduit',$produit->nomproduit) }}">
                        @error('nomproduit')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                </div>
            </div>
            <button class="btn btn-primary my-3">Modifier</button>
        </form>
    </div>
</body>
</html>