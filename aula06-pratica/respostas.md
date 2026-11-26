# Aula 06: Laravel na prática

Nome: _(seu nome)_

Projeto: `aula06-pratica` (Feira Digital)

## A01: Meu cartão de visita

### Saídas
<!-- curl.exe -i de /meu-nome e de /cartao -->
```
PS C:\Users\breno\Documents\pweb1-atividades\aula06-pratica\laravel> curl.exe -i http://127.0.0.1:8000/meu-nome
HTTP/1.1 200 OK
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.4.25
Content-Type: text/html; charset=utf-8
Cache-Control: no-cache, private
Date: Thu, 26 Nov 2026 02:15:15 GMT
Set-Cookie: XSRF-TOKEN=eyJpdiI6IlJXU3dKYnptMStiV3lLZitNclpGNVE9PSIsInZhbHVlIjoiVWM5b1haLzRoQVM0N3JsYkptWEw2TUhFMmhyblJkSVE3cUh5SEU5S01oWmNUVlpGN2RWdkpPcHZNdGhMSzlWckdmb0hpRFVOSS9tUXg2YVZBYlBBNGxyRDc2QXBrU252ODJEYTNwUGpmRnc5cjFyNXFaZXZpejFiRFVsTXlHd1QiLCJtYWMiOiI3MTFiMWNhMmQ2ZDU4NDNmNTk2N2Y3ZjIwODE1MjA2ZGIyMjk4YTExNDgxZjA1NTdhNTJkYThhMzRmMTZhNmFlIiwidGFnIjoiIn0%3D; expires=Thu, 26 Nov 2026 04:15:15 GMT; Max-Age=7200; path=/; samesite=lax
Set-Cookie: laravel-session=eyJpdiI6ImlaSXBzUXVUK2phTzZCSDdHNDBMbUE9PSIsInZhbHVlIjoialJTbEVBUDhkeitzT1VNOHBTZDBHWFNvOXh6ZVZLR3pnd0ZhOUtXckJ3eGRlRytsMTRwVW1zRS84QlFPbHliTzdSazZ0b1RWSU5ybmU0WVFMYXhuLzVIbWhHdnhQSXpPVW54OFhiNHo2UUFtMTlkZmdmVmo5TzdPYTV6K2NSSHkiLCJtYWMiOiI3OWIwYTZiNWRhNTIxMjNlMmI1OWQyOWM3NmZiYzUyMTliODkyZDg3M2E0YzI3MTAxYzdmNTczMTRlNmFhNDIxIiwidGFnIjoiIn0%3D; expires=Thu, 26 Nov 2026 04:15:15 GMT; Max-Age=7200; path=/; httponly; samesite=lax

Meu nome é Breno França de Sousa e estudo ADS no IFCE.
PS C:\Users\breno\Documents\pweb1-atividades\aula06-pratica\laravel> curl.exe -i http://127.0.0.1:8000/cartao
HTTP/1.1 200 OK
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.4.25
Content-Type: text/html; charset=utf-8
Cache-Control: no-cache, private
Date: Thu, 26 Nov 2026 02:18:53 GMT
Set-Cookie: XSRF-TOKEN=eyJpdiI6ImhRUzVyelZOcjIrK01MZUNrdjZneWc9PSIsInZhbHVlIjoiSGIxNGNQQzN5ejFMK0lsSEUwMU9QMjlwQXVsNldTOTlXNFE3c3pKM3J5TmlmWUdJdTBCRHFULzNZMHlPTmIxMnhEWXlmS3ErczVURjB3UWxGTzFqVUxuMjBON1dxYWlZcFRITHd2SklPMThaN0MxOUpkemRUQk42dWdyZmhUOWYiLCJtYWMiOiJhNzI4MjMzNDgzNDUyNDg1YWI1YmQ4MGFlN2NmOWM5ZDY1YjRmMDBkMTc2NDRjOGU0NjM3MDQzN2EwMDBmYzQyIiwidGFnIjoiIn0%3D; expires=Thu, 26 Nov 2026 04:18:53 GMT; Max-Age=7200; path=/; samesite=lax
Set-Cookie: laravel-session=eyJpdiI6Im1sWDIrQXRwUmoyQ1lwa0o4b3VEeUE9PSIsInZhbHVlIjoiQ0JUWHRvZVphemM1a05GaG8rQnZIaTNNRkNBODM5NkNJdGFoRy9OQ21veHVLMXJHV25xQkN2YWZXM094eG90aDZxZHRCdDFGN3ZKYmFzWGxON0liSFlQcHJ5OHpRSVpxYWJoMWZVek5HWVUweVBOOUhZeEp6Q2NpY3YxaXhnWE4iLCJtYWMiOiI0YTk1NDI2Y2VkMmJiZGM0YTk0ZjMwNzYxODIyMDRhNmFhYThlZGU4ZTkxN2M4ZDA0YmZhZWYwMGNmNjM5ZmY5IiwidGFnIjoiIn0%3D; expires=Thu, 26 Nov 2026 04:18:53 GMT; Max-Age=7200; path=/; httponly; samesite=lax


        <h2>Breno França de Sousa</h2>

        <p>Estudante do 2º semestre de ADS no IFCE.</p>

        <ul>
            <li>Tecnologia</li>
            <li>Programação</li>
            <li>Jogos</li>
        </ul>
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) Content-Type: text/html; charset=utf-8
O Content-Type é o mesmo porque o Laravel, ao retornar uma string diretamente em uma rota, utiliza por padrão o tipo de conteúdo text/html, independentemente de o texto possuir ou não tags HTML.

b) O endereço /meu-nome/, com uma barra no final, foi reconhecido pelo Laravel e retornou o conteúdo normalmente.
Já o endereço /Meu-Nome, com letras maiúsculas, retornou erro 404 (Not Found), porque o Laravel diferencia letras maiúsculas de minúsculas nas rotas.
Portanto, os endereços das rotas diferenciam maiúsculas de minúsculas, mas podem aceitar uma barra no final.

c) O caminho da requisição acontece da seguinte forma:
1. O navegador ou cliente envia uma requisição GET para /cartao.
2. O Laravel verifica o arquivo routes/web.php e identifica a rota correspondente.
3. A função anônima (closure) dessa rota é executada.
4. A função retorna diretamente o código HTML.
5. O Laravel envia a resposta ao navegador, que apresenta o cartão de visita.
Partes do MVC que ficaram de fora:
- Model: não foi utilizado, pois não houve acesso a banco de dados ou manipulação de informações.
- View: não foi utilizada, pois o HTML foi escrito diretamente dentro da rota, sem um arquivo Blade.
- Controller: não foi utilizado, pois a lógica ficou dentro da própria função da rota.
Nesse exercício, a resposta foi construída diretamente na rota, sem utilizar a estrutura completa do padrão MVC.


## A02: Meu perfil em JSON

### Saídas
<!-- curl.exe -i de /perfil-json e de /perfil-criado -->
```
(cole aqui a saída do terminal)
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) _(responda aqui)_
b) _(responda aqui)_
c) _(responda aqui)_


## A03: Tabuada e idade

### Saídas
<!-- curl.exe -i de /tabuada/7, /tabuada/sete, /idade/2005 e /boas-vindas-turma -->
```
(cole aqui a saída do terminal)
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) _(responda aqui)_
b) _(responda aqui)_
c) _(responda aqui)_


## A04: Status e redirecionamentos

### Saídas
<!-- curl.exe -i de /admin, /em-breve, /loja e /produtos-antigos -->
```
(cole aqui a saída do terminal)
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) _(responda aqui)_
b) _(responda aqui)_
c) _(responda aqui)_
d) _(responda aqui)_


## A05: O cardápio da feira

### Saídas
<!-- curl.exe -i de /cardapio e a linha do Ctrl+U com a Panelada -->
```
(cole aqui a saída do terminal)
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) _(responda aqui)_
b) _(responda aqui)_
c) _(responda aqui)_


## A06: Menu completo e rotas com nome

### Saídas
<!-- php artisan route:list --except-vendor e a mensagem de erro do item 4 -->
```
(cole aqui a saída do terminal)
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) _(responda aqui)_
b) _(responda aqui)_
c) _(responda aqui)_


## A07: Do closure ao controller

### Saídas
<!-- trecho da rota antes e depois, curl.exe -i de antes e de depois, mensagem de erro sem o use -->
```
(cole aqui a saída do terminal)
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) _(responda aqui)_
b) _(responda aqui)_
c) _(responda aqui)_
d) _(responda aqui)_


## A08: Estoque e categorias

### Saídas
<!-- curl.exe -i de /produtos/categoria/doces, /produtos/categoria/frutas e /produtos/categoria/123 -->
```
(cole aqui a saída do terminal)
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) _(responda aqui)_
b) _(responda aqui)_
c) _(responda aqui)_


## A09: Um produto em JSON

### Saídas
<!-- curl.exe -i de um produto que existe, de um que não existe e de /produtos/abc/json -->
```
(cole aqui a saída do terminal)
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) _(responda aqui)_
b) _(responda aqui)_
c) _(responda aqui)_


## A10: Inscrição de produtores

### Saídas
<!-- mensagens de erro dos testes (a) e (b), mensagem de sucesso do teste (c), curl.exe -i do teste (d) -->
```
(cole aqui a saída do terminal)
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) _(responda aqui)_
b) _(responda aqui)_
c) _(responda aqui)_
d) _(responda aqui)_

