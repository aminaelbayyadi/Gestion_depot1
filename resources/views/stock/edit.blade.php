<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier une quantité</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-info py-3">
        <div class="container">
            <div class="h4 text-white">Modifier une quantité</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Veuillez saisir la nouvelle quantité : </div>
            <div>
                <a href="{{ route('stock.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </div>

        <form action="{{ route('stock.update',$stock->idstock) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-2">
                        <label for="quantiter" class="form-label">Nouvelle quantité</label>
                        <input type="number" name="quantiter" id="quantiter"  class="form-control @error('quantiter') is-invalid @enderror" value="{{ old('quantiter',$stock->quantiter) }}">
                        @error('quantiter')
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