<?php
// ------------------------------------------------------------
// 1. Classes
// ------------------------------------------------------------
class Projeto
{
    private string $titulo;
    private string $descricao;
    private string $tecnologias;

    public function __construct(string $titulo, string $descricao, string $tecnologias)
    {
        // R2: título vazio lança exceção ANTES do objeto existir
        if (trim($titulo) === '') {
            throw new Exception('O projeto precisa de um título');
        }

        $this->titulo      = $titulo;
        $this->descricao   = $descricao;
        $this->tecnologias = $tecnologias;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getTecnologias(): string
    {
        return $this->tecnologias;
    }

    public function paraArray(): array
    {
        return [
            'titulo'      => $this->titulo,
            'descricao'   => $this->descricao,
            'tecnologias' => $this->tecnologias,
        ];
    }
}

class Perfil
{
    private string $nome;
    private string $curso;
    private string $campus;
    private string $cidade;
    private string $apresentacao;
    private array  $habilidades;
    private array  $projetos = []; // começa vazio; projetos vêm de adicionarProjeto()

    public function __construct(
        string $nome,
        string $curso,
        string $campus,
        string $cidade,
        string $apresentacao,
        array $habilidades
    ) {
        // R3: menos de 5 habilidades lança exceção ANTES do objeto existir
        if (count($habilidades) < 5) {
            throw new Exception('O perfil precisa de pelo menos 5 habilidades');
        }

        $this->nome         = $nome;
        $this->curso        = $curso;
        $this->campus       = $campus;
        $this->cidade       = $cidade;
        $this->apresentacao = $apresentacao;
        $this->habilidades  = $habilidades;
    }

    // Adiciona um projeto no final, numerando a partir de 1.
    // Aceita qualquer objeto que seja um Projeto (inclusive subclasses).
    public function adicionarProjeto(Projeto $projeto): void
    {
        $this->projetos[count($this->projetos) + 1] = $projeto;
    }

    // Devolve o projeto com o $id informado; se não existir, lança exceção.
    // Quem chama é obrigado a tratar (try/catch) — é o que o R5 pede.
    public function getProjeto(int $id): Projeto
    {
        if (!isset($this->projetos[$id])) {
            throw new Exception('Projeto não encontrado');
        }

        return $this->projetos[$id];
    }

    // Getters — o HTML só acessa os dados por aqui (R6)
    public function getNome(): string         { return $this->nome; }
    public function getCurso(): string        { return $this->curso; }
    public function getCampus(): string       { return $this->campus; }
    public function getCidade(): string       { return $this->cidade; }
    public function getApresentacao(): string { return $this->apresentacao; }
    public function getHabilidades(): array   { return $this->habilidades; }
    public function getProjetos(): array      { return $this->projetos; }

    // Serializa o Perfil inteiro, convertendo cada projeto pelo seu próprio paraArray().
    // Usado na rota JSON (R7).
    public function paraArray(): array
    {
        $projetosArray = [];
        foreach ($this->projetos as $id => $projeto) {
            $projetosArray[$id] = $projeto->paraArray();
        }

        return [
            'nome'         => $this->nome,
            'curso'        => $this->curso,
            'campus'       => $this->campus,
            'cidade'       => $this->cidade,
            'apresentacao' => $this->apresentacao,
            'habilidades'  => $this->habilidades,
            'projetos'     => $projetosArray,
        ];
    }
}

// ------------------------------------------------------------
// 2. Arrays da v1 (ainda no lugar — saem no próximo commit)
// ------------------------------------------------------------
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

// ------------------------------------------------------------
// 3. Tema claro ou escuro
// ------------------------------------------------------------
$tema = $_GET['tema'] ?? $_COOKIE['tema'] ?? 'claro';

if ($tema !== 'claro' && $tema !== 'escuro') {
    $tema = 'claro';
}

if (isset($_GET['tema'])) {
    setcookie('tema', $tema, time() + (30 * 24 * 60 * 60), '/');
}

// ------------------------------------------------------------
// 4. Rota JSON (?formato=json) — ainda usa os arrays da v1
// ------------------------------------------------------------
if (isset($_GET['formato']) && $_GET['formato'] === 'json') {
    header('Content-Type: application/json; charset=utf-8');

    $dados = [
        'perfil'   => $perfil,
        'projetos' => $projetos,
    ];

    echo json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// ------------------------------------------------------------
// 5. Qual página mostrar
// ------------------------------------------------------------
$pagina = $_GET['pagina'] ?? 'inicio';

$projetoAtual = null;
$erro         = null; // null | 'projeto' | 'pagina'

if ($pagina == 'projeto') {
    $id = (int) ($_GET['id'] ?? 0);

    if (isset($projetos[$id])) {
        $projetoAtual = $projetos[$id];
    } else {
        http_response_code(404);
        $erro = 'projeto';
    }
} elseif (!in_array($pagina, ['inicio', 'habilidades', 'projetos'])) {
    http_response_code(404);
    $erro = 'pagina';
}

$temaOposto   = ($tema === 'claro') ? 'escuro' : 'claro';
$rotuloTrocar = ($tema === 'claro') ? '🌙 Tema escuro' : '☀️ Tema claro';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Estudante | <?= htmlspecialchars($perfil['nome']) ?></title>

    <link rel="stylesheet" href="estilo.css">
</head>
<body class="tema-<?= htmlspecialchars($tema) ?>">

    <header>
        <h1><?= htmlspecialchars($perfil['nome']) ?></h1>
        <p>
            <?= htmlspecialchars($perfil['curso']) ?>
            &mdash;
            <?= htmlspecialchars($perfil['campus']) ?>
        </p>

        <nav>
            <a href="?pagina=inicio&amp;tema=<?= $tema ?>">Início</a> |
            <a href="?pagina=habilidades&amp;tema=<?= $tema ?>">Habilidades</a> |
            <a href="?pagina=projetos&amp;tema=<?= $tema ?>">Projetos</a> |
            <a href="?pagina=<?= htmlspecialchars($pagina) ?>&amp;tema=<?= $temaOposto ?>">
                <?= $rotuloTrocar ?>
            </a>
        </nav>
    </header>

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

    <footer>
        <p>Tema atual: <strong><?= htmlspecialchars($tema) ?></strong></p>
        <p><a href="?formato=json">Ver versão JSON</a></p>
        <p>&copy; <?= date('2026') ?> <?= htmlspecialchars($perfil['nome']) ?></p>
    </footer>

</body>
</html>