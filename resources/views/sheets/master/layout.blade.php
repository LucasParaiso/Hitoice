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
    <link rel="stylesheet" href="{{ url(mix('css/bootstrap.css')) }}">

    <!-- CSS -->
    @yield('css')

    <!-- Title -->
    <title>Hito-Ice</title>
</head>

<body class='text-center'>
    <nav class="navbar bg-none">
        <div class="container-fluid">
            <p class="navbar-brand">Hito-Ice</p>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
                <li class="nav-item"><a class="nav-link" href="{{ route('/') }}">Lista de Personagens</a></li>
                @if (Auth::user()->role_as == 'admin')
                <li class="nav-item"><a class="nav-link" href="{{ route('yokai.index') }}">Lista de Yokais</a></li>
                @endif
                </ul>
                <div>
                    @yield('sheetCreate')
                    <a href="{{ route('user.logout') }}" class="btn btn-danger me-1">Sair</a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    @yield('modal')

    <footer class="my-5">
        &copy; Hito-Ice
    </footer>


    <script src="{{ url(mix('js/bootstrap.js')) }}"></script>
    <script src="{{ url(mix('js/jquery.js')) }}"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    @yield('scripts')
</body>

</html>