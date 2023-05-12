<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Form Select</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
    body {
        color: #fff;
        background: #f8f6f6;
        font-family: 'Roboto', sans-serif;
    }
    .form-control {
        font-size: 15px;
    }
    .form-control, .form-control:focus, .input-group-text {
        border-color: #e1e1e1;
    }
    .form-control, .btn {        
        border-radius: 3px;
    }
    .signup-form {
        width: 40%;
        margin: 0 auto;
        padding: 30px 0;        
    }
    .signup-form form {
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form h2 {
        color: #333;
        font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }
    .signup-form .form-group {
        margin-bottom: 20px;
    }
    .signup-form label {
        font-weight: normal;
        font-size: 15px;
    }
    .signup-form .form-control {
        min-height: 38px;
        box-shadow: none !important;
    }   
    .signup-form .input-group-addon {
        max-width: 42px;
        text-align: center;
    }   
    .signup-form .btn, .signup-form .btn:active {        
        font-size: 16px;
        font-weight: bold;
        background: #19aa8d !important;
        border: none;
        min-width: 140px;
    }
    .signup-form .btn:hover, .signup-form .btn:focus {
        background: #179b81 !important;
    }
    .signup-form a {
        color: #fff;    
        text-decoration: underline;
    }
    .signup-form a:hover {
        text-decoration: none;
    }
    .signup-form form a {
        color: #19aa8d;
        text-decoration: none;
    }   
    .signup-form form a:hover {
        text-decoration: underline;
    }
</style>

</head>
<body>

    <div class="signup-form">
        <form action="{{ route('sortie.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2>Form Select Basic</h2>
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <hr>
            <div class="form-group" id="beneficiaire">
                <div class="input-group">
                    <label for="name" class="col-sm-2 col-form-label">beneficiaire *</label>
                    <select class="form-control" name="beneficiaire" id="beneficiaire">
                        <option selected disabled>--- Select beneficiaire ---</option>
                        @foreach ($beneficiaire as $beneficiaires )
                        <option value="{{ $beneficiaires->idbeneficiaire }}">{{ $beneficiaires->nombeneficiaire }} - {{ $beneficiaires->nometablissement }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
             
            <div class="form-group" id="sortie">
                <div class="input-group">
                    <label for="name" class="col-sm-2 col-form-label">Numero de sortie *</label>
                    <input id="numsortie" type="text"  class="form-control @error('sortie') is-invalid @enderror" name="numsortie" value="{{ old('numsortie') }}" >
                    
                </div>
            </div>
            <div class="form-group" id="sortie">
                <div class="input-group">
                    <label for="name" class="col-sm-2 col-form-label">Date de sortie *</label>
                    <input id="sortie" type="date"  class="form-control @error('sortie') is-invalid @enderror" name="sortie" value="{{ old('sortie') }}" >
                    
                </div>
            </div>
            
        
    <div class="form-group">
        <h4>Liste des produits</h4>
        <p> choisir les produits donnes </p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Produits</th>
                    <th>Quantite disponible </th>
                    <th>Quantite a livrer</th>
                </tr>
            </thead>
            <tbody>
            @if($produits->isNotEmpty())
            
                    @foreach ($produits as $produit)
                    <tr>
                     
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="produitsSelected[{{ $produit->idproduit }}]" value="{{ $produit->idproduit }}">
                            </div>
                        </td>
                        <td>{{ $produit->nomproduit }}</td>
                    
                        <td> {{ $produit->quantiter }}   </td>
                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" name="quantities[{{ $produit->idproduit }}]" min="0" max="{{ $produit->quantiter }}" title="Veuillez saisir une quantité entre 1 et {{ $produit->quantiter }}"  value="0">
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6">Record Not Found</td>
                    </tr>
                    @endif
                
            </tbody>
        </table>
    </div>


            <div class="form-group">
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-form-label"></label>
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                </div>
            </div>
        </form>
    </div>

  
</body>
</html>
