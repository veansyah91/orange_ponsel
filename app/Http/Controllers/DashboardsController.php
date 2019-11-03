<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Stock;
use App\Brand;
use App\Priority;

class DashboardsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $priorities = Priority::all();
        $totals = [];

        $i = 0;
        foreach ($priorities as $priority) {
          $stocks[$i] = priority($priority->brand->name);
          $totals[$i]= count($stocks[$i]);
          $i++;
        }
        return view('dashboards.index',compact('priorities','totals'));
    }

    public function priority(){
        $brands = Brand::all();
        $priorities = Priority::all();
        return view('dashboards.prioritas',compact('brands','priorities'));
    }

    public function createpriority(Request $request)
    {
        for ($i=1; $i < 5 ; $i++) {
          $priority = new Priority;
          $priority->brand_id = $request->brand[$i];
          $priority->save();
        }
        return redirect('/')->with('status','Prioritas BRAND telah Diatur');
    }

    public function prioritydetail($request){
      $stocks = Stock::whereJml(!0)->get();
      return view('/dashboards/detailprioritas',compact('stocks','request'));
    }

    public function priorityupdate(Request $request){
      $priorities = Priority::all();
      for ($i=0; $i < 4 ; $i++) {
        $affected = DB::table('priorities')
              ->where('id', $priorities[$i]->id)
              ->update(['brand_id' => $request->brand[$i]]);
      };
      return redirect('/')->with('status','Prioritas BRAND telah Diatur');
    }

}
