<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">Edit beneficiaire</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">beneficiaires</div>
            <div>
                <a href="{{ route('beneficiaires.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('beneficiaires.update',$beneficiaire->idbeneficiaire) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="code_beneficiaire" class="form-label">code</label>
                        <input type="text" name="code_beneficiaire" id="code_beneficiaire" placeholder="Enter code" class="form-control @error('code_beneficiaire') is-invalid @enderror" value="{{ old('code_beneficiaire',$beneficiaire->code_beneficiaire) }}">
                        @error('code_beneficiaire')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="nombeneficiaire" class="form-label">nom de beneficiaire</label>
                        <input type="text" name="nombeneficiaire" id="nombeneficiaire" placeholder="Enter nom de beneficiaire" class="form-control @error('nombeneficiaire') is-invalid @enderror" value="{{ old('nombeneficiaire',$beneficiaire->nombeneficiaire) }}">
                        @error('nombeneficiaire')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="fonction" class="form-label">fonction</label>
                        <input type="text" name="fonction" id="fonction" placeholder="fonction" class="form-control @error('tel_fixe_beneficiaire') is-invalid @enderror" value="{{ old('tel_fixe_beneficiaire',$beneficiaire->tel_fixe_beneficiaire) }}">
                        @error('fonction')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                    
                    <div class="mb-3">
                        <label for="etablissement_id" class="form-label">nom_etablissement</label>
                        <input type="text" name="etablissement_id" id="etablissement_id" placeholder="Enter Téléphone" class="form-control @error('tel_fixe_beneficiaire') is-invalid @enderror" value="{{ old('tel_fixe_beneficiaire',$beneficiaire->tel_fixe_beneficiaire) }}">
                        @error('etablissement_id')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                    
                    <div class="mb-3">
                        <label for="situation" class="form-label"> situation </label>
                        <input type="text" name="situation" id="situation" placeholder="Enter situation" class="form-control @error('tel_fixe_beneficiaire') is-invalid @enderror" value="{{ old('tel_fixe_beneficiaire',$beneficiaire->tel_fixe_beneficiaire) }}">
                        @error('situation')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>
                    
                </div>
            </div>

            <button class="btn btn-primary my-3">Update beneficiaire</button>

        </form>
    </div>

    
</body>
</html>