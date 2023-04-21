<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FournisseurControler extends Controller
{
    public function index(){
return view('fournisseur.list');
    }
}
