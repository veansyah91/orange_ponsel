<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    protected $fillable = ['nomornota', 'stock_id', 'jml', 'customer_id'];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
