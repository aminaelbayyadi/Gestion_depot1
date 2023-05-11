<?php

namespace App\Http\Controllers;
use App\Models\Sortie;
use App\Models\Beneficiaire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
class SortieController extends Controller
{
    // index page
    public function index()
    {
        $beneficiaire = DB::table('beneficiaires')->get();
        $Sorties = Sortie::join('beneficiaires', 'sorties.beneficiaire_id', '=', 'beneficiaires.idbeneficiaire')->orderBy('idbeneficiaire','DESC')
        ->paginate(50);
        
        
        return view('sortie.list',compact('Sorties','beneficiaire'));
       
    }



    public function select(){
        $produits = DB::table('produits')
        ->join('stock', 'produits.idproduit', '=', 'stock.produit_id')
        ->select('produits.*', 'stock.quantiter')
        ->get();
        
        $beneficiaire = Beneficiaire::join('etablissements', 'beneficiaires.etablissement_id', '=', 'etablissements.idetablissement')->orderBy('idbeneficiaire','DESC')->paginate(50);
        return view('sortie.create',compact('beneficiaire','produits'));

    }


        public function save(Request $request)
        {
            
         // Retrieve the selected products and their quantities
        // $selectedProducts = $request->input('produitsSelected');
         $quantities = $request->input('quantities');
     

         $lastid = Sortie::latest()->first()-> idsortie;
      
         $produitsSelected = $request->input('produitsSelected');
         $quantities = $request->input('quantities');
  
         // Calculate the sum of quantities
         $nbrArticles = count($produitsSelected);
         
        // return with errrors
       // return redirect()->route('stock.index')->withErrors($validator)->withInput();
       $Sortie=new Sortie();
       $Sortie->beneficiaire_id  = $request->beneficiaire;
       $Sortie->datesortie = $request->sortie;
       $Sortie->nbr_article_sortie =$nbrArticles;
       $Sortie->save();

 
   
       
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
            
       

        public function edit(){}
        public function delete(){}

    }       
        


      
    


