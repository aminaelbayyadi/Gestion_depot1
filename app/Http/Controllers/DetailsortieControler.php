<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Detaitsortie;
use App\Models\sortie;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;

class DetailsortieControler extends Controller
{
    public function index(Request $request)
{
    $idsortie = $request->input('idsortie');
    $detailsorties = Detaitsortie::join('produits', 'produits.idproduit', '=', 'detailsortie.produit_id')
    ->join('sorties', 'sorties.idsortie', '=', 'detailsortie.sortie_id')
    ->where('sortie_id', '=', $idsortie)
    ->orderBy('detailsortie.iddetailsortie', 'DESC')
    ->get();
    $sortie = Sortie::where('idsortie', $idsortie)->firstOrFail();

    return view('detailsortie.list', ['detailsorties' => $detailsorties,'id' => $sortie->numsortie] );
}
}