<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ url(mix('css/login.css')) }}">
    @yield('style')

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/Hitodama.png" type="image/x-icon">

    <!-- Titulo -->
    <title>Hito-Ice</title>
</head>

<body>
    <main class="container">
        @yield('title')
        <form @yield('formHead')>
            @csrf
            <div class="input-field">
                <div class="errorMessage d-none error"></div>
                <input type="text" name="name" id="name" placeholder="Digite seu Usuário" required autofocus>
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Digite sua Senha" required>
                <div class="underline"></div>
            </div>

            <input type="submit" id="submit" value="@yield('formbutton')">
        </form>
        @yield('linkBack')
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script>
        $(function() {
            $('form[name="formLogin"]').submit(function(event) {
                event.preventDefault();
                
                $.ajax({
                    url: "{{ route('user.login.do') }}",
                    type: "post",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            window.location.href = "{{ route('sheet.index') }}";
                        } else {
                            $('.errorMessage').removeClass('d-none').html(response.message);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>