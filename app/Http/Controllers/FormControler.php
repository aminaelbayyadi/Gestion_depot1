<?php

namespace App\Http\Controllers;
use App\Models\Reception;
use App\Models\Detailreception;
use Illuminate\Http\Request;
use DB;
class FormControler extends Controller
{
    // index page
    public function index()
    {
        $fournisseur = DB::table('fournisseurs')->get();
        $produits = DB::table('produits')->get();
        
        return view('formselect',compact('fournisseur','produits'));
       
    }

    

        

        public function store(Request $request)
        {
            // Validate the request data
            $request->validate([
                'fournisseur' => 'required',
                'reception' => 'required|date',
                'produitsSelected' => 'required|array',
                'quantities' => 'required|array'
            ]);
            
            // Retrieve the selected products and their quantities
            $selectedProducts = $request->input('produitsSelected');
            $quantities = $request->input('quantities');
        
            // Calculate the sum of quantities
            $nbrArticles = array_sum($quantities);
            dump(nbrArticles);
            
            // Create a new Reception record
            $reception = new Reception([
                'fournisseur_id' => $request->input('fournisseur'),
                'datereception' => $request->input('reception'),
                'nbrarticle' => $nbrArticles
            ]);
            
            $reception->save();
            
            // Attach the selected products and their quantities to the reception record
          //  foreach ($selectedProducts as $produitId) {
          //      $reception->produits()->attach($produitId, ['quantite' => $quantities[$produitId]]);
          //  }
            
            // Redirect to the receptions index page with a success message
            return redirect()->route('receptions.index')->with('success', 'Reception created successfully.');
        }
        


    }
    

