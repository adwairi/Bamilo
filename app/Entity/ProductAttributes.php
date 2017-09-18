<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function attribute(){
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }

    public static function insertArray($attributes){

        DB::table('product_attributes')->insert($attributes);
    }
}
