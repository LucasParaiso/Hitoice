@extends('sheet.master.layout')

@section('css')
<link rel="stylesheet" href="{{ url(mix('css/sheet.css')) }}">
@endsection

@section('content')
<header class="my-5">
    <h1>{{ $ficha->nome }}</h1>
</header>

<div class="container">
    <div class="row row-cols-1 row-cols-md-2">
        <!-- VIDA -->
        <div class="col mb-3">
            <div class="p-3 m-2 text-center fundo">
                <!-- FOTO -->
                <div class="row">
                    <!-- PERSONAGEM -->
                    <picture class="col-6" data-bs-toggle="modal" data-bs-target="#personagemModal">
                        <source height="250px" width="250px" media='(min-width: 1250px)' srcset="{{ $ficha->imagem_personagem }}">
                        <img height="125px" width="125px" src="{{ $ficha->imagem_personagem }}" class='img-fluid img-thumbnail rounded-circle mb-4' alt='FotoPersonagem'>
                    </picture>

                    <!-- MINI DRAGAO -->
                    <picture class="col-6" data-bs-toggle="modal" data-bs-target="#petModal">
                        <source height="250px" width="250px" media='(min-width: 1250px)' class="grande" srcset="{{ $ficha->imagem_dragao }}">
                        <img height="125px" width="125px" src="{{ $ficha->imagem_dragao }}" class='img-fluid img-thumbnail rounded-circle mb-4' alt='FotoPersonagem'>
                    </picture>
                </div>

                <!-- VIDA -->
                <div data-bs-toggle="modal" data-bs-target="#vidaModal">
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
                            <input type="submit" value="-1" class="bg-transparent border border-1 border-light rounded">
                        </form>
                    </div>
                    <div class="text-end d-flex">
                        <form name="vidaForm">
                            @csrf
                            <input type="text" name="vida_atual" id="vida_atual" value="+1" hidden>
                            <input type="submit" value="+1" class="bg-transparent border border-1 border-light rounded">
                        </form>
                    </div>
                </div>

                <!-- DESPERTADO -->
                <div data-bs-toggle="modal" data-bs-target="#despertadoModal">
                    <div class="mb-1 d-flex">
                        <div class="d-flex text-start ms-1">
                            <p>MODO DESPERTADO</p>
                            <ion-icon name="create-outline" size="small" class="ms-1"></ion-icon>
                        </div>
                        <p class="col text-end ">
                            {{ $ficha->despertado_atual . ' / ' . $ficha->despertado_max }}
                        </p>
                    </div>
                    <div class="progress" style="height: 25px;" id="despertadoFundo">
                        <div class="progress-bar" role="progressbar" style="{{ 'width: ' .  ($ficha->despertado_atual / $ficha->despertado_max) * 100 . '%;' }} background-color: indigo;" aria-valuenow="3" aria-valuemin="0" aria-valuemax="3"></div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-2 mb-3">
                    <div class="text-start d-flex">
                        <form action="#" method="POST">
                            <input type="submit" value="-1" class="bg-transparent border border-1 border-light rounded">
                        </form>
                    </div>
                    <div class="text-end d-flex">
                        <form action="#" method="POST">
                            <input type="submit" value="+1" class="bg-transparent border border-1 border-light rounded ms-2">
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- CLASSE -->
        <div class="col mb-3">
            <div class='p-3 m-2 text-start fundo'>
                <div class="d-flex justify-content-center p-3 mb-3" data-bs-toggle="modal" data-bs-target="#classeModal" style="cursor: pointer;">
                    <h2 class="fs-2">Classe</h2>
                    <ion-icon class="ms-2" name="create-outline" size="large"></ion-icon>
                </div>
                <h3 class="fs-4 mb-1" id="classeTitulo">
                    @if ($ficha->classe_id)
                    {{ $classes[$ficha->classe_id - 1]->titulo }}
                    @endif
                </h3>
                <p id="classeDescricao">
                    @if ($ficha->classe_id)
                    {{ $classes[$ficha->classe_id - 1]->descricao }}
                    @endif
                </p>
            </div>
        </div>

        <!-- HERANCA -->
        <div class="col mb-3">
            <div class='p-3 m-2 text-start fundo'>
                <div class="d-flex justify-content-center p-3 mb-3" data-bs-toggle="modal" data-bs-target="#herancaModal" style="cursor: pointer;">
                    <h2 class="fs-2">Herança dos Kami</h2>
                    <ion-icon class="ms-2" name="create-outline" size="large"></ion-icon>
                </div>
                <h3 class="fs-4 mb-1" id="herancaTitulo">
                    @if ($heranca)
                    {{ $heranca->titulo }}
                    @endif
                </h3>
                <p id="herancaDescricao">
                    @if ($heranca)
                    <?php echo $heranca->descricao; ?>
                    @endif
                </p>
            </div>
        </div>

        <!-- CAMINHO DA KATANA -->
        <div class="col mb-3">
            <div class='p-3 m-2 text-start fundo'>
                <div class="d-flex justify-content-center p-3 mb-3" data-bs-toggle="modal" data-bs-target="#caminhoModal" style="cursor: pointer;">
                    <h2 class="fs-2">Caminho da Katana</h2>
                    <ion-icon class="ms-2" name="create-outline" size="large"></ion-icon>
                </div>
                <h3 class="fs-4 mb-1" id="caminhoTitulo">
                    @if ($caminho)
                    {{ $caminho->titulo }}
                    @endif
                </h3>
                <p id="caminhoDescricao">
                    @if ($caminho)
                    <?php echo $caminho->descricao; ?>
                    @endif
                </p>
            </div>
        </div>

        <!-- EQUIPAMENTO -->
        <div class="col mb-3">
            <div class='p-3 m-2 fundo'>
                <h2 class="fs-2 p-3 mb-3">Equipamento</h2>

                <!-- ARMAS -->
                <table class="table caption-top mb-5">
                    <caption>Arma</caption>
                    <thead class="border-bottom border-2">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Dano</th>
                            <th scope="col">Elemento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $ficha->arma_nome }}</td>
                            <td>{{ $ficha->arma_dano }}</td>
                            <td>{{ $ficha->arma_elemento }}</td>
                        </tr>
                    </tbody>
                </table>

                <!-- MINI DRAGAO -->
                <table class="table caption-top">
                    <caption>Mini Dragão</caption>
                    <thead class="border-bottom border-2">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Elemento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $ficha->dragao_nome }}</td>
                            <td>{{ $ficha->dragao_elemento }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ALMAS -->
        <div class="col mb-3">
            <div class='p-3 m-2 fundo'>
                <h2 class="fs-2 p-3 mb-3">Almas</h2>
                <table class="table caption-top">
                    <thead class="border-bottom border-2">
                        <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">Propriedade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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

<!-- PERSONAGEM MODAL -->
<div class="modal fade" id="personagemModal" tabindex="-1" aria-labelledby="personagemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="personagemModalLabel">Foto de Personagem</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form action="#" method="POST" id="personagemModalForm">
                    <!-- FOTO PERSONAGEM -->
                    <label for="imagem_personagem" class="mb-1 fs-5">Link</label>
                    <input required type="text" class="form-control mb-3 bg-transparent" style="color: white;">
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Atualizar Foto" class="btn btn-primary" form="personagemModalForm">
            </div>
        </div>
    </div>
</div>

<!-- PET MODAL -->
<div class="modal fade" id="petModal" tabindex="-1" aria-labelledby="petModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="petModalLabel">Foto do Pet de Personagem</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form action="#" method="POST" id="petModalForm">
                    <!-- FOTO PET -->
                    <label for="imagem_pet" class="mb-1 fs-5">Link</label>
                    <input required type="text" class="form-control mb-3 bg-transparent" style="color: white;">
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Atualizar Foto" class="btn btn-primary" form="petModalForm">
            </div>
        </div>
    </div>
</div>

<!-- CAMINHO MODAL -->
<div class="modal fade" id="caminhoModal" tabindex="-1" aria-labelledby="caminhoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="caminhoModalLabel">Caminho da Katana</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form id="caminhoModalForm">
                    @csrf
                    <!-- CAMINHO -->
                    <select class="col form-select bg-transparent text-center" style="color: white;" name="caminho_id">
                        @foreach($caminhos as $caminho)
                        <option value="{{ $caminho->id }}" style="color: black;" @if ($ficha->caminho_id == $caminho->id)
                            selected
                            @endif
                            >{{ $caminho->titulo }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Salvar" class="btn btn-primary" form="caminhoModalForm" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>

<!-- CLASSE MODAL -->
<div class="modal fade" id="classeModal" tabindex="-1" aria-labelledby="classeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="classeModalLabel">Classe</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form id="classeModalForm">
                    @csrf
                    <!-- CLASSE -->
                    <select class="col form-select bg-transparent text-center" style="color: white;" name="classe_id">
                        @foreach($classes as $classe)
                        <option value="{{ $classe->id }}" style="color: black;" @if ($ficha->classe_id == $classe->id)
                            selected
                            @endif
                            >{{ $classe->titulo }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Salvar" class="btn btn-primary" form="classeModalForm" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>

<!-- HERANCA MODAL -->
<div class="modal fade" id="herancaModal" tabindex="-1" aria-labelledby="herancaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="herancaModalLabel">Herança dos Kami</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form id="herancaModalForm">
                    @csrf
                    <!-- HERANCA -->
                    <select class="col form-select bg-transparent text-center" style="color: white;" name="heranca_id">
                        @foreach($herancas as $heranca)
                        <option value="{{ $heranca->id }}" style="color: black;">{{ $heranca->titulo }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Salvar" class="btn btn-primary" form="herancaModalForm" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('form[id="caminhoModalForm"]').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "{{ route('sheet.caminho', ['ficha' => $ficha->id]) }}",
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                $('#caminhoTitulo').html(response.titulo)
                $('#caminhoDescricao').html(response.descricao)
            }
        });
    })

    $('form[id="classeModalForm"]').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "{{ route('sheet.classe', ['ficha' => $ficha->id]) }}",
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                $('#classeTitulo').html(response.titulo)
                $('#classeDescricao').html(response.descricao)
            }
        });
    })

    $('form[id="herancaModalForm"]').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "{{ route('sheet.heranca', ['ficha' => $ficha->id]) }}",
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                $('#herancaTitulo').html(response.titulo)
                $('#herancaDescricao').html(response.descricao)
            }
        });
    })

    $('form[name="vidaForm"]').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "{{ route('sheet.updatelife', ['ficha' => $ficha->id]) }}",
            type: "post",
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
</script>
@endsection