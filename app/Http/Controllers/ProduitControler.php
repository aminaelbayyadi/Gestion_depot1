<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Produit;
use App\Models\Stock;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
class ProduitControler extends Controller
{
    public function index(){
        $produits = produit::orderBy('idproduit','DESC')->paginate(50);

        return view('produit.list',['produits' => $produits]);
    }
    public function create(){
        return view('produit.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'codeproduit' =>'required',
            'nomproduit' =>'required'
        ]);

        if($validator->passes()){
            //save data
            $produit=new produit();
            $produit->codeproduit = $request->codeproduit;
            $produit->nomproduit = $request->nomproduit;
            $produit->save();

            $lastid = Produit::latest()->first()-> idproduit;
            $stock=new stock();
            $stock->quantiter = 0;
            $stock->produit_id = $lastid;
            $stock->save();
            return redirect()->route('produits.index')->with('success','Produit ajouté avec succès.');
        } else {
            // return with errrors
            return redirect()->route('produits.create')->withErrors($validator)->withInput();
        }
    }
    public function edit($idproduit){
        $produit = produit::findOrFail($idproduit);
        return view('produit.edit',['produit'=>$produit]);
    }
    public function update($idproduit,Request $request){

        $validator = Validator::make($request->all(),[
            'codeproduit' =>'required',
            'nomproduit' =>'required'
        ]);
        if($validator->passes()){
            $produit= Produit::find($idproduit);
            $produit ->fill($request->post())->save();
    
            return redirect()->route('produits.index')->with('success','Produit modifié avec succès.');
        } else {
            // return with errrors
            return redirect()->route('produits.edit',$idproduit)->with('error','Action échouée.');
        }
}
public function destroy($idproduit, Request $request)
{
    $produit = Produit::findOrFail($idproduit);
    
    $stock = Stock::where('produit_id', $idproduit)->first();
    
    if ($stock && $stock->quantiter == 0) {
        $produit->delete();
        $stock->delete();
       
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    } else {
        return redirect()->route('produits.index')->with('error', 'Produit encore dans le stock.');
    }
}
}