<?php

namespace App\Http\Controllers;

use App\Entity\AttributeOptions;
use App\Entity\Category;
use Illuminate\Http\Request;
use App\Entity\Attribute;
use Illuminate\Support\Facades\Auth;
use Validator;
class AttributeController extends Controller
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
        $attributes = Attribute::where(['user_id'=>Auth::user()->id])->get();
        $categories = Category::select(['id','title'])->where(['user_id'=>Auth::id()])->get();
        return view('attributes.index', ['attributes' => $attributes, 'categories' => $categories->toArray()]);
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
            'title'     => 'required',
            'category'  => 'required',
        ]);
        if($validator->fails())
            return response()->json(['status'=>false, 'message'=>$validator->messages()]);

        $attribute = new Attribute();
        $data = $request->all();
        $attribute->title = $data['title'];
        $attribute->desc = $data['desc'];
        $attribute->category_id = $data['category'];
        $attribute->user_id = Auth::user()->id;
        if ($attribute->save()){
            return response()->json(['status'=>true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id = 0)
    {
        $attribute = Attribute::find($id);
        if ($id == 0 || !$attribute || $attribute->user_id != Auth::id())
            return response()->json(['status'=>false, 'message'=>'Something wrong! please try again']);

        AttributeOptions::where(['attribute_id' => $id])->delete();
        if($attribute->delete())
            return response()->json(['status'=>true, 'message'=>'Deleted Successfully']);

        return response()->json(['status'=>false, 'message'=>'Something wrong! please try again']);
    }
}
