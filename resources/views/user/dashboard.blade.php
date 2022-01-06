<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/Hitodama.png" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/dashboard.css">

    <!-- Title -->
    <title>Hito-Ice</title>
</head>

<body class='text-center'>
    <nav class="mb-5 navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <img src="/img/Hitodama.png" alt="logo_hitoice" id="logo" class="d-inline-block align-text-top">
                Hito-Ice
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"">
                <li class=" nav-item">
                    <a class="nav-link" href="">Lista de Personagens</a>
                    </li>
                </ul>
                <div>
                    <a href="{{ route('user.logout') }}" class="btn btn-primary">Sair</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 p-3 m-3 justify-content-center fundo">
        </div>
    </div>

    <footer class="my-5 mb-0">
        &copy; Hito-Ice
    </footer>


    <!-- NOVO PERSONAGEM MODAL -->
    <div class="modal fade" id="novoPersonagemModal" tabindex="-1" aria-labelledby="novoPersonagemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="novoPersonagemModalLabel">Novo Personagem</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <form method="POST" id="personagemModalForm">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>