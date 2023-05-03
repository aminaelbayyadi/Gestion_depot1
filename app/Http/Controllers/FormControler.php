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
                'fournisseur' => 'required',
            'reception' => 'required',
            'produitsSelected' => 'required|array',
            'quantities' => 'required|array'
            ]);
    
            if($validator->passes()){
                $reception=new Reception();
                $reception->fournisseur_id = $request->fournisseur;
                $reception->datereception = $request->reception;
                $reception->nbrarticle =3;
                $reception->save();


    } else {
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

 
       $lastid = Reception::latest()->first()->id;

       
        


       $selectedProducts = array();
       if (isset($_POST['produitsSelected']) && in_array($produits->idproduit, $_POST['produitsSelected'])) {
        // Add the current product to the selected products array
        $selectedProducts[] = $produits;
        }
       
       $arrqte = array();
       $arrqte = $_POST['quantities'];
        
    $arr = array_combine($selectedProducts,$arrqte);
       foreach ($arr as $prod => $qte) {
        $detailreception=new Detaitreception();
            $detailreception -> reception_id = $lastid +1;
            $detailreception -> produit_id = $prod;
            $detailreception -> quantite_recue = $qte;
      
      $detailreception ->save();
       }


    }



            
            // Attach the selected products and their quantities to the reception record
          //  foreach ($selectedProducts as $produitId) {
          //      $reception->produits()->attach($produitId, ['quantite' => $quantities[$produitId]]);
          //  }
            
            // Redirect to the receptions index page with a success message
            return redirect()->route('stock.index')->with('success', 'Reception created successfully.');
        }
        


    }
    

