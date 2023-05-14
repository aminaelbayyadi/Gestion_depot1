<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Stock;
use App\Models\reception;
use Illuminate\Support\Facades\Session;
use App\Charts\UserChart;

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
        $totalProduits = Produit::count();
        $totalFournisseurs = Fournisseur::count();
        
        $receptionsData = Reception::selectRaw("DATE_FORMAT(datereception, '%m/%Y') as month_year, count(*) as count")
        ->groupBy('month_year')
        ->get();
    
        $labels = $receptionsData->pluck('month_year');
        $counts = $receptionsData->pluck('count');
    
        $receptionsChart = session('receptionsChart');
        $receptionsChart = new UserChart;
        $receptionsChart->labels($labels);
        $receptionsChart->dataset('Nombre de receptions', 'bar', $counts);
        $receptionsChart->options([
            'title' => [
                'display' => true,
                'text' => 'Nombre de receptions par mois'
            ],
            'scales' => [
                'xAxes' => [
                    [
                        'scaleLabel' => [
                            'display' => true,
                            'labelString' => 'Mois'
                        ]
                    ]
                ],
                'yAxes' => [
                    [
                        'scaleLabel' => [
                            'display' => true,
                            'labelString' => 'Nombre de receptions'
                        ]
                    ]
                ]
            ]
        ]);
        session(['receptionsChart' => $receptionsChart]);

        
        return view('home', [ 'receptionsChart' => $receptionsChart ] );
    }
}

        
    

