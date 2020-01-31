<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use ProductController;
use RetailerController;
use App\Product;
use App\Retailer;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::all()->take(3);
        $retailers = Retailer::all()->take(3);
        return view('index', compact(['products', 'retailers']));
    }
}
