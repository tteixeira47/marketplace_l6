<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {

        $products = $this->product->limit(10)->orderBy('id', 'DESC')->get();

        return view('welcome', compact('products'));
    }
}