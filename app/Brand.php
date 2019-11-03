<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function item(){
        return $this->hasMany(Item::class);
    }

    public function stock(){
        return $this->hasMany(Stock::class);
    }

    public function priority(){
      return $this->hasOne(Priority::class);
    }

}
