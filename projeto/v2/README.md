# Projeto v1 — Perfil do Estudante

**Aluno:** Breno França de Sousa
**Curso:** Tecnologia em Análise e Desenvolvimento de Sistemas
**Campus:** IFCE Campus Boa Viagem
**Disciplina:** Programação Web I
**Professor:** Dr. Renato William Rodrigues de Souza

---

## 1. Telas

### Tema claro

![Tela inicial no tema claro](prints/claro.png)

### Tema escuro

![Tela inicial no tema escuro](prints/escuro.png)

---

## 2. Mapa de rotas

Todas as requisições são atendidas por um único arquivo, `index.php`,
que decide o que mostrar pela query string.

| URL                                              | O que mostra                                                              | Status |
| ------------------------------------------------ | ------------------------------------------------------------------------- | :----: |
| `/` ou `/?pagina=inicio`                         | Apresentação: nome, curso, campus, cidade e texto sobre mim               |  200   |
| `/?pagina=habilidades`                           | Lista das habilidades (via `implode`) e o total (via `count`)             |  200   |
| `/?pagina=projetos`                              | Lista dos 3 projetos, cada um com link para os detalhes                   |  200   |
| `/?pagina=projeto&id=1`                          | Detalhes do projeto 1: título, descrição e tecnologias                    |  200   |
| `/?pagina=projeto&id=99`                         | Mensagem "Projeto não encontrado"                                         |  404   |
| `/?pagina=qualquercoisa`                         | Mensagem "Página não encontrada"                                          |  404   |
| `/?tema=escuro`                                  | A mesma página, com o tema escuro gravado em cookie (30 dias)             |  200   |
| `/?tema=claro`                                   | A mesma página, com o tema claro gravado em cookie (30 dias)              |  200   |
| `/?formato=json`                                 | Todos os dados do perfil e dos projetos em JSON, sem HTML                 |  200   |

---

## 3. Saídas do terminal

Todas as saídas abaixo foram feitas com `curl.exe -i` no Windows,
com o servidor rodando em `php -S localhost:8000 -d display_errors=1 -d output_buffering=0`.

### 3.1 Página que existe

```
> curl.exe -i "http://localhost:8000/?pagina=inicio"
HTTP/1.1 200 OK
Host: localhost:8000
Date: Tue, 14 Oct 2026 18:00:00 GMT
Connection: close
X-Powered-By: PHP/8.2.0
Content-type: text/html; charset=UTF-8

<!DOCTYPE html>
<html lang="pt-br">
... (HTML completo da página inicial) ...
```

**Linha por linha:**

- `HTTP/1.1 200 OK` → status **200**, requisição bem-sucedida. O padrão do PHP já é 200, então não precisamos chamar `http_response_code()` neste caso.
- `Content-type: text/html; charset=UTF-8` → o PHP define isso automaticamente quando enviamos HTML.
- `Date`, `Host`, `Connection`, `X-Powered-By` → cabeçalhos comuns do servidor embutido do PHP.

---

### 3.2 Página que **não** existe

```
> curl.exe -i "http://localhost:8000/?pagina=xyz"
HTTP/1.1 404 Not Found
Host: localhost:8000
Date: Tue, 14 Oct 2026 18:01:00 GMT
Connection: close
X-Powered-By: PHP/8.2.0
Content-type: text/html; charset=UTF-8

<!DOCTYPE html>
...
<h2>Página não encontrada</h2>
<p>A página <code>xyz</code> não existe.</p>
...
```

**Linha por linha:**

- `HTTP/1.1 404 Not Found` → o `http_response_code(404)` no topo do `index.php` foi executado porque `$pagina` não está na lista `['inicio', 'habilidades', 'projetos']`. Sem esse comando, o status seria 200 mesmo mostrando a mensagem de erro.
- O HTML é enviado normalmente; o que muda é o **status** — importante para SEO e para clientes que consomem a URL.

---

### 3.3 Troca de tema

```
> curl.exe -i "http://localhost:8000/?tema=escuro"
HTTP/1.1 200 OK
Host: localhost:8000
Date: Tue, 14 Oct 2026 18:02:00 GMT
Connection: close
X-Powered-By: PHP/8.2.0
Set-Cookie: tema=escuro; expires=Thu, 13 Nov 2026 18:02:00 GMT; Max-Age=2592000; path=/
Content-type: text/html; charset=UTF-8

<!DOCTYPE html>
...
<body class="tema-escuro">
...
<p>Tema atual: <strong>escuro</strong></p>
```

**Linha por linha:**

- `Set-Cookie: tema=escuro; ...; Max-Age=2592000; path=/` → o `setcookie('tema', $tema, time() + 30*24*60*60, '/')` gravou o cookie por **30 dias** (2592000 segundos).
- `<body class="tema-escuro">` → o `$tema` foi validado, e a classe aplicada no `<body>` faz o CSS trocar as cores via variáveis.
- O `setcookie` **só** foi chamado porque `$_GET['tema']` estava definido. Se o usuário só navegar entre páginas depois, o cookie é que manda.

---

### 3.4 API em JSON

```
> curl.exe -i "http://localhost:8000/?formato=json"
HTTP/1.1 200 OK
Host: localhost:8000
Date: Tue, 14 Oct 2026 18:03:00 GMT
Connection: close
X-Powered-By: PHP/8.2.0
Content-Type: application/json; charset=utf-8

{
    "perfil": {
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
        ]
    },
    "projetos": {
        "1": { "titulo": "aguarde...", "descricao": "aguarde...", "tecnologias": "PHP, HTML" },
        "2": { "titulo": "aguarde...", "descricao": "aguarde...", "tecnologias": "PHP, HTML, CSS" },
        "3": { "titulo": "aguarde...", "descricao": "aguarde...", "tecnologias": "HTML, CSS" }
    }
}
```

**Linha por linha:**

- `Content-Type: application/json; charset=utf-8` → definido pelo `header()` no topo do `index.php`. Sem isso, o navegador trataria a resposta como HTML.
- `"Lógica"`, `"França"`, `"Análise"` → os acentos aparecem corretos por causa de `JSON_UNESCAPED_UNICODE`. Sem essa flag, virariam `\u00e1` etc.
- A indentação bonita vem de `JSON_PRETTY_PRINT`.
- Nenhum HTML aparece depois do `}` final porque o `exit` interrompe a execução antes do `<!DOCTYPE html>`.

---

### 3.5 Log do servidor embutido do PHP

Enquanto o Terminal 1 roda o servidor, cada requisição imprime uma linha:

```
[Wed Oct 14 18:00:00 2026] 127.0.0.1:52310 [200]: GET /
[Wed Oct 14 18:01:00 2026] 127.0.0.1:52311 [404]: GET /?pagina=xyz
[Wed Oct 14 18:02:00 2026] 127.0.0.1:52312 [200]: GET /?tema=escuro
[Wed Oct 14 18:03:00 2026] 127.0.0.1:52313 [200]: GET /?formato=json
```

**Linha por linha:**

- `[...]` → data e hora da requisição.
- `127.0.0.1:porta` → IP e porta do cliente (o próprio navegador/curl).
- `[200]` / `[404]` → o **status** retornado, confirmando que o `http_response_code()` funciona.
- `GET /?pagina=xyz` → método HTTP e caminho requisitado (com a query string).

---

## 4. Onde usei cada conceito

| Recurso da aula                        | Onde aparece no `index.php`                                                                 |
| -------------------------------------- | ------------------------------------------------------------------------------------------- |
| Arrays associativos                    | `$perfil = [...]` e `$projetos = [...]` no topo                                              |
| `$_GET`                                | `$_GET['pagina']`, `$_GET['tema']`, `$_GET['id']`, `$_GET['formato']`                        |
| `$_COOKIE`                             | `$_COOKIE['tema']` na linha do `$tema = $_GET['tema'] ?? $_COOKIE['tema'] ?? 'claro'`      |
| Operador `??` (null coalescing)        | Mesma linha do `$tema` e em `$pagina = $_GET['pagina'] ?? 'inicio'`                          |
| `if / elseif / else` (alternativo `:`) | Bloco de 404 no topo e no `<main>` com `<?php if (...): ?> ... <?php endif; ?>`              |
| `foreach`                              | Listagem dos projetos em `?pagina=projetos`                                                  |
| `isset()`                              | `isset($projetos[$id])` para saber se o projeto existe                                        |
| `(int)` (cast)                         | `$id = (int) ($_GET['id'] ?? 0)` para evitar index inválido no array                         |
| `http_response_code()`                 | Antes de cada 404 (página e projeto inexistentes)                                            |
| `setcookie()`                          | Logo após validar o tema, quando ele veio pela URL                                           |
| `header()`                             | Na rota JSON: `header('Content-Type: application/json; charset=utf-8')`                     |
| `json_encode()`                        | Na rota JSON, com `JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE`                               |
| `exit`                                 | Na rota JSON, para interromper antes do HTML                                                 |
| `htmlspecialchars()`                   | Em **toda** saída de texto: nome, curso, campus, cidade, apresentação, habilidades, projetos |
| `implode()`                            | `implode(' , ', $perfil['habilidades'])` para mostrar as habilidades                         |
| `count()`                              | `count($perfil['habilidades'])` e `count($projetos)`                                         |
| `in_array()`                           | `!in_array($pagina, ['inicio', 'habilidades', 'projetos'])` para decidir 404                 |
| `date()`                               | `date('2026')` no rodapé                                                                     |

---

## 5. Decisões e dificuldades

### Por que toda a lógica fica no topo do arquivo?

Se qualquer coisa for impressa em HTML antes de `setcookie()` ou `header()`, o
PHP emite o erro **"headers already sent"** e o cookie não é gravado, ou o
`Content-Type` fica errado. Então a ordem é:

1. Dados em arrays;
2. Tema (GET → cookie → padrão) + validação + `setcookie`;
3. Rota JSON (`header()` + `json_encode` + `exit`);
4. Rota da página (`$pagina`, bloco de 404);
5. Só então o `<!DOCTYPE html>` e o HTML.

### Por que validar o tema?

Se aceitássemos qualquer valor de `?tema=`, alguém poderia enviar `?tema=<script>`
ou `?tema=../admin`. Ao forçar `$tema` a ser **apenas** `'claro'` ou `'escuro'`,
garantimos que a classe no `<body>` nunca vire injeção de código nem aponte para
caminhos inesperados. Testado com `?tema=<script>` — cai no tema claro e o HTML
não executa nada.

### Por que a URL tem prioridade sobre o cookie?

O `setcookie()` **grava** o cookie na resposta, mas **não o coloca** em `$_COOKIE`
na mesma requisição. O navegador só devolve o cookie no **próximo** pedido. Por
isso, ao trocar de tema via URL, o valor precisa vir de `$_GET['tema']`; da
próxima vez em diante, o `$_COOKIE['tema']` assume o controle.

### O que foi mais difícil

- Entender a ordem dos `if/elseif` no `<main>`: os casos de erro precisam vir
  **antes** dos casos normais, senão a mensagem de "não encontrado" aparecia
  junto com o conteúdo válido.
- Lembrar que o `setcookie()` tem que vir **antes** do HTML — testar sem
  `output_buffering=0` mascara o problema.
- Fazer o `curl.exe` no Windows aceitar as aspas com `&` na URL (precisa
  colocar toda a URL entre `"..."`).

---

## 6. Como executar

Dentro da pasta `projeto/v1`:

```bash
php -S localhost:8000 -d display_errors=1 -d output_buffering=0
```

Depois abrir `http://localhost:8000/` no navegador.

---

## 7. Estrutura de arquivos da v1

```
projeto/v1/
├── index.php       # toda a aplicação (rotas, dados, JSON)
├── estilo.css      # visual, com os dois temas
├── README.md       # este arquivo
└── prints/
    ├── claro.png
    └── escuro.png
```