<?php

namespace App\Http\Controllers;

use App\Models\fichasyokai;
use Illuminate\Http\Request;

class FichasyokaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fichasyokai = fichasyokai::all();

        return view('sheets.yokai.dashboard', [
            'fichasyokai' => $fichasyokai
        ]);
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
        $fichayokai = new fichasyokai();

        $fichayokai->nome = $request->yokaiNome;

        if ($request->imagemDashboard) {
            $fichayokai->imagem_yokai = $request->imagemDashboard;
        }

        $fichayokai->save();

        return redirect()->route('yokai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fichasyokai  $fichasyokai
     * @return \Illuminate\Http\Response
     */
    public function show(fichasyokai $fichasyokai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fichasyokai  $fichasyokai
     * @return \Illuminate\Http\Response
     */
    public function edit(fichasyokai $fichasyokai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fichasyokai  $fichasyokai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fichasyokai $fichasyokai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fichasyokai  $fichasyokai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        fichasyokai::where('id', $request->ficha_id)->first()->delete();
        return redirect()->route('yokai.index');
    }
}
