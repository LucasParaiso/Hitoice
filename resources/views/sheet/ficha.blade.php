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
                        <p class="col text-end ">
                            {{ $ficha->vida_atual . ' / ' . $ficha->vida_max }}
                        </p>
                    </div>
                    <div class="progress" style="height: 25px;" id="vidaFundo">
                        <div class="progress-bar bg-danger" role="progressbar" style="{{ 'width: ' .  ($ficha->vida_atual / $ficha->vida_max) * 100 . '%;' }}" aria-valuenow="{{ $ficha->vida_atual }}" aria-valuemin="0" aria-valuemax="{{ $ficha->vida_max }}"></div>
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
                        <div class="progress-bar" role="progressbar" 
                        style="{{ 'width: ' .  ($ficha->despertado_atual / $ficha->despertado_max) * 100 . '%;' }} background-color: indigo;"
                         aria-valuenow="3" aria-valuemin="0" aria-valuemax="3"></div>
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

        <!-- CAMINHO DA KATANA -->
        <div class="col mb-3">
            <div class='p-3 m-2 text-start fundo'>
                <div class="d-flex justify-content-center p-3 mb-3" data-bs-toggle="modal" data-bs-target="#caminhoModal" style="cursor: pointer;">
                    <h2 class="fs-2">Caminho da Katana</h2>
                    <ion-icon class="ms-2" name="create-outline" size="large"></ion-icon>
                </div>
                <h3 class="fs-5">

                </h3>
                <p>

                </p>
            </div>
        </div>

        <!-- CLASSE -->
        <div class="col mb-3">
            <div class='p-3 m-2 text-start fundo'>
                <div class="d-flex justify-content-center p-3 mb-3" data-bs-toggle="modal" data-bs-target="#classeModal" style="cursor: pointer;">
                    <h2 class="fs-2">Classe</h2>
                    <ion-icon class="ms-2" name="create-outline" size="large"></ion-icon>
                </div>
                <h3 class="fs-5">

                </h3>
                <p>
                    
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
                <h3 class="fs-5">
                    
                </h3>
                <p>
                    
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
                <form action="#" method="POST" id="vidaModalForm">
                    <div class="row row-cols-1 text-start">
                        <!-- VIDA ATUAL -->
                        <div class="col mb-3">
                            <div class="row justify-content-between">
                                <label class="col col-form-label" for="vida_atual">Vida Atual: </label>
                                <div class="col">
                                    <input required class="form-control bg-transparent text-center" type="text" style="color: white;">
                                </div>
                            </div>
                        </div>

                        <!-- VIDA MAXIMA -->
                        <div class="col">
                            <div class="row justify-content-between">
                                <label class="col col-form-label" for="vida_max">Vida Máxima: </label>
                                <div class="col">
                                    <input required class="form-control bg-transparent text-center" type="text" style="color: white;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Atualizar Vida" class="btn btn-primary" form="vidaModalForm">
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
                <form action="#" method="POST" id="caminhoModalForm">
                    <!-- CAMINHO -->
                    <select class="col form-select bg-transparent text-center" style="color: white;">
                        <option value="Humanos" style="color: black;">Humanos</option>
                        <option value="Dobuu" style="color: black;">Dobuu</option>
                        <option value="Minu" style="color: black;">Minu</option>
                        <option value="Yin" style="color: black;">Yin</option>
                        <option value="Yang" style="color: black;">Yang</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Salvar" class="btn btn-primary" form="caminhoModalForm">
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
                <form action="#" method="POST" id="classeModalForm">
                    <!-- CLASSE -->
                    <select class="col form-select bg-transparent text-center" style="color: white;">
                        <option value="Deus com os olhos da morte" style="color: black;">Deus com os olhos da
                            morte</option>
                        <option value="Deus que transita" style="color: black;">Deus que transita</option>
                        <option value="Deus empático" style="color: black;">Deus empático</option>
                        <option value="Deus que cura" style="color: black;">Deus que cura</option>
                        <option value="Deus que se deleita" style="color: black;">Deus que se deleita</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Salvar" class="btn btn-primary" form="classeModalForm">
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
                <form action="#" method="POST" id="herancaModalForm">
                    <!-- HERANCA -->
                    <select class="col form-select bg-transparent text-center" style="color: white;">
                        <option value="Amaterasu" style="color: black;">Amaterasu</option>
                        <option value="Raijin" style="color: black;">Raijin</option>
                        <option value="Fuuvin" style="color: black;">Fuuvin</option>
                        <option value="Tsukuyomi" style="color: black;">Tsukuyomi</option>
                        <option value="Susanoo" style="color: black;">Susanoo</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Salvar" class="btn btn-primary" form="herancaModalForm">
            </div>
        </div>
    </div>
</div>
@endsection