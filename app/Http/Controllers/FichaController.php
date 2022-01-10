<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
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
            return view('sheet.dashboard');
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
        $ficha->imagem_personagem = $request->imagemPersonagemDashboard;
        $ficha->imagem_dragao = $request->imagemMiniDragaoDashboard;

        $ficha->save();
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function show(Ficha $ficha)
    {
        //
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

    public function showall()
    {
        $fichas = DB::table('fichas')->get();

        if ($fichas) {
            $response['success'] = true;
            $response['fichas'] = $fichas;
        }

        echo json_encode($response);
        return;
    }
}
