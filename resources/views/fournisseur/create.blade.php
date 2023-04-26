<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMPLE LARAVEL 9 CRUD IN HINDI</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">SIMPLE LARAVEL 9 CRUD IN HINDI</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">fournisseurs</div>
            <div>
                <a href="{{ route('fournisseurs.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('fournisseurs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="codefour" class="form-label">code</label>
                        <input type="text" name="codefour" id="codefour" placeholder="Enter code" class="form-control @error('codefour') is-invalid @enderror" value="{{ old('codefour') }}">
                        @error('codefour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="nomfour" class="form-label">nom de fournisseur</label>
                        <input type="text" name="nomfour" id="nomfour" placeholder="Enter nom de fournisseur" class="form-control @error('nomfour') is-invalid @enderror" value="{{ old('nomfour') }}">
                        @error('nomfour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="telfour" class="form-label">télephone de fournisseur</label>
                        <input type="text" name="telfour" id="telfour" placeholder="Enter Téléphone" class="form-control @error('telfour') is-invalid @enderror" value="{{ old('telfour') }}">
                        @error('telfour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror                        
                    </div>

                    <div class="mb-3">
                        <label for="emailfour" class="form-label">Email</label>
                        <input type="text" name="emailfour" id="emailfour" placeholder="Enter Email" class="form-control @error('emailfour') is-invalid @enderror" value="{{ old('emailfour') }}">
                        @error('emailfour')
                            <p class="invalid-feedback">{{ $message }}</p>    
                        @enderror      
                    </div>

                    <div class="mb-3">
                        <label for="adrfour" class="form-label">Address</label>
                        <textarea name="adrfour" id="adrfour" cols="30" rows="4" placeholder="Enter Address" class="form-control">{{ old('adrfour') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imagefour" class="form-label"></label>
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