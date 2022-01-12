<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $fichas = User::where('id', Auth::id())->first()->fichas()->get();

            return view('sheet.dashboard', [
                'fichas' => $fichas
            ]);
        }

        return redirect()->route('user.login');
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
        $ficha = new Ficha();

        $ficha->nome = $request->nomeDashboard;
        $ficha->user_id = Auth::id();
        $ficha->imagem_personagem = $request->imagemPersonagemDashboard;
        $ficha->imagem_dragao = $request->imagemMiniDragaoDashboard;

        $ficha->save();
        return redirect()->route('sheet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function show(Ficha $ficha)
    {
        $caminhos = DB::table('caminhos')->get();
        $classes = DB::table('classes')->get();
        $herancas = DB::table('herancas')->get();

        $caminho = null;
        $classe = null;
        $heranca = null;

        if ($ficha->caminho_id) {
            $caminho = DB::table('caminhos')->where('id', $ficha->caminho_id)->first();
        }

        if ($ficha->classe_id) {
            $classe = DB::table('classes')->where('id', $ficha->classe_id)->first();
        }

        if ($ficha->heranca_id) {
            $heranca = DB::table('herancas')->where('id', $ficha->heranca_id)->first();
        }
        
        return view('sheet.ficha', [
            'ficha' => $ficha,

            'caminhos' => $caminhos,
            'classes' => $classes,
            'herancas' => $herancas,

            'caminho' => $caminho,
            'classe' => $classe,
            'heranca' => $heranca
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function edit(Ficha $ficha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ficha $ficha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ficha $ficha)
    {
        //
    }

    public function caminho(Request $request, Ficha $ficha)
    {
        $ficha->caminho_id = $request->caminho_id;
        $ficha->save();

        $caminho = DB::table('caminhos')->where('id', $request->caminho_id)->first();

        echo json_encode($caminho);
        return;
    }

    public function classe(Request $request, Ficha $ficha)
    {
        $ficha->classe_id = $request->classe_id;
        $ficha->save();

        $classe = DB::table('classes')->where('id', $request->classe_id)->first();

        echo json_encode($classe);
        return;
    }

    public function heranca(Request $request, Ficha $ficha)
    {
        $ficha->heranca_id = $request->heranca_id;
        $ficha->save();

        $heranca = DB::table('herancas')->where('id', $request->heranca_id)->first();

        echo json_encode($heranca);
        return;
    }
}
