<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Category;
use Illuminate\Support\Facades\Auth;
use Validator;
class CategoryController extends Controller
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
        $categories = Category::with('children')
            ->where(['user_id' => Auth::id()])
            ->whereNull('parent_id')
            ->get();
        return view('category.index', ['categories' => $categories->toArray()]);
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
            'title'     => 'required'
        ]);
        if($validator->fails())
            return response()->json(['status'=>false, 'message'=>$validator->messages()]);

        $category = new Category();
        $data = $request->all();
        $category->title = $data['title'];
        $category->desc = $data['desc'];
        $category->parent_id = $data['parent_category'];
        $category->user_id = Auth::user()->id;
        if ($category->save()){
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
