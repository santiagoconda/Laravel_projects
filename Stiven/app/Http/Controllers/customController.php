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
