<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    
    protected $fillable = ['name','cs','sales','hp','address'];

    public function stock(){
        return $this->hasMany(Stock::class);
    }

    public function getNameSupplier($id){
        $requests = $this::all();
        $request = $requests->find($id);

        return $request->name;
    }
}
