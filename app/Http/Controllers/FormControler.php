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
            
            $validator = Validator::make($request->all(),[
                'fournisseur' =>'required',
                'reception' =>'required',
                'numreception' => 'required',
                'quantities' =>'required',
                'produitsSelected' =>'required',
               
            ]);
    
            if($validator->passes()){
     
        
      
       $produitsSelected = $request->input('produitsSelected');
       $quantities = $request->input('quantities',);

       $nbrArticles = count($produitsSelected);
         
        // return with errrors
       // return redirect()->route('stock.index')->withErrors($validator)->withInput();
       $reception=new Reception();
       $reception->nomfour = $request->fournisseur;
       $reception->numreception = $request->numreception;
       $reception->datereception = $request->reception;
       $reception->nbrarticle =$nbrArticles;
       $reception->save();

       $lastid = Reception::latest()->first()-> idreception;


       
       
       foreach ($request->input('produitsSelected', []) as $produitId) {
        $quantity = $request->input('quantities.' . $produitId, 0);
        
        // Insert the product and its quantity into the detailSortie table
        DB::table('detailsreception')->insert([
            'produit_id' => $produitId,
            'reception_id' => $lastid,
            'quantite_recue' => $quantity
        ]);

         // Update the stock table with the new quantity
    DB::table('stock')
    ->where('produit_id', $produitId)
    ->increment('quantiter', $quantity);
    }
   


       return redirect()->route('receptions.index')->with('success', 'Réception ajoutée.');
}
else{
    

    return redirect()->route('form/select')->with('error', 'Veulliez remplir toutes les informations !')->withInput();
}



            
            // Attach the selected products and their quantities to the reception record
          //  foreach ($selectedProducts as $produitId) {
          //      $reception->produits()->attach($produitId, ['quantite' => $quantities[$produitId]]);
          //  }
            
            // Redirect to the receptions index page with a success message
            
        }
        


    }     
    

