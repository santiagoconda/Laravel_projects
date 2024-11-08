<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Comuna;
use App\Models\Municipio;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       //$comunas =Comuna::all();
        //return view('comuna.index',['comunas'=> $comunas]);
        $search =$request->input('search');

        $comunas = DB::table('tb_comuna')
        ->join('tb_municipio','tb_comuna.muni_codi', '=','tb_municipio.muni_codi')
        ->select('tb_comuna.*',"tb_municipio.muni_nomb")
        ->when($search, function ($query, $search){
            return $query->where('tb_comuna.comu_nomb','like',"%{$search}%")
                        ->orWhere('tb_municipio.muni_nomb','like',"%{$search}%");
        })
        ->get();

        return view ('comuna.index',['comunas' => $comunas]);
    }
    

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
       $municipios = DB::table('tb_municipio')
       ->orderBy('muni_nomb')
       ->get();
       return view('comuna.new',['municipios' => $municipios]);
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comuna = new Comuna();
        $comuna->comu_nomb = $request->name;         
        $comuna->muni_codi = $request->code;
        $comuna->save();
        

        $comunas =  DB::table('tb_comuna')
        ->join('tb_municipio','tb_comuna.muni_codi', '=','tb_municipio.muni_codi')
        ->select('tb_comuna.*',"tb_municipio.muni_nomb")
        ->get();
        return view('comuna.index',['comunas'=> $comunas]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    
    
    
        /**
         * Update the specified resource in storage.
         * @param int $id
         *@return \Illuminate\Http\Response
         */
        public function edit($id)
        
        {
            $comuna = Comuna::find($id);
            $municipios = DB::table('tb_municipio')
                ->orderBy('muni_nomb')
                ->get();
    
        return view('comuna.edit', ['comunas' => $comuna, 'municipios' => $municipios]);
           
        
        }

          /**
         * Update the specified resource in storage.
         * @param int $id
         *@return \Illuminate\Http\Response
         */
        public function update(Request  $request, $id)
        
        {
            $comuna = Comuna::find($id);
          $comuna->comu_nomb = $request->name;
          $comuna->muni_codi = $request->code;
          $comuna->save();

          $comunas =DB::table('tb_comuna')
          ->join('tb_municipio','tb_comuna.muni_codi', '=','tb_municipio.muni_codi')
          ->select('tb_comuna.*',"tb_municipio.muni_nomb")
          ->get();

          return view('comuna.index',  ['comunas' => $comunas]);
        
        }
    /**
     * Remove the specified resource from storage.
     *  @param int $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function destroy(string $id)
    {
        $comuna = Comuna::find($id);
        $comuna->delete();

        $comuna = DB::table('tb_comuna')
        ->join('tb_municipio','tb_comuna.muni_codi', '=','tb_municipio.muni_codi')
        ->select('tb_comuna.*',"tb_municipio.muni_nomb")
        ->get();
        return  view('comuna.index',['comunas'=>$comuna]);
    }
}
