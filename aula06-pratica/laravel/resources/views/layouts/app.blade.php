
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
</head>
<body>

    <header>
        <h1>Feira Digital</h1>
        <hr>
    </header>

    <main>
        @yield('conteudo')
    </main>

    <footer>
        <hr>
        <p>Projeto desenvolvido em Laravel - ADS</p>
    </footer>

</body>
</html>
