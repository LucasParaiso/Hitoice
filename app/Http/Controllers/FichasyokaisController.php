<?php

namespace App\Http\Controllers;

use App\Models\Fichasyokai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FichasyokaisController extends Controller
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

        $fichasyokai = Fichasyokai::all();

        return view('sheets.yokai.dashboard', [
            'fichas' => $fichasyokai
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
        $fichayokai = new Fichasyokai();

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
        if (Auth::user()->role_as !== 'admin') {
            return redirect()->route('shinigami.index');
        }

        return view('sheets.yokai.ficha', [
            'ficha' => $fichasyokai
        ]);
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
    public function update(Request $request, Fichasyokai $fichasyokai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fichasyokai  $fichasyokai
     * @return \Illuminate\Http\Response
     */
    public function destroy(fichasyokai $fichasyokai)
    {
        Fichasyokai::destroy($fichasyokai->id);

        return redirect()->route('yokai.index');
    }

    public function updateLife(Request $request, Fichasyokai $fichasyokai)
    {

        if (str_contains($request->vida_atual, '+') || str_contains($request->vida_atual, '-')) {
            $fichasyokai->vida_atual += $request->vida_atual;
        } else {
            $fichasyokai->vida_atual = $request->vida_atual;
        }

        if ($request->vida_max !== null) {
            $fichasyokai->vida_max = $request->vida_max;
        }

        $fichasyokai->save();

        $response = [
            'vida_atual' => $fichasyokai->vida_atual,
            'vida_max' => $fichasyokai->vida_max
        ];

        return json_encode($response);
    }

    public function updateImage(Request $request, Fichasyokai $fichasyokai)
    {
        $fichasyokai->imagem_yokai = $request->imagem_yokai;
        $fichasyokai->save();

        return redirect()->route('yokai.show', [
            'fichasyokai' => $fichasyokai->id
        ]);
    }

    public function updatedescription(Request $request, Fichasyokai $fichasyokai)
    {
        $fichasyokai->descricao = $request->descricao;
        $fichasyokai->save();

        $response['descricao'] = $request->descricao;
        return json_encode($response);
    }
}
