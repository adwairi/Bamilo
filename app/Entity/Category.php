<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
