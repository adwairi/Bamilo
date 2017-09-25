<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cart extends Model
{
    public static function getItems(){
        return DB::table('carts')->select(DB::raw('(select title from products where products.id = carts.product_id) as title, count(product_id) as quantity'))->groupBy('product_id')->get();

    }
}
