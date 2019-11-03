<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['brand_id','category_id','tipe','image','description'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getImage(){
        if (!$this->image){
            return asset('image/default.png');
        };

        return asset('image/'.$this->image);

    }
}
