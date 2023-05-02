<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Stock;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalProducts = Produit::count();
        $totalFournisseurs = Stock::count();
        
        
        
        return view('home', compact('totalProducts', 'totalFournisseurs'));
    }
}

        
    

