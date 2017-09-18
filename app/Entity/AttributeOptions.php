<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class AttributeOptions extends Model
{

    public function Attributes(){
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
