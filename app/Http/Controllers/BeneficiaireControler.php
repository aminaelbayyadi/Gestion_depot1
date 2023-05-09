<?php
 
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Validator;
 use App\Models\Beneficiaire;
 use Illuminate\Support\Facades\File;
 use Illuminate\Pagination\Paginator;
 use DB;
class BeneficiaireControler extends Controller
{
    public function index(){
        $etablissements = DB::table('etablissements')->get();
        $beneficiaires = beneficiaire::join('etablissements', 'beneficiaires.etablissement_id', '=', 'etablissements.idetablissement')->orderBy('idbeneficiaire','DESC')
        ->paginate(50);
       return view('beneficiaire.list',['beneficiaires' => $beneficiaires]);
                //return view('beneficiaire.list',compact('etablissement','produits'));

    }
    public function create(){
        $etablissements = DB::table('etablissements')->get();

        return view('beneficiaire.create',compact('etablissements'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'code_beneficiaire' =>'required',
            'nombeneficiaire' =>'required',
            'fonction' =>'required',
            'etablissement' =>'required',
            'situation' =>'required',
        ]);

        if($validator->passes()){
            //save data
            $beneficiaire=new beneficiaire();
            $beneficiaire->code_beneficiaire= $request->code_beneficiaire;
            $beneficiaire->nombeneficiaire= $request->nombeneficiaire;
           $beneficiaire->fonction= $request->fonction;
            $beneficiaire->etablissement_id= $request->etablissement;
            $beneficiaire->situation= $request->situation;

            $beneficiaire->save();

            return redirect()->route('beneficiaires.index')->with('success','beneficiaire added successfully.');


        } else {
            // return with errrors
            return redirect()->route('beneficiaires.create')->withErrors($validator)->withInput();
      
        }
    }

    public function edit($idbeneficiaire
){
        $beneficiaire= beneficiaire::findOrFail($idbeneficiaire);
        return view('beneficiaire.edit',['beneficiaire'=>$beneficiaire]);
    }

    public function update($idbeneficiaire,Request $request){

        $validator = Validator::make($request->all(),[
            'code_beneficiaire' =>'required',
            'nombeneficiaire' =>'required',
            'fonction' =>'required',
            'etablissement_id' =>'required',
            'situation' =>'required',

        ]);

        if($validator->passes()){
            $beneficiaire=new beneficiaire();
            $beneficiaire->fill($request->post())->save();

            return redirect()->route('beneficiaires.index')->with('success','beneficiaire updated successfully.');
        } else {
            // return with errrors
            return redirect()->route('beneficiaires.edit',$idbeneficiaire)->withErrors($validator)->withInput();
        }
    

}
public function destroy($idbeneficiaire, Request $request){
   $beneficiaire= beneficiaire::findOrFail($idbeneficiaire);
   $beneficiaire->delete();
   return redirect()->route('beneficiaires.index')->with('success','beneficiaire deleted successfully.');;
} 
}