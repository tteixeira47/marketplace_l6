<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $stores = \App\Store::all(['id', 'name']);

        return view('admin.products.create', compact('stores'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $store = \App\Store::find($data['store']);

        $store->products()->create($data);

        flash('Produto criado com sucesso!')->success()->important();

        return redirect()->route('products.index');
    }

    public function show($product)
    {
        //
    }

    public function edit($product)
    {
        $product = $this->product->find($product);

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $product)
    {
        $data = $request->all();

        $product = $this->product->find($product);

        $product->update($data);

        flash('Produto atualizado com sucesso!')->success()->important();

        return redirect()->route('products.index');
    }

    public function destroy($product)
    {
        //
    }
}