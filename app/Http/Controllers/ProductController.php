<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    
        $product = Products::orderBy('id', 'DESC')->get();

        
        return view('admin.product',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = Category::all();
        return view('admin.create_product',compact('category'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ProductCreateRequest  $request )
    {

        $product = new Products();
     
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->dprice;

        $imageName = date('YmdHis') . "." . request()->product_image->getClientOriginalExtension();
        request()->product_image->move(public_path('product_images'), $imageName);

        $product->image = $imageName;
        
        
        
        $product->save();

        return redirect('product')->with('message','Product Create Successfully');



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
    public function edit(Products $product)
    {
        $category = Category::all();
        return view('admin.edit_product',compact('category','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        request()->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            
            'quantity' => 'required',
            'description' => 'required',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->dprice;

        if($request->product_image)
        {
            $imageName = date('YmdHis') . "." . request()->product_image->getClientOriginalExtension();
            request()->product_image->move(public_path('product_images'), $imageName);
            
            $product->image = $imageName;

        }

        $product->save();
        return redirect('product')->with('message','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect('/product')->with('message', 'Product successfully deleted!');
    }
}
