@extends('sheet.master.layout')

@section('css')
<link rel="stylesheet" href="{{ url(mix('css/dashboard.css')) }}">
@endsection

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-4 p-3 m-3 justify-content-center fundo" id="showSheets">
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
                <form id="personagemModalForm">
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

@section('scripts')
<script>
    function showAll() {
        $.ajax({
            url: "{{ route('sheet.showall') }}",
            type: "get",
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    console.log(response.fichas);
                    let infos = response.fichas,
                        content = "";

                    for (i in infos) {
                        content += "<p>" + infos[i].nome + "</p>";
                    }

                    console.log(content);
                    $('#showSheets').html(content);
                }
            },
            error: function(response) {
                console.log(response.responseJSON.message);
            }
        });
    }

    $('body').ready(showAll());

    $(function() {
        $('form[id="personagemModalForm"]').submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('sheet.store') }}",
                type: "post",
                data: $(this).serialize(),
                success: function(response) {
                    showAll();
                }
            });
        });
    });
</script>
@endsection