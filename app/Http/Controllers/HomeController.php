<?php

namespace App\Http\Controllers;

use App\Entity\Attribute;
use App\Entity\Category;
use App\Entity\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'products' => Product::all(),
            'categories' => Category::all(),
            'attributes' => Attribute::all(),
        ];
        return view('home', $params);
    }


    public function filter(Request $request)
    {
        $categoriesFilter = $request->get('categories');
        $attributesFilter = $request->get('attributes');

        $productObj = new Product();
        if (count($categoriesFilter))
            $productObj->whereIn('category_id', $categoriesFilter);
        if (count($attributesFilter))
            $productObj->whereHas('attributes', function ($query) use ($attributesFilter) {
                $query->whereIn('id', $attributesFilter);
            });

        $products = $productObj->get();

        $params = [
            'products' => $products,
            'categories' => Category::all(),
            'attributes' => Attribute::all(),
        ];
        return response()->json(['data' => $params]);
    }



}
