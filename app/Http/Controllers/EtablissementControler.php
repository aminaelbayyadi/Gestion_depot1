<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Etablissement;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;

class EtablissementControler extends Controller
{
    public function index(){
        $etablissements = etablissement::orderBy('idetablissement','DESC')->paginate(50);

        return view('etablissement.list',['etablissements' => $etablissements]);
    }
    public function create(){
        return view('etablissement.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'codetablissement' =>'required',
            'nometablissement' =>'required',
            'tel_fixe_etablissement' =>'required',
            'adretablissement' =>'required',
        ]);

        if($validator->passes()){
            //save data
            $etablissement=new etablissement();
            $etablissement->codetablissement = $request->codetablissement;
            $etablissement->nometablissement = $request->nometablissement;
           $etablissement->tel_fixe_etablissement = $request->tel_fixe_etablissement;
            $etablissement->adretablissement = $request->adretablissement;
            $etablissement->save();

            return redirect()->route('etablissements.index')->with('success','etablissement added successfully.');


        } else {
            // return with errrors
            return redirect()->route('etablissements.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($idetablissement){
        $etablissement = etablissement::findOrFail($idetablissement);
        return view('etablissement.edit',['etablissement'=>$etablissement]);
    }

    public function update($idetablissement,Request $request){

        $validator = Validator::make($request->all(),[
            'codetablissement' =>'required',
            'nometablissement' =>'required',
            'tel_fixe_etablissement' =>'required',
            'adretablissement' =>'required',
        ]);

        if($validator->passes()){

            $etablissement= Etablissement::find($ididetablissement);
            $etablissement ->fill($request->post())->save();

            return redirect()->route('etablissements.index')->with('success','etablissement updated successfully.');
        } else {
            // return with errrors
            return redirect()->route('etablissements.edit',$idetablissement)->withErrors($validator)->withInput();
        }
    

}
public function destroy($idetablissement, Request $request){
   $etablissement= etablissement::findOrFail($idetablissement);
   $etablissement->delete();
   return redirect()->route('etablissements.index')->with('success','etablissement deleted successfully.');;
}
}