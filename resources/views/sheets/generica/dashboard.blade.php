@extends('sheets.master.layout')

@section('css')
<link rel="stylesheet" href="{{ url(mix('css/dashboard.css')) }}">
@endsection

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-4 p-3 m-3 justify-content-center fundo" id="showSheets">
        @foreach($fichas as $ficha)
        <div class="col my-2" id="{{ 'fichaGenerica' . $ficha->id }}">
            <div class="p-3 text-center fundo">
                <a href="{{ route('generica.show', ['fichasgenerica' => $ficha->id]) }}" class="mb-3">
                    <div class="card bg-dark border-1 border-light">
                        <img src="{{ $ficha->imagem_personagem }}" class="card-img-top img-fluid" alt="imagem_generica">
                        <div class="card-body">
                            <p>{{ $ficha->nome }}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('sheetCreate')
<button data-bs-toggle="modal" data-bs-target="#novoGenericaModal" class="btn btn-primary me-2">Criar</button>
@endsection

@section('modal')
<!-- NOVO GENERICA MODAL -->
<div class="modal fade" id="novoGenericaModal" tabindex="-1" aria-labelledby="novoGenericaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="novoGenericaModalLabel">Novo Personagem</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form id="genericaModalForm" action="{{ route('generica.store') }}" method="post">
                    @csrf
                    <!-- NOME -->
                    <label for="genericaNome" class="mb-1 fs-5">Nome</label>
                    <input type="text" class="form-control mb-3 bg-transparent" style="color: white;" id="genericaNome" name="genericaNome" required autofocus>

                    <!-- IMAGEM GENERICA -->
                    <label for="imagemDashboard" class="fs-5">Imagem</label>
                    <input type="text" class="form-control mb-3 bg-transparent" style="color: white;" id="imagemDashboard" name="imagemDashboard">
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Criar" class="btn btn-primary" form="genericaModalForm" id="novoGenerica" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>
@endsection