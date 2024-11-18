<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\detail;

class detailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $detail = detail::all();
        return view('dashboard', compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::all();
        $invoices = Invoice::all();
        return view('details.createDetails', compact('products','invoices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request ->validate([
            'product_id' => 'required|exists:products,id',
            'invoice_id' => 'required|exists:invoices,id',
            'quantity' => 'required',
            'price' => 'required',

        ]);
        detail::create($validated);
        return redirect()->route('sisven.facturas')->with('success', 'Details created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $detail = detail::with ('product','invoice')->find($id);
        return view('sisven.detalleInvoice', compact('detail'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
