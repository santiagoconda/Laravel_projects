<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\PayMode;
use App\Models\Customer;
use App\Models\detail;
use App\Models\Product;



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
        $details = detail::with('product')  
        ->where('invoice_id', $id) 
        ->get();
        

        $total = $details->sum(function($details){
            return $details->product->price * $details->quantity;
            
        });
        $invoice = $details->first()->invoice;
        return view('sisven.detalleInvoice', compact('invoice', 'details','total'));

      
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $invoice = Invoice::findOrFail($id);
        $paymode = PayMode::all();
        return view('sisven.editInvoice', compact('invoice','paymode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'number'=>'required',
            'customer_id'=>'required|exists:costumers,id',
            'date'=>'required|date',
            '_pay_mode_id'=>'required|exists:_pay_mode,id',
        ]);
        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());
        return redirect()->route('sisven.facturas')->with('success', 'Factura actual');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $invoice = Invoice::find($id);
        if(!$invoice){
            return redirect()->route('sisven.facturas')->with('error', 'Factura no encontrada');
        }
        $invoice->delete();
        return redirect()->route('sisven.facturas')->with('error', 'Factura no eliminada');

    }
}
