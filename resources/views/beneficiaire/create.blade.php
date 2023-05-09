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
            <div class="h4">beneficiaire</div>
            <div>
                <a href="{{ route('beneficiaires.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('beneficiaires.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="code_beneficiaire" class="form-label">code</label>
                        <input type="text" name="code_beneficiaire" id="code_beneficiaire" placeholder="Enter code" class="form-control @error('codbeneficiaire') is-invalid @enderror" value="{{ old('codbeneficiaire') }}">
                        @error('code_beneficiaire')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="nombeneficiaire" class="form-label">nom de beneficiaire</label>
                        <input type="text" name="nombeneficiaire" id="nombeneficiaire" placeholder="Enter nom de beneficiaire" class="form-control @error('nombeneficiaire') is-invalid @enderror" value="{{ old('nombeneficiaire') }}">
                        @error('nombeneficiaire')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="fonction" class="form-label">fonction</label>
                        <input type="text" name="fonction" id="fonction" placeholder="Fonction" class="form-control @error('situation') is-invalid @enderror" value="{{ old('situation') }}">
                        @error('fonction')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                    <div class="mb-3">
                        <label for="etablissement" class="form-label">nom etablissement</label>

                        <select class="form-control" name="etablissement" id="etablissement">
                        <option selected disabled>--- Select etablissement ---</option>
                        @foreach ($etablissements as $etablissement )
                        <option value="{{ $etablissement->idetablissement }}">{{ $etablissement->nometablissement }}</option>
                        @endforeach
                    </select>
                                              
                    </div>
                    <div class="mb-3">
                        <label for="situation" class="form-label">situation</label>
                        <input type="text" name="situation" id="situation" placeholder="situation" class="form-control @error('situation') is-invalid @enderror" value="{{ old('situation') }}">
                        @error('situation')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                </div>
            </div>

            <button class="btn btn-primary mt-3">Save beneficiaire</button>

        </form>
    </div>
</body>
</html>