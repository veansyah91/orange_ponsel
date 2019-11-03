<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Item;
use App\Stock;

class StocksController extends Controller
{
    public function index(){
        $stocks = Stock::all();
        return view('stocks.index',compact('stocks'));
    }

    public function available(){
        $stocks = Stock::whereJml(!0)->get();
        return view('stocks.available',compact('stocks'));
    }

    public function createstock(){
        $suppliers = Supplier::all();
        $items  = Item::all();
        return view('stocks.input',compact('suppliers','items'));
    }

    public function storestock(Request $request){

        $maxdata = $request->jumlah;

        for ($i=1; $i < $maxdata+1; $i++) {
            $stock = new Stock;
            $stock->kode = $request->kode[$i];
            $stock->item_id = Item::whereTipe($request->item[$i])->first()->id;
            $stock->supplier_id = Supplier::whereName($request->supplier[$i])->first()->id;
            $stock->jml = $request->jml[$i];
            $stock->modal = $request->modal[$i];
            $stock->save();
        }

        return redirect('/stock/detail')->with('status','Stock Berhasil Ditambahkan');
    }

    public function destroystock(Stock $stock){
        Stock::destroy($stock->id);
        return redirect('/stock')->with('status','Stock Berhasil Dihapus');
    }
}
