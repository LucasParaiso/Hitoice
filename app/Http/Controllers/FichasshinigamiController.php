<?php

namespace App\Http\Controllers;

use App\Models\Fichasshinigami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class FichasshinigamiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_as !== 'admin') {
            $fichasshinigami = User::where('id', Auth::id())->first()->fichasshinigami()->get();

            return view('sheets.shinigami.dashboard', [
                'fichasshinigami' => $fichasshinigami
            ]);
        }

        $fichasshinigami = Fichasshinigami::all()->sortByDesc('user_id');
        $users = User::all();

        return view('sheets.shinigami.dashboard', [
            'fichasshinigami' => $fichasshinigami,
            'users' => $users
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
        $fichasshinigami = new Fichasshinigami();

        $fichasshinigami->nome = $request->nomeDashboard;
        $fichasshinigami->user_id = $request->userDashboard;

        if ($request->imagemDashboard) {
            $fichasshinigami->imagem_personagem = $request->imagemDashboard;
        }

        $fichasshinigami->save();

        return redirect()->route('shinigami.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ficha  $fichasshinigami
     * @return \Illuminate\Http\Response
     */
    public function show(Fichasshinigami $fichasshinigami)
    {
        if (Auth::check()) {
            $caminhos = DB::table('caminhos')->get();
            $classes = DB::table('classes')->get();
            $herancas = DB::table('herancas')->get();

            $caminho = null;
            $classe = null;
            $heranca = null;

            if ($fichasshinigami->caminho_id) {
                $caminho = DB::table('caminhos')->where('id', $fichasshinigami->caminho_id)->first();
            }

            if ($fichasshinigami->classe_id) {
                $classe = DB::table('classes')->where('id', $fichasshinigami->classe_id)->first();
            }

            if ($fichasshinigami->heranca_id) {
                $heranca = DB::table('herancas')->where('id', $fichasshinigami->heranca_id)->first();
            }

            $almas = $fichasshinigami->almas()->get();

            return view('sheets.shinigami.ficha', [
                'ficha' => $fichasshinigami,
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
     * @param  \App\Models\Ficha  $fichasshinigami
     * @return \Illuminate\Http\Response
     */
    public function edit(Fichasshinigami $fichasshinigami)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ficha  $fichasshinigami
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fichasshinigami $fichasshinigami)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ficha  $fichasshinigami
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fichasshinigami $fichasshinigami)
    {
        Fichasshinigami::destroy($fichasshinigami->id);

        return redirect()->route('shinigami.index');
    }

    public function caminho(Request $request, Fichasshinigami $fichasshinigami)
    {
        $fichasshinigami->caminho_id = $request->caminho_id;
        $fichasshinigami->save();

        $caminho = DB::table('caminhos')->where('id', $request->caminho_id)->first();

        return json_encode($caminho);
    }

    public function classe(Request $request, Fichasshinigami $fichasshinigami)
    {
        $fichasshinigami->classe_id = $request->classe_id;
        $fichasshinigami->save();

        $classe = DB::table('classes')->where('id', $request->classe_id)->first();

        return json_encode($classe);
    }

    public function heranca(Request $request, Fichasshinigami $fichasshinigami)
    {
        $fichasshinigami->heranca_id = $request->heranca_id;
        $fichasshinigami->save();

        $heranca = DB::table('herancas')->where('id', $request->heranca_id)->first();

        return json_encode($heranca);
    }

    public function updatelife(Request $request, Fichasshinigami $fichasshinigami)
    {

        if (str_contains($request->vida_atual, '+') || str_contains($request->vida_atual, '-')) {
            $fichasshinigami->vida_atual += $request->vida_atual;
        } else {
            $fichasshinigami->vida_atual = $request->vida_atual;
        }

        if ($request->vida_max !== null) {
            $fichasshinigami->vida_max = $request->vida_max;
        }

        $fichasshinigami->save();

        $response = [
            'vida_atual' => $fichasshinigami->vida_atual,
            'vida_max' => $fichasshinigami->vida_max
        ];

        return json_encode($response);
    }

    public function updateawaken(Request $request, Fichasshinigami $fichasshinigami)
    {

        if (str_contains($request->despertado_atual, '+') || str_contains($request->despertado_atual, '-')) {
            $fichasshinigami->despertado_atual += $request->despertado_atual;
        } else {
            $fichasshinigami->despertado_atual = $request->despertado_atual;
        }

        if ($request->despertado_max !== null) {
            $fichasshinigami->despertado_max = $request->despertado_max;
        }

        $fichasshinigami->save();

        $response = [
            'despertado_atual' => $fichasshinigami->despertado_atual,
            'despertado_max' => $fichasshinigami->despertado_max
        ];

        return json_encode($response);
    }

    public function updateImageCharacter(Request $request, Fichasshinigami $fichasshinigami)
    {
        $fichasshinigami->imagem_personagem = $request->imagem_personagem;
        $fichasshinigami->save();

        return redirect()->route('shinigami.show', [
            'fichasshinigami' => $fichasshinigami->id
        ]);
    }

    public function updateImageDragon(Request $request, Fichasshinigami $fichasshinigami)
    {
        $fichasshinigami->imagem_dragao = $request->imagem_dragao;
        $fichasshinigami->save();

        return redirect()->route('shinigami.show', [
            'fichasshinigami' => $fichasshinigami->id
        ]);
    }

    public function updatedragon(Request $request, Fichasshinigami $fichasshinigami)
    {
        $fichasshinigami->dragao_nome = $request->dragao_nome;
        $fichasshinigami->dragao_elemento = $request->dragao_elemento;
        $fichasshinigami->save();

        $response['dragao_nome'] = $fichasshinigami->dragao_nome;
        $response['dragao_elemento'] = $fichasshinigami->dragao_elemento;

        return json_encode($response);
    }

    public function updatearma(Request $request, Fichasshinigami $fichasshinigami)
    {
        $fichasshinigami->arma_nome = $request->arma_nome;
        $fichasshinigami->arma_dano = $request->arma_dano;
        $fichasshinigami->arma_elemento = $request->arma_elemento;
        $fichasshinigami->save();

        $response['arma_nome'] = $fichasshinigami->arma_nome;
        $response['arma_dano'] = $fichasshinigami->arma_dano;
        $response['arma_elemento'] = $fichasshinigami->arma_elemento;

        return json_encode($response);
    }

    public function updateDescription(Request $request, Fichasshinigami $fichasshinigami)
    {
        $fichasshinigami->descricao = $request->descricao;
        $fichasshinigami->save();

        $response['descricao'] = $request->descricao;
        return json_encode($response);
    }
}
