<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Detaitreception;
use App\Models\reception;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;

class DetailreceptionControler extends Controller
{
    public function index(Request $request)
{
    $idreception = $request->input('idreception');
    $detailreceptions = Detaitreception::join('receptions', 'receptions.idreception', '=', 'detailsreception.reception_id')
    ->where('reception_id', '=', $idreception)
    ->orderBy('detailsreception.iddetailsrec', 'DESC')
    ->get();

    $reception = Reception::where('idreception', $idreception)->firstOrFail();

    return view('detailreception.list', ['detailreceptions' => $detailreceptions,'id' => $reception->numreception]);
}
}