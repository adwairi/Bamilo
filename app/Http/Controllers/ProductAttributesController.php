<?php

namespace App\Http\Controllers;

use App\Entity\ProductAttributes;
use Illuminate\Http\Request;

class ProductAttributesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->get('attributes');
        $product_id = $request->get('product_id');

        $status = true;
        if (count($attributes)){
            $productAttributesObj = new ProductAttributes();
            foreach ($attributes as $attribute) {
                $relationID = $productAttributesObj->insertGetId([
                    'product_id' => $product_id,
                    'attribute_id'  => $attribute
                ]);
                if ($relationID == 0)
                    $status = false;

            }
        }

        return response()->json(['status'=>$status]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = 0)
    {
        if ($id == 0)
            return response()->json(['status' => false]);

        $attr = ProductAttributes::with('Attribute')->where(['product_id'=>$id])->get();
        if (count($attr))
            return response()->json(['status' => true, 'data'=>$attr]);
        else
            return response()->json(['status' => false, 'message'=>'there is no Attributes  ']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = 0, Request $request)
    {

        $attr_array = $request->get('delete_attr');
        if ($id == 0 || !count($attr_array))
            return response()->json(['status' => false,'message'=>'Something Wrong!']);

        ProductAttributes::where(['product_id' => $id])->whereIn('attribute_id',$attr_array)->delete();
        return response()->json(['status'=>true, 'data'=>$attr_array, 'message'=>'Deleted Successfully']);
    }
}
