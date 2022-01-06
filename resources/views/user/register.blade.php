<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/login.css">
    <style>
        main h2::before {
            width: 30px;
        }
    </style>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/Hitodama.png" type="image/x-icon">

    <!-- Titulo -->
    <title>Hito-Ice</title>
</head>

<body>
    <main class="container">
        <h2>Registrar</h2>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="input-field">
                <div id="erro"></div>
                <input type="text" name="name" id="name" placeholder="Digite seu Usuário" required autofocus>
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Digite sua Senha" required>
                <div class="underline"></div>
            </div>

            <input type="submit" id="register" value="Registrar">
        </form>
        <a href="{{ route('user.index') }}">Fazer Login</a>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>