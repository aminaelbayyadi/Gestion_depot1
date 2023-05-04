<?php

namespace App\Http\Controllers;
use App\Models\Reception;
use App\Models\Detaitreception;
use Illuminate\Support\Facades\Validator;
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

        public function save(Request $request)
        {
            
         // Retrieve the selected products and their quantities
        // $selectedProducts = $request->input('produitsSelected');
         $quantities = $request->input('quantities');
     
         // Calculate the sum of quantities
         $nbrArticles = array_sum($quantities);
        // return with errrors
       // return redirect()->route('stock.index')->withErrors($validator)->withInput();
       $reception=new Reception();
       $reception->fournisseur_id = $request->fournisseur;
       $reception->datereception = $request->reception;
       $reception->nbrarticle =$nbrArticles;
       $reception->save();

 
       $lastid = Reception::latest()->first()-> idreception;
      
       $produitsSelected = $request->input('produitsSelected');
       $quantities = $request->input('quantities');
       
       // Loop through the selected products and their quantities
       for ($i = 0; $i < count($produitsSelected); $i++) {
           $produitId = $produitsSelected[$i];
           $quantity = $quantities[$i];
   
           // Insert the product and its quantity into the detailreception table
           DB::table('detailsreception')->insert([
            'produit_id' => $produitId,
            'reception_id' => $lastid,
               
               'quantite_recue' => $quantity
           ]);
       }
   


       return redirect()->route('reception.index')->with('success', 'Reception created successfully.');
    }



            
            // Attach the selected products and their quantities to the reception record
          //  foreach ($selectedProducts as $produitId) {
          //      $reception->produits()->attach($produitId, ['quantite' => $quantities[$produitId]]);
          //  }
            
            // Redirect to the receptions index page with a success message
            
        }
        


      
    

