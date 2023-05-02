<?php

namespace App\Http\Controllers;
use App\Models\Stock;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class StockController extends Controller
{
    public function index(){
       // $stock = Stock::with('produit')->orderBy('idstock','DESC')->paginate(50);
       $stock = DB::table('stock')
            ->join('produits', 'stock.produit_id', '=', 'produits.idproduit')
            ->orderBy('stock.idstock', 'desc')
            ->paginate(50);

        return view('stock.list',['stock' => $stock]);
    }

    public function create(){
        return view('stock.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'codstock' =>'required',
            'nomstock' =>'required',
            'tel_fixe_stock' =>'required',
            'adrstock' =>'required',
        ]);

        if($validator->passes()){
            //save data
            $stock=new Stock();
            $stock->codstock = $request->codstock;
            $stock->nomstock = $request->nomstock;
           $stock->tel_fixe_stock = $request->tel_fixe_stock;
            $stock->adrstock = $request->adrstock;
            $stock->save();

            return redirect()->route('stock.index')->with('success','stock added successfully.');


        } else {
            // return with errrors
            return redirect()->route('stock.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($idstock){
        $stock = stock::findOrFail($idstock);
        return view('stock.edit',['stock'=>$stock]);
    }

    public function update($idstock,Request $request){

        $validator = Validator::make($request->all(),[
            'codstock' =>'required',
            'nomstock' =>'required',
            'tel_fixe_stock' =>'required',
            'adrstock' =>'required',
        ]);

        if($validator->passes()){
            $stock =new stock();
            $stock ->fill($request->post())->save();

            return redirect()->route('stock.index')->with('success','stock updated successfully.');
        } else {
            // return with errrors
            return redirect()->route('stock.edit',$idstock)->withErrors($validator)->withInput();
        }
    

}
public function destroy($idstock, Request $request){
   $stock= stock::findOrFail($idstock);
   $stock->delete();
   return redirect()->route('stock.index')->with('success','stock deleted successfully.');;
}
}
