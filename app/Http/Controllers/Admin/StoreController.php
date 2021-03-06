<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('user.has.store')->only(['create','store']);
    }

    public function index() 
    {
        $store = auth()->user()->store;

        return view('admin.stores.index', compact('store'));
    }

    public function create()
    { 
        $users = \App\User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));;
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all(); // Pega a requisição enviada pelo POST do form e salva em $data

        $user = auth()->user();

        $store = $user->store()->create($data); // Executa um create store com os dados do form

        flash('Loja ('. $store->name.  ') criada com sucesso!')->success()->important();
        
        
        return redirect()->route('admin.stores.index');
    }

    public function edit($store)
    {
        $store = \App\Store::findOrFail($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $store)
    {
        $data = $request->all();

        $store = \App\Store::find($store);

        $store->update($data);

        flash('Loja ('. $store->name. ') atualizada com sucesso!')->success()->important();
        
        return redirect()->route('admin.stores.index');
    }

    public function destroy($store)
    {
        $store = \App\Store::find($store);
        
        $store->delete();

        flash('Loja ('. $store->name.  ') removida com sucesso!')->success()->important();

        return redirect()->route('admin.stores.index');
    }
}