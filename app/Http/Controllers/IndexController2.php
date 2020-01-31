<?php

namespace App\Http\Controllers;
use ProductController;
use RetailerController;
use Illuminate\Http\Request;
use App\Product;
use App\Retailer;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $retailers = Retailer::all();
        return view('index', compact(['products', 'retailers']));
    }
}
