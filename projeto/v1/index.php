<?php

$perfil = [
    'nome'         => 'Breno França de Sousa',
    'curso'        => 'Tecnologia em Análise e Desenvolvimento de Sistemas',
    'campus'       => 'IFCE Campus Boa Viagem',
    'cidade'       => 'Boa Viagem - CE',
    'apresentacao' => 'Sou o Breno Natural de Boa Viagem e atualmente sou estudante do IFCE, '
                    . 'escolhi este curso pois já estava na área antes mesmo de começar e resolvir ingressar em ADS.',
    'habilidades'  => [
        'HTML',
        'CSS',
        'PHP',
        'Lógica de programação',
        'Git e GitHub',
    ],
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Estudante | <?= htmlspecialchars($perfil['nome']) ?></title>
</head>
<body>

    <!-- 5. Cabeçalho (nome e curso) -->
    <header>
        <h1><?= htmlspecialchars($perfil['nome']) ?></h1>
        <p>
            <?= htmlspecialchars($perfil['curso']) ?>
            &mdash;
            <?= htmlspecialchars($perfil['campus']) ?>
        </p>
    </header>

    <!-- 6. Conteúdo da página inicial -->
    <main>
        <h2>Sobre mim</h2>
        <p><?= htmlspecialchars($perfil['apresentacao']) ?></p>

        <h2>Dados</h2>
        <ul>
            <li><strong>Curso:</strong>   <?= htmlspecialchars($perfil['curso']) ?></li>
            <li><strong>Campus:</strong>  <?= htmlspecialchars($perfil['campus']) ?></li>
            <li><strong>Cidade:</strong>  <?= htmlspecialchars($perfil['cidade']) ?></li>
        </ul>
    </main>

    <!-- 7. Rodapé -->
    <footer>
        <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($perfil['nome']) ?></p>
    </footer>

</body>
</html>