<?php

use Illuminate\Support\Facades\DB;

function priority($name)
{
  $stock = DB::table('brands')
    ->join('items', 'brands.id', '=', 'items.brand_id')
    ->join('stocks', 'items.id', '=', 'stocks.item_id')
    ->select('brands.*', 'items.tipe', 'stocks.jml')
    ->where('jml', '!=', '0')
    ->where('name', '=', $name)
    ->get();

  return $stock;
}

function getDateToString()
{
  $date = date_create(date('d-m-Y'));

  return date_format($date, 'dm');
}
