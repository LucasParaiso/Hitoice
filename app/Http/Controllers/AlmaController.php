<?php

namespace App\Http\Controllers;

use App\Models\Alma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alma = new Alma();
        $alma->ficha_id = $request->ficha_id;
        $alma->tipo = $request->tipo;
        $alma->propriedade = $request->propriedade;
        $alma->save();
        
        $response['tipo'] = $request->tipo;
        $response['propriedade'] = $request->propriedade;

        return json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alma  $alma
     * @return \Illuminate\Http\Response
     */
    public function show(Alma $alma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alma  $alma
     * @return \Illuminate\Http\Response
     */
    public function edit(Alma $alma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alma  $alma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $alma = Alma::where('id', $request->alma_id)->first();
        $alma->tipo = $request->tipo;
        $alma->propriedade = $request->propriedade;
        $alma->save();
        
        $response['alma_id'] = $request->alma_id;
        $response['tipo'] = $request->tipo;
        $response['propriedade'] = $request->propriedade;

        return json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alma  $alma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alma $alma)
    {
        //
    }
}
