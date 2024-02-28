<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBilleteRequest;
use App\Models\Billete;
use App\Models\Vuelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BilleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billetes = DB::table('billetes')->where('user_id',auth()->id())->get();
        return view('billetes.index',['billetes' =>$billetes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $billete = DB::table('billetes')
        ->where('user_id', auth()->id())
        ->where('vuelo_id', $request->vuelo)
        ->first();

        if($billete==null){
        Billete::create(['asiento' => $request->asiento,
                      'vuelo_id' => $request->vuelo,
                       'user_id' =>auth()->id()]);

        }
        else{
            session()->flash('error','Ese usuario ya tiene un billete para este vuelo');
        }
        return redirect()->route('vuelos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Billete $billete)
    {
        $vuelo = Vuelo::find($billete->vuelo_id);

        return view('billetes.show',['billete'=>$billete,'vuelo'=>$vuelo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Billete $billete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Billete $billete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Billete $billete)
    {
        //
    }

    public function reservar($id)
    {
        $vuelo = Vuelo::find($id);
        $asientosdispo = [];
        $billetes = $vuelo->billetes;
        $ocupados=[];


        if($vuelo->plazas - $vuelo->billetes->count() <= 0){

            session()->flash('error','Lo siento no quedan asientos para ese vuelo');
        }

        else{

            foreach($billetes as $billete){
                array_push($ocupados,$billete->asiento);
            }

            for($i = 1;$i<=$vuelo->plazas;$i++){
                if(!in_array($i,$ocupados)){
                    array_push($asientosdispo,$i);
                }
            }
            return view('billetes.create',['vuelo' => $vuelo,'asientosdispo'=>$asientosdispo]);


        }
        return redirect()->route('vuelos.index');

    }
}
