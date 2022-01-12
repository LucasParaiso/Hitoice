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
                    <picture class="col-6" data-bs-toggle="modal" data-bs-target="#personagemModal" style="cursor: pointer;">
                        <source height="250px" width="250px" media='(min-width: 1250px)' srcset="{{ $ficha->imagem_personagem }}" id="imagem_personagem_grande">
                        <img height="125px" width="125px" src="{{ $ficha->imagem_personagem }}" class='img-fluid img-thumbnail rounded-circle mb-4' alt='FotoPersonagem' id="imagem_personagem_pequena">
                    </picture>

                    <!-- MINI DRAGAO -->
                    <picture class="col-6" data-bs-toggle="modal" data-bs-target="#dragaoModal" style="cursor: pointer;">
                        <source height="250px" width="250px" media='(min-width: 1250px)' class="grande" srcset="{{ $ficha->imagem_dragao }}" id="imagem_dragao_grande">
                        <img height="125px" width="125px" src="{{ $ficha->imagem_dragao }}" class='img-fluid img-thumbnail rounded-circle mb-4' alt='FotoPersonagem' id="imagem_dragao_pequena">
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
                <div data-bs-toggle="modal" data-bs-target="#despertadoModal" style="cursor: pointer;">
                    <div class="mb-1 d-flex">
                        <div class="d-flex text-start ms-1">
                            <p>MODO DESPERTADO</p>
                        </div>
                        <p class="col text-end" id="despertadoValue">
                            {{ $ficha->despertado_atual . ' / ' . $ficha->despertado_max }}
                        </p>
                    </div>
                    <div class="progress" style="height: 25px;" id="despertadoFundo">
                        <div class="progress-bar" id="despertadoProgress" role="progressbar" style="width:{{ ($ficha->despertado_atual / $ficha->despertado_max) * 100 }}%; background-color: indigo;"></div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-2 mb-3">
                    <div class="text-start d-flex">
                        <form name="despertadoForm">
                            @csrf
                            <input type="text" name="despertado_atual" id="despertado_atual" value="-1" hidden>
                            <input type="submit" value="-1" class="bg-transparent border border-1 border-light rounded">
                        </form>
                    </div>
                    <div class="text-end d-flex">
                        <form name="despertadoForm">
                            @csrf
                            <input type="text" name="despertado_atual" id="despertado_atual" value="+1" hidden>
                            <input type="submit" value="+1" class="bg-transparent border border-1 border-light rounded">
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
                        <caption data-bs-toggle="modal" data-bs-target="#dragaoModalDetail" style="cursor: pointer;">
                            Mini Dragão
                            <ion-icon name="create-outline" size="small"></ion-icon>
                        </caption>
                    <thead class="border-bottom border-2">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Elemento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="dragao_nome">{{ $ficha->dragao_nome }}</td>
                            <td id="dragao_elemento">{{ $ficha->dragao_elemento }}</td>
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
                <h5 class="modal-title" id="personagemModalLabel">Foto do Personagem</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form id="personagemModalForm" action="{{ route('sheet.updateimage', ['ficha' => $ficha->id]) }}" method="post">
                    @csrf
                    <!-- FOTO PERSONAGEM -->
                    <label for="imagem_personagem" class="mb-1 fs-5">Link</label>
                    <input name="imagem_personagem" type="text" class="form-control mb-3 bg-transparent" style="color: white;" required>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Atualizar Foto" class="btn btn-primary" form="personagemModalForm" data-bs-dismiss="modal" aria-label="Close">
            </div>
        </div>
    </div>
</div>

<!-- DRAGAO MODAL -->
<div class="modal fade" id="dragaoModal" tabindex="-1" aria-labelledby="dragaoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="dragaoModalLabel">Foto do Dragao</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <form id="dragaoModalForm" action="{{ route('sheet.updateimage', ['ficha' => $ficha->id]) }}" method="post">
                    @csrf
                    <!-- FOTO DRAGAO -->
                    <label for="imagem_dragao" class="mb-1 fs-5">Link</label>
                    <input name="imagem_dragao" type="text" class="form-control mb-3 bg-transparent" style="color: white;" required>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Atualizar Foto" class="btn btn-primary" form="dragaoModalForm" data-bs-dismiss="modal" aria-label="Close">
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

<!-- DRAGAO MODAL -->
<div class="modal fade" id="dragaoModalDetail" tabindex="-1" aria-labelledby="dragaoModalDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="dragaoModalDetailLabel">Atualizar Mini Dragão</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="dragaoModalDetailsForm" class="row row-cols-1 text-start">
                    @csrf
                    <!-- DRAGAO NOME -->
                    <div class="col mb-3">
                        <div class="row justify-content-between">
                            <label class="col col-form-label" for="dragao_nome">Nome: </label>
                            <div class="col">
                                <input class="form-control bg-transparent text-center" type="text" style="color: white;" name="dragao_nome" value="{{ $ficha->dragao_nome }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- ELEMENTO -->
                    <div class="col">
                        <div class="row justify-content-between">
                            <label class="col col-form-label" for="dragao_elemento">Elemento: </label>
                            <div class="col">
                                <select class="col form-select bg-transparent text-center" style="color: white;" name="dragao_elemento">
                                <?php $elementos = array(1 => "Fogo", 2 => "Água", 3 => "Vento", 4 => "Terra", 5 => "Raio") ?>

                                @foreach($elementos as $elemento)
                                    <option value="{{ $elemento }}" style="color: black;"
                                    @if ($ficha->dragao_elemento == $elemento)
                                    selected
                                    @endif
                                    >{{ $elemento }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Atualizar Mini Dragão" class="btn btn-primary" form="dragaoModalDetailsForm" data-bs-dismiss="modal" aria-label="Close">
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

    $('form[name="despertadoForm"]').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "{{ route('sheet.updateawaken', ['ficha' => $ficha->id]) }}",
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                let despertadoValue = response.despertado_atual + ' / ' + response.despertado_max
                $('#despertadoValue').html(despertadoValue);

                let despertadoProgress = ((response.despertado_atual / response.despertado_max) * 100) + '%'
                $('#despertadoProgress').width(despertadoProgress)
            }
        });
    })

    $('form[id="dragaoModalDetailsForm"]').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "{{ route('sheet.updatedragon', ['ficha' => $ficha->id]) }}",
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                $('#dragao_nome').html(response.dragao_nome);
                $('#dragao_elemento').html(response.dragao_elemento);
            }
        });
    })
</script>
@endsection