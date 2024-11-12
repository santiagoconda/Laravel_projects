<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class sisvenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::with('Category')->get();
        return view('sisven.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('sisven.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stok' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        Product::create($validated);
        return redirect()->route('sisven.index')->with('success', 'Producto creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('sisven.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stok' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stok' => $request->input('stok'),
            'category_id' => $request->input('category_id'),
        ]);
        return redirect()->route('sisven.index')->with('success', 'Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product= Product::find($id);
        if(!$product){
            return redirect()->route('sisven.index')->with('success', 'Producto no encontrado');
        }
        $product->delete();
        return redirect()->route('sisven.index')->with('success', 'Producto no encontrado');
    }
}
