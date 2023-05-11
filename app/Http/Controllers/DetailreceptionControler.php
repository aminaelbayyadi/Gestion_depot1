<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Detaitreception;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;

class DetailreceptionControler extends Controller
{
    public function index(Request $request)
{
    $idreception = $request->input('idreception');
    $detailreceptions = Detaitreception::join('produits', 'produits.idproduit', '=', 'detailsreception.produit_id')
    ->join('receptions', 'receptions.idreception', '=', 'detailsreception.reception_id')
    ->where('reception_id', '=', $idreception)
    ->orderBy('detailsreception.iddetailsrec', 'DESC')
    ->get();


    return view('detailreception.list', ['detailreceptions' => $detailreceptions,'id' => $idreception]);
}
}