<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    private $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

    public function index()
    {
        $categories = $this->category->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');    
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $category = $this->category->create($data);

        flash('Categoria criada com Sucesso!')->success()->important();
        return redirect()->route('admin.categories.index');
    }

    public function show($category)
    {
        //
    }

    public function edit($category)
    {
        $category = $this->category->findOrFail($category);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $category)
    {
        $data = $request->all();

        $category = $this->category->find($category);
        $category->update($data);

        flash('Categoria atualizada com Sucesso!')->success()->important();
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $category = $this->category->find($category);
	    $category->delete();

	    flash('Categoria Removida com Sucesso!')->success();
	    return redirect()->route('admin.categories.index');
    }
}