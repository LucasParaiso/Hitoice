<?php

namespace App\Http\Controllers;

use App\Models\Fichasgenericas;
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

        $fichasgenerica = Fichasgenericas::all();

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
        $fichasgenerica = new Fichasgenericas();

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
    public function update(Request $request, Fichasgenericas $fichasgenerica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fichasgenerica  $fichasgenerica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fichasgenericas $fichasgenerica)
    {
        Fichasgenericas::destroy($fichasgenerica->id);

        return redirect()->route('generica.index');
    }

    public function updateLife(Request $request, Fichasgenericas $fichasgenerica)
    {

        if (str_contains($request->vida_atual, '+') || str_contains($request->vida_atual, '-')) {
            $fichasgenerica->vida_atual += $request->vida_atual;
        } else {
            $fichasgenerica->vida_atual = $request->vida_atual;
        }

        if ($request->vida_max !== null) {
            $fichasgenerica->vida_max = $request->vida_max;
        }

        $fichasgenerica->save();

        $response = [
            'vida_atual' => $fichasgenerica->vida_atual,
            'vida_max' => $fichasgenerica->vida_max
        ];

        return json_encode($response);
    }

    public function updateImage(Request $request, Fichasgenericas $fichasgenerica)
    {
        $fichasgenerica->imagem_personagem = $request->imagem_personagem;
        $fichasgenerica->save();

        return redirect()->route('generica.show', [
            'fichasgenerica' => $fichasgenerica->id
        ]);
    }

    public function updatedescription(Request $request, Fichasgenericas $fichasgenerica)
    {
        $fichasgenerica->descricao = $request->descricao;
        $fichasgenerica->save();

        $response['descricao'] = $request->descricao;
        return json_encode($response);
    }
}
