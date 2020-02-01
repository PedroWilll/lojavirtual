<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
//use ImageController;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product', compact(['products']));
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
        $product = new Product();
        $product->name = $request->name;
        $product->price = (float)$request->price;
        $product->retailer = $request->retailer;
        $path =$request->file('image')->store('images', 'public');
        $product->image = $path;
        $product->description = $request->description;

        if($product->save())
        {
            return redirect('/product');
        }else
        {
            
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
        $prod = Product::find($id);
        if(isset($prod)) {
            return view('editproduct',compact('prod'));
        }
        return redirect('/product');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Product::find($id);
        if(isset($prod)) {
            return view('editproduct',compact('prod'));
        }
        return redirect('/product');
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
        $prod = Product::find($id);
        if(isset($prod)) {
            $prod->name = $request->name;
            $prod->price = (float)$request->price;
            $prod->retailer = $request->retailer;
            if($request->file('image') != null){
                $path =$request->file('image')->store('images', 'public');
                $prod->image = $path;
            }
            $prod->description = $request->description;
            $prod->save();

        }
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::find($id);
        echo($id);
        if(isset($prod)) {
           $prod->delete();
          
        }
        return redirect('/product');
    }
    
    
}
