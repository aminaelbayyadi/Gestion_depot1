<?php

namespace App\Http\Controllers;
use App\Models\Sortie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
class SortieController extends Controller
{
    // index page
    public function index()
    {
        $beneficiaire = DB::table('beneficiaires')->get();
        $sortie = DB::table('sorties')->get();
        
        
        return view('formselect',compact('sortie','beneficiaire'));
       
    }

    public function select(){
        $produits = DB::table('produits')->get();
        $beneficiaire = DB::table('beneficiaires')->get();
        return view('sortie.create',compact('beneficiaire','produits'));

    }


        public function save(Request $request)
        {
            
         // Retrieve the selected products and their quantities
        // $selectedProducts = $request->input('produitsSelected');
         $quantities = $request->input('quantities');
     
         // Calculate the sum of quantities
         $nbrArticles = array_sum($quantities);
        // return with errrors
       // return redirect()->route('stock.index')->withErrors($validator)->withInput();
       $Sortie=new Sortie();
       $Sortie->beneficiaire_id  = $request->beneficiaire;
       $Sortie->datesortie = $request->sortie;
       $Sortie->nbr_article_sortie =$nbrArticles;
       $Sortie->save();

 
       $lastid = Sortie::latest()->first()-> idsortie;
      
       $produitsSelected = $request->input('produitsSelected');
       $quantities = $request->input('quantities');
       
       // Loop through the selected products and their quantities
       for ($i = 0; $i < count($produitsSelected); $i++) {
           $produitId = $produitsSelected[$i];
           $quantity = $quantities[$i];
   
           // Insert the product and its quantity into the detailSortie table
           DB::table('detailsortie')->insert([
            'produit_id' => $produitId,
            'sortie_id' => $lastid,
               
               'quantite' => $quantity
           ]);
       }
   


       return redirect()->route('sortie.index')->with('success', 'Sortie created successfully.');
    }



            
            // Attach the selected products and their quantities to the Sortie record
          //  foreach ($selectedProducts as $produitId) {
          //      $Sortie->produits()->attach($produitId, ['quantite' => $quantities[$produitId]]);
          //  }
            
            // Redirect to the Sorties index page with a success message
            
        }
        


      
    


