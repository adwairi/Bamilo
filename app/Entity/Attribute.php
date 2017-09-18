<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function options(){
        return $this->hasMany(AttributeOptions::class, 'attribute_id', 'id');
    }
}
