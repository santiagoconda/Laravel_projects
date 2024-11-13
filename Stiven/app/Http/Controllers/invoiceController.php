<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\PayMode;
use App\Models\Customer; // Correcto



class invoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $invoice = Invoice::all();
        return view('sisven.facturas',compact('invoice'));

      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $customers = Customer::all();
        $payModes = PayMode::all();
        return view('sisven.createInvoice', compact('customers', 'payModes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'number'=>'required',
            'customer_id'=>'required|exists:costumers,id',
            'date'=>'required|date',
            '_pay_mode_id'=>'required|exists:_pay_mode,id',
        ]);


    Invoice::create($validated); 

    return redirect()->route('sisven.facturas')->with('success', 'Factura creada');
 
     


    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $invoice= Invoice::with(['customer','pay_mode'])->findOrFail($id);
        return view('sisven.detalleInvoice',compact('invoice'));

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
