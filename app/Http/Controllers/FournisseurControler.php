<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;

class FournisseurControler extends Controller
{
    public function index(){
        $fournisseurs = Fournisseur::orderBy('id','DESC')->paginate(50);

        return view('fournisseur.list',['fournisseurs' => $fournisseurs]);
    }
    public function create(){
        return view('fournisseur.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'codefour' =>'required',
            'nomfour' =>'required',
            'telfour' =>'required',
            'emailfour' =>'required',
            'imagefour' =>'sometimes|image:gif,png,jpeg,jpg'
        ]);

        if($validator->passes()){
            //save data
            $fournisseur=new Fournisseur();
            $fournisseur->codefour = $request->codefour;
            $fournisseur->nomfour = $request->nomfour;
           $fournisseur->telfour = $request->telfour;
            $fournisseur->emailfour = $request->emailfour;
            $fournisseur->adrfour = $request->adrfour;
            $fournisseur->save();

                        // Upload image here
            if ($request->imagefour) {
                $ext = $request->imagefour->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->imagefour->move(public_path().'/uploads/fournisseurs/',$newFileName); // This will save file in a folder
                $fournisseur->imagefour= $newFileName;
                $fournisseur->save();
            }
            
            return redirect()->route('fournisseurs.index')->with('success','Fournisseur added successfully.');


        } else {
            // return with errrors
            return redirect()->route('fournisseurs.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id){
        $fournisseur = Fournisseur::findOrFail($id);
        return view('fournisseur.edit',['fournisseur'=>$fournisseur]);
    }

    public function update($id,Request $request){

        $validator = Validator::make($request->all(),[
            'codefour' =>'required',
            'nomfour' =>'required',
            'telfour' =>'required',
            'emailfour' =>'required',
            'imagefour' =>'sometimes|image:gif,png,jpeg,jpg'
        ]);

        if($validator->passes()){
            //save data
           $fournisseur= Fournisseur::find($id);
           // $fournisseur->codefour = $request->codefour;
          //  $fournisseur->nomfour = $request->nomfour;
           //$fournisseur->telfour = $request->telfour;
           // $fournisseur->emailfour = $request->emailfour;
            //$fournisseur->adrfour = $request->adrfour;
            //$fournisseur->save();

            $fournisseur ->fill($request->post())->save();


                        // Upload image here
            if ($request->imagefour) {
                $oldImage =$fournisseur->imagefour;

                $ext = $request->imagefour->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->imagefour->move(public_path().'/uploads/fournisseurs/',$newFileName); // This will save file in a folder
                $fournisseur->imagefour= $newFileName;
                $fournisseur->save();
                file::delete(public_path().'/uploads/fournisseurs/'.$oldImage);
            }
            
            return redirect()->route('fournisseurs.index')->with('success','Fournisseur updated successfully.');
        } else {
            // return with errrors
            return redirect()->route('fournisseurs.edit',$id)->withErrors($validator)->withInput();
        }
    

}
public function destroy($id, Request $request){
   $fournisseur= Fournisseur::findOrFail($id);
   $receptions = $fournisseur->receptions;
foreach ($receptions as $reception) {
    $reception->fournisseur_id = null;
    $reception->save();
}
   file::delete(public_path().'/uploads/fournisseurs/'.$fournisseur->imagefour);
   $fournisseur->delete();
   return redirect()->route('fournisseurs.index')->with('success','Fournisseur deleted successfully.');;
}
}