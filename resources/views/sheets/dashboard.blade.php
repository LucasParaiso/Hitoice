@extends('sheets.master.layout')

@section('css')
<link rel="stylesheet" href="{{ url(mix('css/dashboard.css')) }}">
@endsection

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-4 p-3 m-3 justify-content-center fundo" id="showSheets">
        @foreach($fichasshinigami as $ficha)
        <div class="col mb-4" id="{{ 'fichaHitodama' . $ficha->id }}">
            <div class="p-3 text-center fundo">
                <a href="{{ route('shinigami.show', ['fichasshinigami' => $ficha->id]) }}" class="mb-3">
                    <div class="card bg-dark border-1 border-light">
                        <img src="{{ $ficha->imagem_personagem }}" class="card-img-top img-fluid" alt="imagem_personagem">
                        <div class="card-body">
                            <p>{{ $ficha->nome }}</p>
                            @if (Auth::user()->role_as == 'admin')
                            <a class="btn btn-danger mt-2" data-bs-ficha-id="{{ $ficha->id }}" data-bs-toggle="modal" data-bs-target="#deleteSheetHitodamaModal">Excluir</a>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        @foreach($fichasgenerica as $ficha)
        <div class="col mb-4" id="{{ 'fichaGenerica' . $ficha->id }}">
            <div class="p-3 text-center fundo">
                <a href="{{ route('generica.show', ['fichasgenerica' => $ficha->id]) }}" class="mb-3">
                    <div class="card bg-dark border-1 border-light">
                        <img src="{{ $ficha->imagem_personagem }}" class="card-img-top img-fluid" alt="imagem_personagem">
                        <div class="card-body">
                            <p>{{ $ficha->nome }}</p>
                            @if (Auth::user()->role_as == 'admin')
                            <a class="btn btn-danger mt-2" data-bs-ficha-id="{{ $ficha->id }}" data-bs-toggle="modal" data-bs-target="#deleteSheetGenericaModal">Excluir</a>
                            @endif
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
@if (Auth::user()->role_as == 'admin')
<button data-bs-toggle="modal" data-bs-target="#novoPersonagemModal" class="btn btn-primary me-2">Criar</button>
@endif
@endsection

@section('modal')
@if (Auth::user()->role_as == 'admin')
<!-- NOVO PERSONAGEM MODAL -->
<div class="modal fade" id="novoPersonagemModal" tabindex="-1" aria-labelledby="novoPersonagemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="novoPersonagemModalLabel">Novo Personagem</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form id="personagemModalForm">
                    @csrf
                    <!-- NOME -->
                    <label for="nomeDashboard" class="mb-1 fs-5">Nome</label>
                    <input type="text" class="form-control mb-3 bg-transparent" style="color: white;" id="nomeDashboard" name="nomeDashboard" required autofocus>

                    <!-- USUARIO -->
                    <label for="userDashboard" class="mb-1 fs-5">Usuário</label>
                    <select name="userDashboard" id="userDashboard" class="col form-select bg-transparent text-center mb-3" style="color: white;">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" style="color: black;">{{ $user->name }}</option>
                        @endforeach
                    </select>

                    <!-- MODELO -->
                    <label for="tipoFichaDashboard" class="fs-5">Ficha</label>
                    <select name="tipoFichaDashboard" id="tipoFichaDashboard" class="col form-select bg-transparent text-center" style="color: white;">
                        <option value="shinigami" style="color: black;">Shinigami</option>
                        <option value="generica" style="color: black;">Genérica</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Criar" class="btn btn-primary" form="personagemModalForm" id="novoPersonagem" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>

<!-- DELETE MODAL HITODAMA -->
<div class="modal fade" id="deleteSheetHitodamaModal" tabindex="-1" aria-labelledby="deleteSheetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 id="deleteSheetModalLabel">Confirmação</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <p>Você tem certeza que deseja excluir essa ficha?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('shinigami.destroy', ['fichasshinigami' => $ficha->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="text" name="ficha_id" id="ficha_id" hidden>
                    <input type="submit" value="Sim" class="btn btn-primary">
                </form>
                <input type="button" value="Fechar" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>

<!-- DELETE MODAL GENERICA -->
<div class="modal fade" id="deleteSheetGenericaModal" tabindex="-1" aria-labelledby="deleteSheetGenericaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 id="deleteSheetGenericaModalLabel">Confirmação</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <p>Você tem certeza que deseja excluir essa ficha?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('generica.destroy', ['fichasgenerica' => $ficha->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="text" name="ficha_id" id="ficha_id" hidden>
                    <input type="submit" value="Sim" class="btn btn-primary">
                </form>
                <input type="button" value="Fechar" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@section('scripts')
<script>
    function deleteSheet(deleteSheetModal) {
        deleteSheetModal.addEventListener("show.bs.modal", function(event) {
            let trigger = event.relatedTarget;
            let id = trigger.getAttribute("data-bs-ficha-id");
            let ficha_id = deleteSheetModal.querySelector("#ficha_id");
            ficha_id.value = id;
        });
    }

    deleteSheet(document.getElementById("deleteSheetHitodamaModal"));
    deleteSheet(document.getElementById("deleteSheetGenericaModal"));
</script>
<script>
    $('form[id="personagemModalForm"]').submit(function(event) {
        event.preventDefault();

        switch ($("#tipoFichaDashboard").val()) {
            case 'shinigami':
                var url = "{{ route('shinigami.store') }}";
                break;

            case 'generica':
                var url = "{{ route('generica.store') }}";
                break;
        }

        $.ajax({
            url: url,
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                location.reload();
            }
        });
    })
</script>
@endsection