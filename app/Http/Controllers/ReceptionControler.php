<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Reception;
use App\Models\Fournisseur;
use DB;

use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
class receptionControler extends Controller
{
    public function index(){
        $fournisseur = DB::table('fournisseurs')->get();
        $receptions = Reception::join('fournisseurs', 'receptions.fournisseur_id', '=', 'fournisseurs.id')->orderBy('idreception','DESC')
        ->paginate(50);
        $Allreceptions =Reception::orderby('idreception','DESC')->paginate(50);
        return view('reception.list',compact('fournisseur','receptions','Allreceptions'));

    }
    public function create(Request $request){
        $fournisseurs= Fournisseur::create([
            'fournisseur_id' => $request['id']
        ]);
        return $fournisseurs;
        

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'fourrnisseur_id' =>'required',
            'datereception' =>'required',
            'nbrarticle' =>'required'
        ]);

        if($validator->passes()){
            //save data
            $reception=new reception();
            $reception->fourrnisseur_id = $request->fourrnisseur_id;
            $reception->datereception = $request->datereception;
            $reception->nbrarticle = $request->nbrarticle;
            $reception->save();
            return redirect()->route('receptions.index')->with('success','reception added successfully.');
        } else {
            // return with errrors
            return redirect()->route('receptions.create')->withErrors($validator)->withInput();
        }
    }
    
}