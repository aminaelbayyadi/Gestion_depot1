<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Stock;
use App\Models\reception;
use App\Models\sortie;
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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalProduits = Stock::count();
        $totalFournisseurs = Fournisseur::count();
        
        $receptionsData = Reception::selectRaw("DATE_FORMAT(datereception, '%m/%Y') as month_year, count(*) as count")
        ->groupBy('month_year')
        ->get();
    
        $labels = $receptionsData->pluck('month_year');
        $counts = $receptionsData->pluck('count');
    
        $receptionsChart = session('receptionsChart');
        $receptionsChart = new UserChart;
        $receptionsChart->labels($labels);
        $receptionsChart->dataset('Nombre de receptions', 'bar', $counts)->backgroundColor('green');
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

        $sortiesData = Sortie::selectRaw("DATE_FORMAT(datesortie, '%m/%Y') as month_year, count(*) as count")
        ->groupBy('month_year')
        ->get();
    
        $labels = $sortiesData->pluck('month_year');
        $counts = $sortiesData->pluck('count');
    
        $sortiesChart = session('sortiesChart');
        $sortiesChart = new UserChart;
        $sortiesChart->labels($labels);
        $sortiesChart->dataset('Nombre de sorties', 'bar', $counts)->backgroundColor('green');
        $sortiesChart->options([
            'title' => [
                'display' => false,
                'text' => 'Nombre de sorties par mois'
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
                            'labelString' => 'Nombre de sorties'
                        ]
                    ]
                ]
            ]
        ]);
        session(['sortiesChart' => $sortiesChart]);


        $produitsChart = session('produitsChart');

        $stockData = Stock::selectRaw("produits.nomproduit as name, (SUM(stock.quantiter) / (SELECT SUM(stock.quantiter) FROM stock)) * 100 as rate")
        ->join('produits', 'stock.produit_id', '=', 'produits.idproduit')
        ->groupBy('produits.nomproduit')
        ->get();

        $labels = $stockData->pluck('name');
        $rates = $stockData->pluck('rate');

        function generateRandomColors($count)
        {
            $colors = [];
            for ($i = 0; $i < $count; $i++) {
                $colors[] =  '#' . substr(md5(rand()), 0, 6);
            }
            return $colors;
        }

        $count = Stock::count();
        $colors = generateRandomColors($count);
        $produitsChart = new UserChart;
        $produitsChart->labels($labels);
        $produitsChart->dataset('N', 'pie', $rates)->backgroundColor($colors);
        $produitsChart->options([
            'title' => [
                'display' => false,
                'text' => 'Pourcentage des produits dans le stock'
            ],
            'scales' => [
                'xAxes' => [
                    [
                       
                            'display' => false,
                           
                        
                    ]
                ],
                'yAxes' => [
                    [
                       
                            'display' => false,
                            
                        
                    ]
                ]
            ]
        ]);
        session(['produitsChart' => $produitsChart]);

        

        
        return view('home',compact('receptionsChart','sortiesChart','totalProduits','totalFournisseurs','produitsChart'));
    }
}

        
    

