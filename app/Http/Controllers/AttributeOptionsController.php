<?php

namespace App\Http\Controllers;

use App\Entity\Attribute;
use App\Entity\AttributeOptions;
use Illuminate\Http\Request;
use Validator;
class AttributeOptionsController extends Controller
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
        $validator = Validator::make($request->all(), [
            'option_title'     => 'required',
        ]);
        if($validator->fails())
            return response()->json(['status'=>false, 'message'=>$validator->messages()]);


        $title= $request->get('option_title');
        $attribute_id = $request->get('attribute_id');

        $status = true;
        $attrOptionsObj = new AttributeOptions();
        $attrOptionsObj->title = $title;
        $attrOptionsObj->attribute_id = $attribute_id;

        if ($attrOptionsObj->save())
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

        $options = AttributeOptions::where(['attribute_id'=>$id])->get();
        if (count($options))
            return response()->json(['status' => true, 'data'=>$options]);
        else
            return response()->json(['status' => false, 'message'=>'there is no options']);
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

        $options_array = $request->get('delete_options');
        if ($id == 0 || !count($options_array))
            return response()->json(['status' => false,'message'=>'Something Wrong!']);

        AttributeOptions::where(['attribute_id' => $id])->whereIn('id',$options_array)->delete();
        return response()->json(['status'=>true, 'data'=>$options_array, 'message'=>'Deleted Successfully']);
    }
}
