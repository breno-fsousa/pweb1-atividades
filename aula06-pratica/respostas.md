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
PS C:\Users\breno\Documents\pweb1-atividades\aula06-pratica\laravel> curl.exe -i http://127.0.0.1:8000/perfil-json                   
HTTP/1.1 200 OK
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.4.25
Cache-Control: no-cache, private
Date: Thu, 26 Nov 2026 02:55:55 GMT
Content-Type: application/json
Set-Cookie: XSRF-TOKEN=eyJpdiI6Ijg1OWo5c1VwOTkzZ2R2NHBQRmp5QkE9PSIsInZhbHVlIjoiY04yU0VYR3A3SWR0Vm9nSnNoUHBHd0lBTzRBaVZMT0xhUmY2WDA4RDFoVmdMV0xRUEtxdFZjQlFmMFRLcmlvVGM5WWdpNUk2b2R4TXZXSWU0VlZ1eWFVY0laaHlCdkhZaTd3QnQ4N1pxYm5hT3lTME9zNU5CVFNWZW8vMkdzc2EiLCJtYWMiOiIyODhkZDMwNmUwMWJkYWMxMWZjNzJiZDhkODcxNTg3YWY5NWI5NjA3Nzc4MWNkYmYxODRhOGEyZGNiOWUwNDkwIiwidGFnIjoiIn0%3D; expires=Thu, 26 Nov 2026 04:55:55 GMT; Max-Age=7200; path=/; samesite=lax
Set-Cookie: laravel-session=eyJpdiI6Ikdic05DUGpsbU4weFNneE9idnBiMWc9PSIsInZhbHVlIjoiRTlyNW9xZ2M5MnQ2VEVZVVpYK0EyT1UzRHB0N0lwamdVbzA4eVFUcUJ6cS9vMXNlMGRBUU5WTDl2RDJ2TUwwYUhnYW8relEraDhGZjQyNWVYN0FTNWY1bFZ5dmJVS1hvTFBQM203a3FvWjZmbFRrdVRNRTR6bjI5SXllOFRWMlYiLCJtYWMiOiJlMGFhMWZmNmE5MmRhNWZmNDRlZTc2YThjYTUyYjM0ODgwODJlY2JlM2NjYTJhZjU3ODVmNGIzN2UxN2FjYWZlIiwidGFnIjoiIn0%3D; expires=Thu, 26 Nov 2026 04:55:55 GMT; Max-Age=7200; path=/; httponly; samesite=lax

{"nome":"Breno Fran\u00e7a de Sousa","semestre":2,"media":8.5,"bolsista":false,"disciplinas":["Programa\u00e7\u00e3o Web","Banco de Dados","Ci\u00eancia de Dados"],"endereco":{"cidade":"Boa Viagem","uf":"CE"}}
PS C:\Users\breno\Documents\pweb1-atividades\aula06-pratica\laravel> curl.exe -i http://127.0.0.1:8000/perfil-criado
HTTP/1.1 201 Created
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.4.25
Cache-Control: no-cache, private
Date: Thu, 26 Nov 2026 02:57:47 GMT
Content-Type: application/json
Set-Cookie: XSRF-TOKEN=eyJpdiI6InpnSTJlSmtSV1l0eVJocU8zaDdKTUE9PSIsInZhbHVlIjoialdkemJNV2JLTS9OZzZVOEc3SU9TS1JQVVZLcDFFOGNIWWpKeXdZdUd1NGFQbHpwUFBTNXNVUnpzdUozY3k4VzhhK21sNE5jdVBiWWNWZUEwSUZ1YUJrT3Y0ZmZtMG9DbFNtRzZtSDhUQ3h6YXNMRFF3MXhEUkg4VjUva1ZZMDAiLCJtYWMiOiJiNTY5MmU4MTAxNjUxZmQ0MzA2YmJlZTg1MDJlY2QyNjQ0NTIyNzY1NjhlY2ZjMWIwYmE5OThiYTA1YWQwNDZhIiwidGFnIjoiIn0%3D; expires=Thu, 26 Nov 2026 04:57:47 GMT; Max-Age=7200; path=/; samesite=lax
Set-Cookie: laravel-session=eyJpdiI6ImtpRkZFNFYxVVhSQ0FXMHRNaFNqT3c9PSIsInZhbHVlIjoiamlZYlVPWXVnaHFwdDRlaUhYWWR6ejZualdVcms3N21hdDRhaEttSXZMVVNWQm8vK250NFFpSW9Oc2Q0MGh6bzBZSGFGaWlibXllOFQ0Z2tMMXY1NEtqUDhZR1VGMU1xVzVpYWRPUm5NVEFqQm4xNGpmM2F4dGF1aThNcnAxZ2YiLCJtYWMiOiI2MzNjM2FjMzNmZTFiOTI4MjMyYjBlNjE0N2M3MGRjOGI3YWVmMDczN2MxZDdhNmQ2M2I5NDQ0ZDlhYmY2MmI1IiwidGFnIjoiIn0%3D; expires=Thu, 26 Nov 2026 04:57:47 GMT; Max-Age=7200; path=/; httponly; samesite=lax

{"nome":"Breno Fran\u00e7a de Sousa","semestre":2,"media":8.5,"bolsista":false,"disciplinas":["Programa\u00e7\u00e3o Web","Banco de Dados","Ci\u00eancia de Dados"],"endereco":{"cidade":"Boa Viagem","uf":"CE"}}
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) Na primeira rota (/perfil-json), a primeira linha foi:
HTTP/1.1 200 OK
Na segunda rota (/perfil-criado), a primeira linha foi:
HTTP/1.1 201 Created
A diferença está no código de status HTTP. O código 200 OK indica que a requisição foi realizada com sucesso. Já o código 201 Created indica que um recurso foi criado com sucesso.
As duas rotas retornaram os mesmos dados em formato JSON, mas utilizaram códigos de status diferentes.

b) O valor booleano do PHP (false) apareceu no JSON como false, mantendo o mesmo tipo de dado.
O array de disciplinas apareceu utilizando colchetes [], porque é um array numérico, ou seja, uma lista de valores.
Já o endereço apareceu utilizando chaves {}, porque é um array associativo, que possui pares de chave e valor, como cidade e uf.

c) Se a nota fosse 8.0, ela poderia aparecer no JSON como 8, dependendo de como o valor fosse representado pelo PHP.
Isso acontece porque o JSON não diferencia números inteiros de números decimais de forma tão rígida quanto os tipos do PHP. Ambos são representados como números.


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

