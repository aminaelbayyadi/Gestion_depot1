<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Reception;
use App\Models\Fournisseur;
use App\Models\Detaitreception;
use DB;
use Barryvdh\DomPDF\Facade\PDF as PDF;


use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
class receptionControler extends Controller
{
    public function generatePDFr()
{
    $receptions = Reception::get(); 
    $data = [
        'receptions' => $receptions
    ];
    $pdf = PDF::loadView('reception.pdfr', $data);
    return $pdf->download('reception.pdfr');
}

    public function index(){
        $fournisseur = DB::table('fournisseurs')->get();
        // $receptions = Reception::join('fournisseurs', 'receptions.fournisseur_id', '=', 'fournisseurs.id')->orderBy('idreception','DESC')
        // ->paginate(50);
        $receptions =Reception::orderby('idreception','DESC')->paginate(50);
        return view('reception.list',compact('fournisseur','receptions'));

    }
    public function create(Request $request){
        $fournisseurs= Fournisseur::create([
            'fournisseur_id' => $request['id']
        ]);
        return $fournisseurs;
        

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nomfour' =>'required',
            'datereception' =>'required',
            'nbrarticle' =>'required'
        ]);

        if($validator->passes()){
            //save data
            $reception=new reception();
            $reception->nomfour = $request->nomfour;
            $reception->datereception = $request->datereception;
            $reception->nbrarticle = $request->nbrarticle;
            $reception->save();
            return redirect()->route('receptions.index')->with('success','reception added successfully.');
        } else {
            // return with errrors
            return redirect()->route('receptions.create')->withErrors($validator)->withInput();
        }
    }

    public function destroy($idreception, Request $request)
{
    $reception = Reception::findOrFail($idreception);
    
    // Delete the related detailreception entries
    Detaitreception::where('reception_id', $idreception)->delete();
    
    $reception->delete();
    
    return redirect()->route('receptions.index')->with('success', 'Reception supprimée avec succes.');
}
}  