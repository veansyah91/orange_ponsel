<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['kode', 'item_id', 'supplier_id', 'modal', 'jml'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function cashier()
    {
        return $this->hasMany(Stock::class);
    }
}
