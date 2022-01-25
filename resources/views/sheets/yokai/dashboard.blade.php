@extends('sheets.master.layout')

@section('css')
<link rel="stylesheet" href="{{ url(mix('css/dashboard.css')) }}">
@endsection

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-4 p-3 m-3 justify-content-center fundo" id="showSheets">
        @foreach($fichas as $ficha)
        <div class="col my-2" id="{{ 'fichaYokai' . $ficha->id }}">
            <div class="p-3 text-center fundo">
                <a href="{{ route('yokai.show', ['fichasyokai' => $ficha->id]) }}" class="mb-3">
                    <div class="card bg-dark border-1 border-light">
                        <img src="{{ $ficha->imagem_yokai }}" class="card-img-top img-fluid" alt="imagem_yokai">
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
<button data-bs-toggle="modal" data-bs-target="#novoYokaiModal" class="btn btn-primary me-2">Criar</button>
@endsection

@section('modal')
<!-- NOVO YOKAI MODAL -->
<div class="modal fade" id="novoYokaiModal" tabindex="-1" aria-labelledby="novoYokaiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="novoYokaiModalLabel">Novo Yokai</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form id="yokaiModalForm" action="{{ route('yokai.store') }}" method="post">
                    @csrf
                    <!-- NOME -->
                    <label for="yokaiNome" class="mb-1 fs-5">Nome</label>
                    <input type="text" class="form-control mb-3 bg-transparent" style="color: white;" id="yokaiNome" name="yokaiNome" required autofocus>

                    <!-- IMAGEM YOKAI -->
                    <label for="imagemDashboard" class="fs-5">Imagem</label>
                    <input type="text" class="form-control mb-3 bg-transparent" style="color: white;" id="imagemDashboard" name="imagemDashboard">
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Criar" class="btn btn-primary" form="yokaiModalForm" id="novoYokai" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>
@endsection