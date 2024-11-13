<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\DB;
class customController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = customer::all();

        return view('sisven.getClientes', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('sisven.createCustom');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    
        $validated = $request->validate([
            'document_number' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'andress'=> 'required',
            'birthday' => 'required',
            'phone_number' => 'required',
            'email' => 'required',

          
    
        ]);
        
        customer::create($validated);
        // dd($validated);
        return redirect()->route('sisven.getClientes')->with('success', 'User creado');
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
        $customers = customer::findOrFail($id);
        return view('sisven.editCustom', compact('customers'));
    }

    /**
     * Update the specified resource in storage.a
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'document_number' => 'required|numeric',
            'first_name' => 'required',
            'last_name' => 'required',
            'andress' => 'required',
            'birthday' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
        ]);
        $customers = customer::findOrFail($id);
        $customers->update([
            'document_number' => $request->input('document_number'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'andress' => $request->input('andress'),
            'birthday' => $request->input('birthday'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
        ]);
        return redirect()->route('sisven.getClientes')->with('success', 'Cliente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $customers = customer::find($id);
        if(!$customers){
            return redirect()->route('sisven.getClientes')->with('error', 'Cliente no encontrado');
        }
        $customers->delete();
        return redirect()->route('sisven.getClientes')->with('error', 'Cliente no encontrado');

    }
}
