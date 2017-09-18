<?php

namespace App\Http\Controllers;

use App\Entity\Attribute;
use Illuminate\Http\Request;
use App\Entity\Product;
use App\Entity\Category;
use Illuminate\Support\Facades\Auth;
use Validator;
class ProductController extends Controller
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
        $products = Product::where(['user_id'=>Auth::user()->id])->get();
        $categories = Category::select(['id','title'])->where(['user_id'=>Auth::id()])->get();
        $attributes = Attribute::select(['id','title'])->where(['user_id'=>Auth::id()])->get();
        return view('products.index', [
                                            'products' => $products,
                                            'categories' => $categories->toArray(),
                                            'attributes' => $attributes->toArray(),
            ]);
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
            'model'     => 'required',
            'status'    => 'required|in:not_available,available,coming_soon',
            'price'     => 'required',
            'quantity'  => 'required',
            'category'  => 'required',
        ]);
        if($validator->fails())
            return response()->json(['status'=>false, 'message'=>$validator->messages()]);

        $product = new Product();
        $data = $request->all();
        $product->title = $data['title'];
        $product->product_model = $data['model'];
        $product->status = $data['status'];
        $product->price = $data['price'];
        $product->quantity = $data['quantity'];
        $product->desc = $data['desc'];
        $product->category_id = $data['category'];
        $product->user_id = Auth::user()->id;
        if ($product->save()){
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
    public function destroy($id)
    {
        //
    }
}
