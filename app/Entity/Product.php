<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    private static $status = [
        'not_available' => '​Not Available',
        'available' => 'Available',
        'coming_soon' => 'Coming Soon',
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function attributes(){
        return $this->belongsToMany(Attribute::class, 'product_attributes');
    }

    public static function getStatus(){
        return self::$status;
    }

}
