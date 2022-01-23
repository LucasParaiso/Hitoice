<?php

namespace App\Http\Controllers;

use App\Models\fichasgenericas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FichasgenericasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_as !== 'admin') {
            return redirect()->route('shinigami.index');
        }

        $fichasgenerica = fichasgenericas::all();

        return view('sheets.generica.dashboard', [
            'fichas' => $fichasgenerica
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
        $fichasgenerica = new fichasgenericas();

        $fichasgenerica->nome = $request->genericaNome;
        $fichasgenerica->user_id = Auth::id();

        if ($request->imagemDashboard) {
            $fichasgenerica->imagem_personagem = $request->imagemDashboard;
        }

        $fichasgenerica->save();

        return redirect()->route('generica.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fichasgenerica  $fichasgenerica
     * @return \Illuminate\Http\Response
     */
    public function show(fichasgenericas $fichasgenerica)
    {
        if (Auth::user()->role_as !== 'admin') {
            return redirect()->route('shinigami.index');
        }

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
        fichasgenericas::destroy($request->ficha_id);

        return redirect()->route('generica.index');
    }
}
