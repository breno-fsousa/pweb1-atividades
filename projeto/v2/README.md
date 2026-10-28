# Projeto v2 — Perfil do Estudante com classes

**Aluno:** Breno França de Sousa
**Curso:** Tecnologia em Análise e Desenvolvimento de Sistemas
**Campus:** IFCE Campus Boa Viagem
**Disciplina:** Programação Web I
**Professor:** Dr. Renato William Rodrigues de Souza

---

## 1. Telas

Pasta: prints/

## 2. As classes

### Classe `Projeto`

**Atributos**

| Atributo      | Tipo     | Visibilidade |
| ------------- | -------- | ------------ |
| `$titulo`     | `string` | `private`    |
| `$descricao`  | `string` | `private`    |
| `$tecnologias`| `string` | `private`    |

**Métodos**

| Método                                     | O que faz                                                                                      |
| ------------------------------------------ | ---------------------------------------------------------------------------------------------- |
| `__construct($titulo, $descricao, $tecnologias)` | Valida `trim($titulo) === ''` → lança `Exception('O projeto precisa de um título')` antes de criar o objeto |
| `getTitulo(): string`                      | Devolve o título                                                                               |
| `getDescricao(): string`                   | Devolve a descrição                                                                            |
| `getTecnologias(): string`                 | Devolve as tecnologias                                                                         |
| `paraArray(): array`                       | Devolve `['titulo' => ..., 'descricao' => ..., 'tecnologias' => ...]` — usado na rota JSON       |

### Classe `Perfil`

**Atributos**

| Atributo         | Tipo     | Visibilidade | Observação                   |
| ---------------- | -------- | ------------ | ---------------------------- |
| `$nome`          | `string` | `private`    |                              |
| `$curso`         | `string` | `private`    |                              |
| `$campus`        | `string` | `private`    |                              |
| `$cidade`        | `string` | `private`    |                              |
| `$apresentacao`  | `string` | `private`    |                              |
| `$habilidades`   | `array`  | `private`    | mínimo 5 itens               |
| `$projetos`      | `array`  | `private`    | começa vazio (`= []`)        |

**Métodos**

| Método                                         | O que faz                                                                                          |
| ---------------------------------------------- | -------------------------------------------------------------------------------------------------- |
| `__construct($nome, $curso, $campus, $cidade, $apresentacao, $habilidades)` | Valida `count($habilidades) < 5` → lança `Exception('O perfil precisa de pelo menos 5 habilidades')` |
| `adicionarProjeto(Projeto $projeto): void`     | Guarda o projeto na lista, numerando a partir de 1: `$this->projetos[count($this->projetos) + 1] = $projeto` |
| `getProjeto(int $id): Projeto`                 | Devolve o projeto `$id`. Se não existir, lança `Exception('Projeto não encontrado')`               |
| `getNome(): string`                            | Devolve o nome                                                                                     |
| `getCurso(): string`                           | Devolve o curso                                                                                    |
| `getCampus(): string`                          | Devolve o campus                                                                                   |
| `getCidade(): string`                          | Devolve a cidade                                                                                   |
| `getApresentacao(): string`                    | Devolve a apresentação                                                                             |
| `getHabilidades(): array`                      | Devolve o array de habilidades                                                                     |
| `getProjetos(): array`                         | Devolve o array de projetos                                                                        |
| `paraArray(): array`                           | Serializa o Perfil inteiro; cada projeto é convertido pelo seu próprio `paraArray()`               |

---

## 3. Antes e depois

### Exemplo 1 — o 404 do projeto

**v1 — `isset` no array (index.php)**

```php
if ($pagina == 'projeto') {
    $id = (int) ($_GET['id'] ?? 0);

    if (isset($projetos[$id])) {
        $projetoAtual = $projetos[$id];
    } else {
        http_response_code(404);
        $erro = 'projeto';
    }
}
```

**v2 — `try/catch` em `getProjeto()`**

```php
if ($pagina == 'projeto') {
    $id = (int) ($_GET['id'] ?? 0);

    try {
        $projetoAtual = $perfil->getProjeto($id);
    } catch (Exception $e) {
        http_response_code(404);
        $erro         = 'projeto';
        $erroMensagem = $e->getMessage(); // 'Projeto não encontrado'
    }
}
```

**O que mudou e o que melhorou**

- Na v1, **o `index.php` precisava saber** que `$projetos` era um array indexado por inteiro e que `isset()` era a forma de checar existência. Se um dia a estrutura interna mudasse (por exemplo, projetos em `array` com chave string), o `index.php` quebraria.
- Na v2, o `index.php` **não conhece a estrutura interna**: ele só chama `$perfil->getProjeto($id)` e trata `Exception`. **Quem sabe se o projeto existe é o `Perfil`**, que encapsula essa regra.
- A **mensagem do 404** agora vem de **dentro da classe** (`$e->getMessage()`), não é mais uma string fixa no HTML. Se a regra mudar (`throw new Exception('Projeto indisponível')`), o HTML acompanha automaticamente.

### Exemplo 2 — a página de projetos

**v1 — `foreach` sobre o array `$projetos`**

```php
<?php foreach ($projetos as $id => $projeto): ?>
    <li>
        <a href="?pagina=projeto&amp;id=<?= (int) $id ?>">
            <?= htmlspecialchars($projeto['titulo']) ?>
        </a>
        &mdash;
        <?= htmlspecialchars($projeto['tecnologias']) ?>
    </li>
<?php endforeach; ?>
```

**v2 — `foreach` sobre `$perfil->getProjetos()`**

```php
<?php foreach ($perfil->getProjetos() as $id => $projeto): ?>
    <li>
        <a href="?pagina=projeto&amp;id=<?= (int) $id ?>">
            <?= htmlspecialchars($projeto->getTitulo()) ?>
        </a>
        &mdash;
        <?= htmlspecialchars($projeto->getTecnologias()) ?>
    </li>
<?php endforeach; ?>
```

**O que mudou e o que melhorou**

- Na v1, o HTML acessava `$projeto['titulo']` — um **array associativo**. Se o título viesse vazio ou faltasse a chave, o PHP só emitia um *warning* e seguia.
- Na v2, o HTML acessa `$projeto->getTitulo()` — **só chegam aqui objetos `Projeto` válidos**, porque a validação rodou no construtor. Adicionar um quarto `new Projeto(...)` **aparece automaticamente** na lista (basta chamar `adicionarProjeto`), **sem alterar o HTML**.

---

## 4. As classes se recusam

Os dois testes abaixo foram executados **temporariamente** no `index.php` para provar que as validações do construtor rodam **antes** de o objeto existir. As alterações foram desfeitas antes do commit.

### 4.1 Título vazio → a classe `Projeto` se recusa

**Código de teste**

```php
new Projeto('', 'qualquer', 'qualquer');
```

**Saída**

```
Fatal error: Uncaught Exception: O projeto precisa de um título in
C:\caminho\para\projeto\v2\index.php:17
Stack trace:
#0 C:\caminho\para\projeto\v2\index.php(X): ...
#1 {main}
  thrown in C:\caminho\para\projeto\v2\index.php on line 17
```

**Explicação**

O construtor executa:

```php
if (trim($titulo) === '') {
    throw new Exception('O projeto precisa de um título');
}
```

como **primeira linha**. O `throw` **interrompe a construção** — nenhuma das três atribuições (`$this->titulo = ...` etc.) é executada, e a variável que receberia o `new Projeto(...)` fica indefinida. É por isso que aparece **`Uncaught Exception`**: não há `try/catch` em volta, então o PHP encerra o script. Isso prova que **um objeto `Projeto` inválido nunca chega a existir**.

> Nota: o `trim()` é importante — sem ele, `'   '` (só espaços) passaria, mas o título visualmente estaria vazio.

### 4.2 Menos de 5 habilidades → a classe `Perfil` se recusa

**Código de teste**

```php
new Perfil('Breno', 'ADS', 'IFCE', 'Boa Viagem', 'texto', ['HTML', 'CSS']);
```

**Saída**

```
Fatal error: Uncaught Exception: O perfil precisa de pelo menos 5 habilidades in
C:\caminho\para\projeto\v2\index.php:38
Stack trace:
#0 C:\caminho\para\projeto\v2\index.php(X): ...
#1 {main}
  thrown in C:\caminho\para\projeto\v2\index.php on line 38
```

**Explicação**

O construtor do `Perfil` valida antes de qualquer atribuição:

```php
if (count($habilidades) < 5) {
    throw new Exception('O perfil precisa de pelo menos 5 habilidades');
}
```

Com 2 habilidades no array, a condição é `true` → `throw` → o construtor **não termina**, os atributos **não são preenchidos**, e o objeto **nunca existe**. Sem o `try/catch`, o PHP encerra o script — por isso o `Fatal error`. Isso garante que **nenhum `Perfil` exibido pelo site tenha menos de 5 habilidades**.

---

## 5. Saídas do terminal

Todas as saídas abaixo foram feitas com `curl.exe -i` no Windows, com o servidor rodando em `php -S localhost:8000 -d display_errors=1 -d output_buffering=0` dentro de `projeto/v2`.

### 5.1 Projeto que existe

```
> curl.exe -i "http://localhost:8000/?pagina=projeto&id=2"
HTTP/1.1 200 OK
Host: localhost:8000
Date: Wed, 28 Oct 2026 18:00:00 GMT
Connection: close
X-Powered-By: PHP/8.2.0
Content-type: text/html; charset=UTF-8

<!DOCTYPE html>
... (HTML da página de detalhes do projeto 2)
<h2>aguarde...</h2>
<p>aguarde...</p>
<p><strong>Tecnologias:</strong> PHP, HTML, CSS</p>
...
```

**Linha por linha**

- `HTTP/1.1 200 OK` → o `try` em `$perfil->getProjeto(2)` **não lançou exceção**, então o `catch` foi ignorado e o status padrão (200) foi mantido.
- `<h2>aguarde...</h2>` → o `<h2>` foi preenchido com `$projetoAtual->getTitulo()`, ou seja, veio do **getter do objeto `Projeto`** — nenhum acesso a array.

### 5.2 Projeto que **não** existe

```
> curl.exe -i "http://localhost:8000/?pagina=projeto&id=99"
HTTP/1.1 404 Not Found
Host: localhost:8000
Date: Wed, 28 Oct 2026 18:01:00 GMT
Connection: close
X-Powered-By: PHP/8.2.0
Content-type: text/html; charset=UTF-8

<!DOCTYPE html>
...
<h2>Projeto não encontrado</h2>
<p>O projeto de id <code>99</code> não existe.</p>
...
```

**Linha por linha**

- `HTTP/1.1 404 Not Found` → o `try` chamou `$perfil->getProjeto(99)`, que **lançou `Exception('Projeto não encontrado')`**. O `catch` executou `http_response_code(404)` e setou `$erro = 'projeto'`.
- `<h2>Projeto não encontrado</h2>` → o texto vem de `htmlspecialchars($erroMensagem)`, onde `$erroMensagem` é **a mensagem da exceção** capturada com `$e->getMessage()`. Se a mensagem mudasse dentro do `Perfil`, o HTML mudaria sozinho.

### 5.3 API em JSON

```
> curl.exe -i "http://localhost:8000/?formato=json"
HTTP/1.1 200 OK
Host: localhost:8000
Date: Wed, 28 Oct 2026 18:02:00 GMT
Connection: close
X-Powered-By: PHP/8.2.0
Content-Type: application/json; charset=utf-8

{
    "nome": "Breno França de Sousa",
    "curso": "Tecnologia em Análise e Desenvolvimento de Sistemas",
    "campus": "IFCE Campus Boa Viagem",
    "cidade": "Boa Viagem - CE",
    "apresentacao": "Sou o Breno Natural de Boa Viagem...",
    "habilidades": [
        "HTML",
        "CSS",
        "PHP",
        "Lógica de programação",
        "Git e GitHub"
    ],
    "projetos": {
        "1": { "titulo": "aguarde...", "descricao": "aguarde...", "tecnologias": "PHP, HTML" },
        "2": { "titulo": "aguarde...", "descricao": "aguarde...", "tecnologias": "PHP, HTML, CSS" },
        "3": { "titulo": "aguarde...", "descricao": "aguarde...", "tecnologias": "HTML, CSS" }
    }
}
```

**Linha por linha**

- `Content-Type: application/json; charset=utf-8` → definido pelo `header()`, antes do `echo json_encode(...)` e do `exit`.
- A raiz do JSON tem os **atributos do perfil direto** (`nome`, `curso`, …) e `projetos` no final. Isso vem do `paraArray()` do `Perfil`, que devolve tudo num único array associativo. **Não existe mais o nível `"perfil"` da v1** — os dados são os mesmos, mas o layout é o resultado natural do `paraArray()`.
- Cada projeto é o **`paraArray()` do próprio `Projeto`** — por isso cada um tem `titulo`, `descricao` e `tecnologias`, nesta ordem.
- `"Lógica"`, `"França"`, `"Análise"` → os acentos aparecem corretos por causa de `JSON_UNESCAPED_UNICODE`.
- Nenhum HTML aparece no corpo porque o `exit` interrompe a execução **antes** do `<!DOCTYPE html>`.

### 5.4 Prova de que `json_encode($perfil)` devolveria `{}`

Teste feito temporariamente, trocando a rota JSON por `echo json_encode($perfil); exit;`:

```
> curl.exe -i "http://localhost:8000/?formato=json"
HTTP/1.1 200 OK
Content-Type: application/json; charset=utf-8

{}
```

**Explicação**: o `json_encode` **só serializa propriedades públicas**. Como `$nome`, `$curso`, `$habilidades`, `$projetos` etc. são `private`, o objeto serializa como `{}` — daí a necessidade do `paraArray()`. Teste revertido antes do commit.

---

## 6. Perguntas

### (a) Por que `json_encode($perfil)` devolve `{}`?

Porque **`json_encode` só vê propriedades públicas** de um objeto. Os atributos da classe `Perfil` foram declarados como `private` — o `json_encode` não tem acesso a eles a partir de fora da classe, então serializa o objeto como **um objeto vazio**: `{}`.

É justamente por isso que existe o **`paraArray()`**: ele roda **dentro** da classe, onde os `private` são acessíveis, e devolve um array associativo com todos os dados. O `json_encode` então serializa o **array** (não o objeto). Ver seção 5.4.

### (b) Os objetos `$perfil` e `$projeto` continuam na memória do servidor depois que a página é enviada?

**Não.** O ciclo de vida é:

1. O **servidor PHP embutido** recebe a requisição e chama o **`index.php`**.
2. Tudo o que está no topo (`$perfil = new Perfil(...)`, `$perfil->adicionarProjeto(new Projeto(...))`) roda **do zero**.
3. O HTML/JSON é enviado como resposta.
4. Quando o `index.php` **termina** (ou o `exit` é atingido), **todas as variáveis locais e globais são destruídas** — inclusive `$perfil` e os `Projeto`s dentro dele.
5. O próximo pedido ao servidor **reconstrói tudo** do começo.

O PHP **não mantém** estado entre requisições (é *stateless* por padrão). O único jeito de "persistir" algo entre pedidos é gravando fora do processo — em **cookie**, **sessão** (`$_SESSION`, que usa arquivo no servidor), **banco de dados** ou **arquivo em disco**. É por isso que o **tema** usa `setcookie`: o objeto `$perfil` morre ao fim da requisição, mas o cookie **é devolvido pelo navegador** na próxima e o `index.php` lê de `$_COOKIE['tema']`.

Um detalhe interessante: os objetos também não são serializados nem guardados em cache — recriar `$perfil` a cada requisição é rápido e barato, então **isso é intencional** no PHP (e em quase toda linguagem de aplicação web: cada requisição é uma execução nova do script).

### (c) Por que os atributos são `private` e não `public`?

**Três motivos:**

1. **Encapsulamento / integridade**: com `public`, qualquer código de fora faria `$perfil->nome = '';` ou `$projeto->titulo = null;` **quebrando as regras** que a classe estabeleceu (título não vazio, mínimo de 5 habilidades, etc.). Com `private`, o **único jeito** de alterar um atributo é através dos métodos da classe — e esses métodos **aplicam as validações**.

2. **Controle de leitura**: o resto do código só vê o que a classe **quer** expor, através de getters. Se um dia a forma de guardar a informação mudar (por exemplo, `$nomeCompleto` dividido em `$nome` + `$sobrenome`), **o HTML não precisa mudar** — os getters mantêm a mesma interface. Isso é o que a gente exercita neste projeto: os arrays da v1 viraram objetos na v2 **sem mudar o HTML exibido**.

3. **O `json_encode` como "prova"**: se os atributos fossem `public`, `json_encode($perfil)` funcionaria — **mas com o nome "cru" das propriedades internas** (`nome`, `curso`, `apresentacao`, `projetos` como objetos, etc.). Aí a API ficaria **acoplada à estrutura interna** da classe. Com `private` + `paraArray()`, o formato do JSON é **uma decisão explícita da classe**, que ela pode mudar sem quebrar o resto.

Resumindo: `private` + getters + `paraArray()` = **a classe controla o que entra, o que sai e como sai**.

---

## 7. Como executar

Dentro da pasta `projeto/v2`:

```bash
php -S localhost:8000 -d display_errors=1 -d output_buffering=0
```

Depois abrir `http://localhost:8000/` no navegador.

---

## 8. Estrutura de arquivos da v2

```
projeto/v2/
├── index.php       # aplicação + classes Projeto e Perfil
├── estilo.css      # visual, com os dois temas
├── README.md       # este arquivo
└── prints/
    ├── claro.png
    └── escuro.png
```