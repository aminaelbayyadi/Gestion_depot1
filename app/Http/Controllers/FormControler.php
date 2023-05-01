<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FormControler extends Controller
{
    // index page
    public function index()
    {
        $fournisseur = DB::table('fournisseurs')->get();
        return view('formselect',compact('fournisseur'));
    }
    
}
