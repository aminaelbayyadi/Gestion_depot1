<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Produit;
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
            return redirect()->route('produits.index')->with('success','produit added successfully.');
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
            $produit =new produit();
            $produit ->fill($request->post())->save();
    
            return redirect()->route('produits.index')->with('success','produit updated successfully.');
        } else {
            // return with errrors
            return redirect()->route('produits.edit',$idproduit)->withErrors($validator)->withInput();
        }
}
public function destroy($idproduit, Request $request){
   $produit= produit::findOrFail($idproduit);
   $produit->delete();
   return redirect()->route('produits.index')->with('success','produit deleted successfully.');;
}
}