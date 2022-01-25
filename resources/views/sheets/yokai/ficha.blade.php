@extends('sheets.master.layout')

@section('css')
<link rel="stylesheet" href="{{ url(mix('css/sheet.css')) }}">
@endsection

@section('sheetDelete')
<a class="btn btn-danger me-1" data-bs-toggle="modal" data-bs-target="#deleteSheetYokaiModal">Excluir</a>
@endsection

@section('content')
<header class="my-5">
    <h1>{{ $ficha->nome }}</h1>
</header>

<div class="container">
    <div class="row">
        <!-- VIDA -->
        <div class="col-12 col-md-6 mb-3">
            <div class="p-3 m-2 text-center fundo">
                <!-- FOTO -->
                <div class="row">
                    <picture class="col-12" data-bs-toggle="modal" data-bs-target="#personagemModal" style="cursor: pointer;">
                        <source height="250px" width="250px" media='(min-width: 1250px)' srcset="{{ $ficha->imagem_yokai }}" id="imagem_yokai_grande">
                        <img height="125px" width="125px" src="{{ $ficha->imagem_yokai }}" class='img-fluid img-thumbnail rounded-circle mb-4' alt='FotoPersonagem' id="imagem_yokai_pequena">
                    </picture>
                </div>

                <!-- VIDA -->
                <div data-bs-toggle="modal" data-bs-target="#vidaModal" style="cursor: pointer;">
                    <div class="row mb-1">
                        <div class="col d-flex text-start ms-1">
                            <p>VIDA</p>
                            <ion-icon name="create-outline" size="small" class="ms-1"></ion-icon>
                        </div>
                        <p class="col text-end " id="vidaValue">
                            {{ $ficha->vida_atual . ' / ' . $ficha->vida_max }}
                        </p>
                    </div>
                    <div class="progress" style="height: 25px;" id="vidaFundo">
                        <div class="progress-bar bg-danger" id="vidaProgress" role="progressbar" style="width:{{ ($ficha->vida_atual / $ficha->vida_max) * 100 }}%"></div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-2 mb-3">
                    <div class="text-start d-flex">
                        <form name="vidaForm">
                            @csrf
                            <input type="text" name="vida_atual" id="vida_atual" value="-1" hidden>
                            <input type="submit" value="-1" class="btn btn-outline-light p-1 shadow-none">
                        </form>
                    </div>
                    <div class="text-end d-flex">
                        <form name="vidaForm">
                            @csrf
                            <input type="text" name="vida_atual" id="vida_atual" value="+1" hidden>
                            <input type="submit" value="+1" class="btn btn-outline-light p-1 shadow-none">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- DESCRICAO -->
        <div class="col-12 col-md-6 mb-3">
            <div class="p-3 m-2 text-center fundo">
                <textarea class="form-control" id="sheetDescription" rows="15">{{ $ficha->descricao }}</textarea>
            </div>
        </div>
        @endsection

        @section('modal')
        <!-- VIDA MODAL -->
        <div class="modal fade" id="vidaModal" tabindex="-1" aria-labelledby="vidaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h5 class="modal-title" id="vidaModalLabel">Atualizar Vida</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="vidaModalForm" name="vidaForm" class="row row-cols-1 text-start">
                            @csrf
                            <!-- VIDA ATUAL -->
                            <div class="col mb-3">
                                <div class="row justify-content-between">
                                    <label class="col col-form-label" for="vida_atual">Vida Atual: </label>
                                    <div class="col">
                                        <input required class="form-control bg-transparent text-center" type="text" style="color: white;" name="vida_atual" value="{{ $ficha->vida_atual }}">
                                    </div>
                                </div>
                            </div>

                            <!-- VIDA MAXIMA -->
                            <div class="col">
                                <div class="row justify-content-between">
                                    <label class="col col-form-label" for="vida_max">Vida Máxima: </label>
                                    <div class="col">
                                        <input class="form-control bg-transparent text-center" type="text" style="color: white;" name="vida_max" value="{{ $ficha->vida_max }}">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Atualizar Vida" class="btn btn-primary" form="vidaModalForm" data-bs-dismiss="modal" aria-label="Close">
                    </div>
                </div>
            </div>
        </div>

        <!-- YOKAI MODAL -->
        <div class="modal fade" id="personagemModal" tabindex="-1" aria-labelledby="personagemModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h5 class="modal-title" id="personagemModalLabel">Foto do Personagem</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        <form id="personagemModalForm" action="{{ route('yokai.updateimage', ['fichasyokai' => $ficha->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <!-- FOTO YOKAI -->
                            <label for="imagem_yokai" class="mb-1 fs-5">Link</label>
                            <input name="imagem_yokai" type="text" class="form-control mb-3 bg-transparent" style="color: white;" required>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Atualizar Foto" class="btn btn-primary" form="personagemModalForm" data-bs-dismiss="modal" aria-label="Close">
                    </div>
                </div>
            </div>
        </div>

        <!-- DELETE MODAL YOKAI -->
        <div class="modal fade" id="deleteSheetYokaiModal" tabindex="-1" aria-labelledby="deleteSheetModalLabel" aria-hidden="true">
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
                        <form action="{{ route('yokai.destroy', ['fichasyokai' => $ficha->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Sim" class="btn btn-primary">
                        </form>
                        <input type="button" value="Fechar" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
        <script>
            $('form[name="vidaForm"]').submit(function(event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('yokai.updatelife', ['fichasyokai' => $ficha->id]) }}",
                    type: "put",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        let vidaValue = response.vida_atual + ' / ' + response.vida_max
                        $('#vidaValue').html(vidaValue);

                        let vidaProgress = ((response.vida_atual / response.vida_max) * 100) + '%'
                        $('#vidaProgress').width(vidaProgress)
                    }
                });
            })

            $('#sheetDescription').change(function() {
                let descricao = document.getElementById('sheetDescription').value

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('yokai.updatedescription', ['fichasyokai' => $ficha->id]) }}",
                    type: "put",
                    data: {
                        'descricao': descricao
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#sheetDescription').text(response.descricao);
                    }
                });
            })
        </script>
        @endsection