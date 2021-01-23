<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $userStore = auth()->user()->store;

        if ($userStore == null) {
            $store = $userStore;
            flash('Você precisa criar uma loja.')->warning()->important();
            return redirect()->route('admin.stores.index', compact('store'));
        }        
        else {
            $products = $userStore->products()->paginate(10);
            return view('admin.products.index', compact('products'));
        }
    }

    public function create()
    {
        $categories = \App\Category::all(['id', 'name']);

        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $categories = $request->get('categories', null);

        $store = auth()->user()->store;

        $product = $store->products()->create($data);

        $product->categories()->sync($categories);

        flash('Produto criado com sucesso!')->success()->important();

        return redirect()->route('admin.products.index');
    }

    public function show($product)
    {
        //
    }

    public function edit($product)
    {
        $product = $this->product->findOrFail($product);

        $categories = \App\Category::all(['id', 'name']);

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();

        $categories = $request->get('categories', null);

        $product = $this->product->find($product);

        $product->update($data);

        if (!is_null($categories)) {
            $product->categories()->sync($categories); 
        }

        flash('Produto atualizado com sucesso!')->success()->important();

        return redirect()->route('admin.products.index');
    }

    public function destroy($product)
    {
        $product = $this->product->find($product);

        $product->delete();

        flash('Produto removido com sucesso!')->success()->important();

        return redirect()->route('admin.products.index');
    }
}