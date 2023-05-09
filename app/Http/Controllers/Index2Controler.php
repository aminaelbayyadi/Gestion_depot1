<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;

class Index2Controler extends Controller
{
    public function index(){

        return view('homes.index2');
    }
}
?>