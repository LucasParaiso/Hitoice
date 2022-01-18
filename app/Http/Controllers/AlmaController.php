<?php

namespace App\Http\Controllers;

use App\Models\Alma;
use Illuminate\Http\Request;

class AlmaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alma = new Alma();
        $alma->fichashitodama_id = $request->fichashitodama_id;
        $alma->tipo = $request->tipo;
        $alma->propriedade = $request->propriedade;
        $alma->save();
        
        $response['alma_id'] = $alma->id;
        $response['tipo'] = $request->tipo;
        $response['propriedade'] = $request->propriedade;

        return json_encode($response);
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
    public function destroy(Request $request)
    {
        $response['success'] = false;

        if (Alma::where('id', $request->alma_id_delete)->first()->delete()) {
            $response['success'] = true;
        }

        $response['alma_id'] = $request->alma_id_delete;
        return json_encode($response);
    }
}
