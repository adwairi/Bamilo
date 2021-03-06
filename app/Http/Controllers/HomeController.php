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
    public function index(Request $request)
    {
        $categoriesFilter = $request->get('categories');
        $attributesFilter = $request->get('attributes');
        $productObj = Product::with('attributes');
        if (count($categoriesFilter))
            $productObj->whereIn('category_id', $categoriesFilter);
        if (count($attributesFilter))
            $productObj->whereHas('attributes', function ($query) use ($attributesFilter) {
                $query->whereIn('attribute_id', $attributesFilter);
            });

        $products = $productObj->get();

        $params = [
            'products' => $products,
            'categories' => Category::all(),
            'attributes' => Attribute::all(),
        ];

        return response()->json(['status'=>true, 'params'=>$params]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = 0)
    {
        if($id == 0)
            return false;

        $products = Product::find($id);
        return view("showItem", ['products'=>$products]);
    }





}
