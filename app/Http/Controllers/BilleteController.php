<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBilleteRequest;
use App\Models\Billete;
use App\Models\Vuelo;
use Illuminate\Http\Request;


class BilleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        dump($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Billete $billete)
    {
        //
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
}
