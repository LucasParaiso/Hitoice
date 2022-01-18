<?php

namespace App\Http\Controllers;

use App\Models\Fichashitodama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FichashitodamaController extends Controller
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
        $fichashitodama = new Fichashitodama();

        $fichashitodama->nome = $request->nomeDashboard;
        $fichashitodama->user_id = $request->userDashboard;

        $fichashitodama->save();

        $response['success'] = true;
        return json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ficha  $fichashitodama
     * @return \Illuminate\Http\Response
     */
    public function show(Fichashitodama $fichashitodama)
    {
        if (Auth::check()) {
            $caminhos = DB::table('caminhos')->get();
            $classes = DB::table('classes')->get();
            $herancas = DB::table('herancas')->get();

            $caminho = null;
            $classe = null;
            $heranca = null;

            if ($fichashitodama->caminho_id) {
                $caminho = DB::table('caminhos')->where('id', $fichashitodama->caminho_id)->first();
            }

            if ($fichashitodama->classe_id) {
                $classe = DB::table('classes')->where('id', $fichashitodama->classe_id)->first();
            }

            if ($fichashitodama->heranca_id) {
                $heranca = DB::table('herancas')->where('id', $fichashitodama->heranca_id)->first();
            }

            $almas = $fichashitodama->almas()->get();

            return view('sheets.hitodama.ficha', [
                'ficha' => $fichashitodama,
                'almas' => $almas,

                'caminhos' => $caminhos,
                'classes' => $classes,
                'herancas' => $herancas,

                'caminho' => $caminho,
                'classe' => $classe,
                'heranca' => $heranca
            ]);
        }

        return redirect()->route('user.login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ficha  $fichashitodama
     * @return \Illuminate\Http\Response
     */
    public function edit(Fichashitodama $fichashitodama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ficha  $fichashitodama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fichashitodama $fichashitodama)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ficha  $fichashitodama
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Fichashitodama::where('id', $request->ficha_id)->first()->delete();
        return redirect()->route('user.index');
    }

    public function caminho(Request $request, Fichashitodama $fichashitodama)
    {
        $fichashitodama->caminho_id = $request->caminho_id;
        $fichashitodama->save();

        $caminho = DB::table('caminhos')->where('id', $request->caminho_id)->first();

        return json_encode($caminho);
    }

    public function classe(Request $request, Fichashitodama $fichashitodama)
    {
        $fichashitodama->classe_id = $request->classe_id;
        $fichashitodama->save();

        $classe = DB::table('classes')->where('id', $request->classe_id)->first();

        return json_encode($classe);
    }

    public function heranca(Request $request, Fichashitodama $fichashitodama)
    {
        $fichashitodama->heranca_id = $request->heranca_id;
        $fichashitodama->save();

        $heranca = DB::table('herancas')->where('id', $request->heranca_id)->first();

        return json_encode($heranca);
    }

    public function updatelife(Request $request, Fichashitodama $fichashitodama)
    {

        if (str_contains($request->vida_atual, '+') || str_contains($request->vida_atual, '-')) {
            $fichashitodama->vida_atual += $request->vida_atual;
        } else {
            $fichashitodama->vida_atual = $request->vida_atual;
        }

        if ($request->vida_max !== null) {
            $fichashitodama->vida_max = $request->vida_max;
        }

        $fichashitodama->save();

        $response = [
            'vida_atual' => $fichashitodama->vida_atual,
            'vida_max' => $fichashitodama->vida_max
        ];

        return json_encode($response);
    }

    public function updateawaken(Request $request, Fichashitodama $fichashitodama)
    {

        if (str_contains($request->despertado_atual, '+') || str_contains($request->despertado_atual, '-')) {
            $fichashitodama->despertado_atual += $request->despertado_atual;
        } else {
            $fichashitodama->despertado_atual = $request->despertado_atual;
        }

        if ($request->despertado_max !== null) {
            $fichashitodama->despertado_max = $request->despertado_max;
        }

        $fichashitodama->save();

        $response = [
            'despertado_atual' => $fichashitodama->despertado_atual,
            'despertado_max' => $fichashitodama->despertado_max
        ];

        return json_encode($response);
    }

    public function updateImageCharacter(Request $request, Fichashitodama $fichashitodama)
    {
        $fichashitodama->imagem_personagem = $request->imagem_personagem;
        $fichashitodama->save();

        $response['imagem_personagem'] = $request->imagem_personagem;

        return json_encode($response);
    }

    public function updateImageDragon(Request $request, Fichashitodama $fichashitodama)
    {
        $fichashitodama->imagem_dragao = $request->imagem_dragao;
        $fichashitodama->save();
        
        $response['imagem_dragao'] = $request->imagem_dragao;

        return json_encode($response);
    }

    public function updatedragon(Request $request, Fichashitodama $fichashitodama)
    {
        $fichashitodama->dragao_nome = $request->dragao_nome;
        $fichashitodama->dragao_elemento = $request->dragao_elemento;
        $fichashitodama->save();

        $response['dragao_nome'] = $fichashitodama->dragao_nome;
        $response['dragao_elemento'] = $fichashitodama->dragao_elemento;

        return json_encode($response);
    }

    public function updatearma(Request $request, Fichashitodama $fichashitodama)
    {
        $fichashitodama->arma_nome = $request->arma_nome;
        $fichashitodama->arma_dano = $request->arma_dano;
        $fichashitodama->arma_elemento = $request->arma_elemento;
        $fichashitodama->save();

        $response['arma_nome'] = $fichashitodama->arma_nome;
        $response['arma_dano'] = $fichashitodama->arma_dano;
        $response['arma_elemento'] = $fichashitodama->arma_elemento;

        return json_encode($response);
    }
}
