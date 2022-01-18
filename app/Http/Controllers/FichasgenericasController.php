<?php

namespace App\Http\Controllers;

use App\Models\fichasgenericas;
use Illuminate\Http\Request;

class FichasgenericasController extends Controller
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
        $fichasgenerica = new fichasgenericas();

        $fichasgenerica->nome = $request->nomeDashboard;
        $fichasgenerica->user_id = $request->userDashboard;

        $fichasgenerica->save();

        $response['success'] = true;
        return json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fichasgenerica  $fichasgenerica
     * @return \Illuminate\Http\Response
     */
    public function show(fichasgenericas $fichasgenerica)
    {
        return view('sheets.generica.ficha', [
            'ficha' => $fichasgenerica
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fichasgenerica  $fichasgenerica
     * @return \Illuminate\Http\Response
     */
    public function edit(fichasgenericas $fichasgenerica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fichasgenerica  $fichasgenerica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fichasgenericas $fichasgenerica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fichasgenerica  $fichasgenerica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        fichasgenericas::where('id', $request->ficha_id)->first()->delete();
        return redirect()->route('user.index');
    }
}
