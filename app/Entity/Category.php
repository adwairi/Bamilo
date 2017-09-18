<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function parent(){
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

    public function children(){
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
