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

$projetos = [
    1 => [
        'titulo'      => 'aguarde...',
        'descricao'   => 'aguarde...',
        'tecnologias' => 'PHP, HTML',
    ],
    2 => [
        'titulo'      => 'aguarde...',
        'descricao'   => 'aguarde...',
        'tecnologias' => 'PHP, HTML, CSS',
    ],
    3 => [
        'titulo'      => 'aguarde...',
        'descricao'   => 'aguarde...',
        'tecnologias' => 'HTML, CSS',
    ],
];


$pagina = $_GET['pagina'] ?? 'inicio';


$projetoAtual = null;
$erro         = null; // null | 'projeto' | 'pagina'

if ($pagina == 'projeto') {
    $id = (int) ($_GET['id'] ?? 0);

    if (isset($projetos[$id])) {
        $projetoAtual = $projetos[$id];
    } else {
        http_response_code(404);
        $erro = 'projeto'; // "Projeto não encontrado"
    }
} elseif (!in_array($pagina, ['inicio', 'habilidades', 'projetos'])) {
    // Qualquer página que não seja uma das conhecidas → 404
    http_response_code(404);
    $erro = 'pagina'; // "Página não encontrada"
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Estudante | <?= htmlspecialchars($perfil['nome']) ?></title>
</head>
<body>

    <!-- 5. Cabeçalho e menu (mesmo em todas as páginas) -->
    <header>
        <h1><?= htmlspecialchars($perfil['nome']) ?></h1>
        <p>
            <?= htmlspecialchars($perfil['curso']) ?>
            &mdash;
            <?= htmlspecialchars($perfil['campus']) ?>
        </p>

        <nav>
            <a href="?pagina=inicio">Início</a> |
            <a href="?pagina=habilidades">Habilidades</a> |
            <a href="?pagina=projetos">Projetos</a>
        </nav>
    </header>

    <!-- 6. Conteúdo da página escolhida -->
    <main>

        <?php if ($erro === 'projeto'): ?>

            <h2>Projeto não encontrado</h2>
            <p>O projeto de id <code><?= htmlspecialchars((string) ($_GET['id'] ?? '')) ?></code> não existe.</p>
            <p><a href="?pagina=projetos">&larr; Voltar para a lista de projetos</a></p>

        <?php elseif ($erro === 'pagina'): ?>

            <h2>Página não encontrada</h2>
            <p>A página <code><?= htmlspecialchars($pagina) ?></code> não existe.</p>
            <p><a href="?pagina=inicio">&larr; Voltar para o início</a></p>

        <?php elseif ($pagina == 'inicio'): ?>

            <h2>Sobre mim</h2>
            <p><?= htmlspecialchars($perfil['apresentacao']) ?></p>

            <h2>Dados</h2>
            <ul>
                <li><strong>Curso:</strong>   <?= htmlspecialchars($perfil['curso']) ?></li>
                <li><strong>Campus:</strong>  <?= htmlspecialchars($perfil['campus']) ?></li>
                <li><strong>Cidade:</strong>  <?= htmlspecialchars($perfil['cidade']) ?></li>
            </ul>

        <?php elseif ($pagina == 'habilidades'): ?>

            <h2>Habilidades</h2>

            <!-- implode junta os itens em uma única string; count conta os itens -->
            <p><?= htmlspecialchars(implode(' , ', $perfil['habilidades'])) ?></p>

            <p>Total de habilidades: <?= count($perfil['habilidades']) ?></p>

        <?php elseif ($pagina == 'projetos'): ?>

            <h2>Projetos</h2>
            <p>Ao todo, <?= count($projetos) ?> projetos cadastrados.</p>

            <ul>
                <?php foreach ($projetos as $id => $projeto): ?>
                    <li>
                        <a href="?pagina=projeto&amp;id=<?= (int) $id ?>">
                            <?= htmlspecialchars($projeto['titulo']) ?>
                        </a>
                        &mdash;
                        <?= htmlspecialchars($projeto['tecnologias']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php elseif ($pagina == 'projeto' && $projetoAtual !== null): ?>

            <h2><?= htmlspecialchars($projetoAtual['titulo']) ?></h2>
            <p><?= htmlspecialchars($projetoAtual['descricao']) ?></p>
            <p><strong>Tecnologias:</strong> <?= htmlspecialchars($projetoAtual['tecnologias']) ?></p>
            <p><a href="?pagina=projetos">&larr; Voltar para a lista de projetos</a></p>

        <?php endif; ?>

    </main>

    <!-- 7. Rodapé -->
    <footer>
        <p>&copy; <?= date('2026') ?> <?= htmlspecialchars($perfil['nome']) ?></p>
    </footer>

</body>
</html>