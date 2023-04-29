<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMPLE LARAVEL 9 CRUD </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">SIMPLE LARAVEL 9 CRUD </div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">etablissement</div>
            <div>
                <a href="{{ route('etablissements.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('etablissements.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="codetablissement" class="form-label">code</label>
                        <input type="text" name="codetablissement" id="codetablissement" placeholder="Enter code" class="form-control @error('codetablissement') is-invalid @enderror" value="{{ old('codetablissement') }}">
                        @error('codetablissement')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="nometablissement" class="form-label">nom de etablissement</label>
                        <input type="text" name="nometablissement" id="nometablissement" placeholder="Enter nom de etablissement" class="form-control @error('nometablissement') is-invalid @enderror" value="{{ old('nometablissement') }}">
                        @error('nometablissement')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="tel_fixe_etablissement" class="form-label">télephone de etablissement</label>
                        <input type="text" name="tel_fixe_etablissement" id="tel_fixe_etablissement" placeholder="Enter Téléphone" class="form-control @error('tel_fixe_etablissement') is-invalid @enderror" value="{{ old('tel_fixe_etablissement') }}">
                        @error('tel_fixe_etablissement')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                    <div class="mb-3">
                        <label for="adretablissement" class="form-label">Address</label>
                        <textarea name="adretablissement" id="adretablissement" cols="30" rows="4" placeholder="Enter Address" class="form-control">{{ old('adretablissement') }}</textarea>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary mt-3">Save etablissement</button>

        </form>
    </div>
</body>
</html>