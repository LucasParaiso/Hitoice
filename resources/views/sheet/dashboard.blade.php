@extends('sheet.master.layout')

@section('css')
<link rel="stylesheet" href="{{ url(mix('css/dashboard.css')) }}">
@endsection

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-4 p-3 m-3 justify-content-center fundo" id="showSheets">
        @foreach($fichas as $ficha)
        <div class="col mb-4">
            <div class="p-3 text-center fundo">
                <a href="{{ route('sheet.show', ['ficha' => $ficha->id]) }}" class="mb-3">
                    <div class="card bg-dark border-1 border-light">
                        <img src="{{ $ficha->imagem_personagem }}" class="card-img-top img-fluid" alt="imagem_personagem">

                        <div class="card-body">
                            {{ $ficha->nome }}
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('modal')
<!-- NOVO PERSONAGEM MODAL -->
<div class="modal fade" id="novoPersonagemModal" tabindex="-1" aria-labelledby="novoPersonagemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="novoPersonagemModalLabel">Novo Personagem</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form action="{{ route('sheet.store') }}" method="post" id="personagemModalForm">
                    @csrf
                    <!-- NOME -->
                    <label for="nomeDashboard" class="mb-1 fs-5">Nome</label>
                    <input type="text" class="form-control mb-3 bg-transparent" style="color: white;" id="nomeDashboard" name="nomeDashboard" required autofocus>

                    <!-- IMAGEM PERSONAGEM -->
                    <label for="imagemPersonagemDashboard" class="mb-1 fs-5">Imagem do Personagem</label>
                    <input type="text" class="form-control mb-3 bg-transparent" style="color: white;" id="imagemPersonagemDashboard" name="imagemPersonagemDashboard" required>

                    <!-- IMAGEM MINI DRAGAO -->
                    <label for="imagemMiniDragaoDashboard" class="mb-1 fs-5">Imagem do Mini Dragão</label>
                    <input type="text" class="form-control mb-1 bg-transparent" style="color: white;" id="imagemMiniDragaoDashboard" name="imagemMiniDragaoDashboard" required>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Criar" class="btn btn-primary" form="personagemModalForm" id="novoPersonagem" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>
@endsection

@section('sheetCreate')
<button data-bs-toggle="modal" data-bs-target="#novoPersonagemModal" class="btn btn-primary me-2">Criar</button>
@endsection