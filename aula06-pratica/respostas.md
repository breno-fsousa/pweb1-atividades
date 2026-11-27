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
PS C:\Users\breno\Documents\pweb1-atividades\aula06-pratica\laravel> curl.exe -i http://127.0.0.1:8000/tabuada/7
HTTP/1.1 200 OK
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.4.25
Content-Type: text/html; charset=utf-8
Cache-Control: no-cache, private
Date: Fri, 27 Nov 2026 00:36:01 GMT
Set-Cookie: XSRF-TOKEN=eyJpdiI6InhIRng0YjJqODdyOTdHL1pmQXNERHc9PSIsInZhbHVlIjoiVGZLNWYrVzJ0a1lZb3VZOXkyRk0rblhzenVKanRIQVlRa3lvbjU3RGRTZGpPVkJ3SDJwTlVacW5zQlN0aUJadkUrNUk3aDk0dkVQbmM0VGpqVFdreXMxcEVOT3Vyd3o1RllJdW1QWkhjTjcrdUFPditWYWo0LzZHOVVFZFBOWXMiLCJtYWMiOiI1YzY0OTU1NjYwODUxNDQzNmE5OTZiMzYwNTNmNDRlZjA0MGNjZGM3ODgwYTFhZDFhNmYyMjcxMWEzMjUzZjViIiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 02:36:01 GMT; Max-Age=7200; path=/; samesite=lax
Set-Cookie: laravel-session=eyJpdiI6InB5RFpGMXZGYjc1aVdOL2F1TjJvcFE9PSIsInZhbHVlIjoibm9vQVUwTWZNcWV4ekFyZnJnM2lNTnU0NmllTmRxYWgyQWtuZDczYm0yZUg1S3l6d093dWhPU3N3Q01HMTNjRGwwRWhCczNvaCtLZXZEQ2N0aHdTRUhRdHBJK3ZReEQvR2l5NEZIYlozb01aWS83VnhydGhJODgyeGEvTzFwZUsiLCJtYWMiOiI2OTE4NWQ3YmQzZDE3OGM2MWY3OWJjZDdlODQxZGYyMWI2YjhmYWI0NmIyNGY1NmQxZDdjNzM5NzE4M2Y3ZWFiIiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 02:36:01 GMT; Max-Age=7200; path=/; httponly; samesite=lax

7 x 1 = 7<br>7 x 2 = 14<br>7 x 3 = 21<br>7 x 4 = 28<br>7 x 5 = 35<br>7 x 6 = 42<br>7 x 7 = 49<br>7 x 8 = 56<br>7 x 9 = 63<br>7 x 10 = 70<br>
PS C:\Users\breno\Documents\pweb1-atividades\aula06-pratica\laravel> curl.exe -i http://127.0.0.1:8000/tabuada/sete
HTTP/1.1 404 Not Found
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.4.25
Cache-Control: no-cache, private
date: Fri, 27 Nov 2026 00:36:25 GMT
Content-Type: text/html; charset=utf-8

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Not Found</title>

        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}code{font-family:monospace,monospace;font-size:1em}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}code{font-family:Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-gray-400{--border-opacity:1;border-color:#cbd5e0;border-color:rgba(203,213,224,var(--border-opacity))}.border-t{border-top-width:1px}.border-r{border-right-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-xl{max-width:36rem}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-4{padding-left:1rem;padding-right:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.uppercase{text-transform:uppercase}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.tracking-wider{letter-spacing:.05em}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@-webkit-keyframes spin{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}@keyframes spin{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}@-webkit-keyframes ping{0%{transform:scale(1);opacity:1}75%,to{transform:scale(2);opacity:0}}@keyframes ping{0%{transform:scale(1);opacity:1}75%,to{transform:scale(2);opacity:0}}@-webkit-keyframes pulse{0%,to{opacity:1}50%{opacity:.5}}@keyframes pulse{0%,to{opacity:1}50%{opacity:.5}}@-webkit-keyframes bounce{0%,to{transform:translateY(-25%);-webkit-animation-timing-function:cubic-bezier(.8,0,1,1);animation-timing-function:cubic-bezier(.8,0,1,1)}50%{transform:translateY(0);-webkit-animation-timing-function:cubic-bezier(0,0,.2,1);animation-timing-function:cubic-bezier(0,0,.2,1)}}@keyframes bounce{0%,to{transform:translateY(-25%);-webkit-animation-timing-function:cubic-bezier(.8,0,1,1);animation-timing-function:cubic-bezier(.8,0,1,1)}50%{transform:translateY(0);-webkit-animation-timing-function:cubic-bezier(0,0,.2,1);animation-timing-function:cubic-bezier(0,0,.2,1)}}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-300 { --text-opacity: 1; color: #e2e8f0; color: rgba(226,232,240,var(--text-opacity)) }}
        </style>

        <style>
            body {
                font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }
        </style>
    </head>
    <body class="antialiased bg-white text-black">
        <div class="relative flex items-top justify-center min-h-screen bg-white text-black sm:items-center sm:pt-0" role="main">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                    <h1 class="px-4 text-lg text-black border-r border-gray-400">
                        404                    </h1>

                    <div class="ml-4 text-lg text-black">
                        Not Found                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
PS C:\Users\breno\Documents\pweb1-atividades\aula06-pratica\laravel> curl.exe -i http://127.0.0.1:8000/idade/2007
HTTP/1.1 200 OK
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.4.25
Content-Type: text/html; charset=utf-8
Cache-Control: no-cache, private
Date: Fri, 27 Nov 2026 00:37:48 GMT
Set-Cookie: XSRF-TOKEN=eyJpdiI6IkJUZXUvcTlKcEUwSWtobGwzdHlBZkE9PSIsInZhbHVlIjoidFp5TEhSY2VoTEYwK3IrVmw1R0daalpTUjJBNFN1R0tqY3R3cldoZXl3QjIzdGhMMXRKNXlqRTB1UG84Y1dvUUhTdGl0N1QwVnY4SzVYV2NVUlppeG9ZRm9XdHNGSUFBb1pKMXBTa1FENUpkWW1DeTdGSk4wR3NkOUw3Z0FXUWoiLCJtYWMiOiI5YjYzZmU0MWM2N2U2YzBkM2RjMDk0YWM0NmYzYzNhODUwYTAzYTY3MDZmMzJiMGJlZDdmMTU3MzYzNzk0NTYzIiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 02:37:48 GMT; Max-Age=7200; path=/; samesite=lax
Set-Cookie: laravel-session=eyJpdiI6IjhnMzhjSVdjemlyQjJtS0lBOTZnNVE9PSIsInZhbHVlIjoiaWxYMmhYSVlHbHFNcklabklGbXFqTFJjZWhRSms2dlhqMmE1R2hXeWNubDcwRGE2SVhhamZRa3FxVHQ0anM0Y2tVYkZjcWxBbVRwNU5JK2cycWZoUlpwOTNGOVEwd1R4SzIyMXY3b0d1WXhXb3lTNjZQRzdmSmtqTjkwMS9na0EiLCJtYWMiOiIxODJkYmI0YzEyZTMwMDU0OTNmYWNlYjJkMjAyOGEwOTEyOTBiNTRiOGFiNThjMmEzZmVkYjBlZGYxOTI2MTZjIiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 02:37:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax

Quem nasceu em 2007 tem ou vai fazer 19 anos em 2026.

PS C:\Users\breno\Documents\pweb1-atividades\aula06-pratica\laravel> curl.exe -i http://127.0.0.1:8000/boas-vindas      
HTTP/1.1 200 OK
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.4.25
Content-Type: text/html; charset=utf-8
Cache-Control: no-cache, private
Date: Fri, 27 Nov 2026 00:38:46 GMT
Set-Cookie: XSRF-TOKEN=eyJpdiI6IjlDTUVUOVh4dFphK0F3bTY0aUFNWnc9PSIsInZhbHVlIjoibmR6QW5nMU1tbFl5MUMyclFlazV2QktPR3I5OThNYkVKYVFtOGpHdVhrbXZQVTFTRlB5UnFsZ1FIS0JhQ3czM1pPRUVVN0U5QnFEUVNTc2cvVm0zTG45R1Z0VW5hYzlNeGtlMDVGVzBEMnlPTEFCUTdmdzU1WHlMK0x6Y0l4dk4iLCJtYWMiOiJlYTYyODAyOWJhYjFlNjEyNTFjNWM0YzNjMWViYzBkZmJjYjc4YmYxMjVjMzkxOTYyMDgyNzgyOThjMGRkNjhkIiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 02:38:46 GMT; Max-Age=7200; path=/; samesite=lax
Set-Cookie: laravel-session=eyJpdiI6Ik1WR2tjRCs1Qm5VVXczQjh1amNCMFE9PSIsInZhbHVlIjoiZkptTjlMVUJlWE1seFZyRDBOSUd5V2VnZkt3YU5QNW9yK2xNWW1heGpzVmZVUFhXSU1mSHN4R1JsV1FhdGlDUHJUM2JKcUMxaStHMi9hdzhTTHpyelY1OUJLcnJseHE5a0xSSXlwOElSQURrWHJNMTNvd2VNUEk4dkZmTGlrUkIiLCJtYWMiOiI4MzZjYmRhZDZkNzBhNDlmMmQ1YjllZWZhNDExODhjMTA3ZmI3MWMzYjVmYTM1YmJhYzc3YzViMDBlMDc1NTA3IiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 02:38:46 GMT; Max-Age=7200; path=/; httponly; samesite=lax

Bem-vinda, turma de ADS!
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) Ao acessar /tabuada/sete, o Laravel retornou uma página de erro 404 (Not Found).
Isso aconteceu porque a rota /tabuada/{numero} possui a restrição whereNumber('numero'), que permite receber somente valores numéricos.
Quem respondeu foi o próprio Laravel, informando que nenhuma rota correspondente foi encontrada. A rota da tabuada não foi executada.
b) Ao retirar o whereNumber('numero'), a rota passa a aceitar qualquer valor no parâmetro, inclusive textos.
Ao acessar /tabuada/sete, a rota é executada, mas como o valor recebido é um texto, o cálculo da tabuada não funciona corretamente, podendo apresentar erro ou resultados inválidos.
A restrição whereNumber é melhor porque impede que valores inválidos sejam recebidos, evitando erros no processamento e garantindo que a rota receba somente números.
c) O ponto de interrogação (?) indica que o parâmetro da rota é opcional, ou seja, o usuário pode acessar o endereço sem informar uma turma.


## A04: Status e redirecionamentos

### Saídas
<!-- curl.exe -i de /admin, /em-breve, /loja e /produtos-antigos -->
```
PS C:\Users\breno\Documents\pweb1-atividades\aula06-pratica\laravel> curl.exe -i http://127.0.0.1:8000/admin
HTTP/1.1 403 Forbidden
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.4.25
Cache-Control: no-cache, private
Date: Fri, 27 Nov 2026 01:11:52 GMT
Content-Type: text/html; charset=utf-8
Set-Cookie: XSRF-TOKEN=eyJpdiI6InhYUWxNZENYMVVOSjcraUVtUE5acEE9PSIsInZhbHVlIjoiajN3VWJjUWdRcXZXTi9Jb05kbTlSTkZmSEFYVlVOK3ZtdkdjV0NLd05acHBzdWR0TVhNcFNLaDRCWFA0eC94SnBYWWV6dnk4RldUQmRQOFhON1oyTURxV2o1VXh3d0RqdVpvT2V3V09IWW9UMDJTdWtvMm5sMC9nVTY5U0NDVTMiLCJtYWMiOiJkYjg0ZTdlMWM0ZmM5OGE3NzcxZWFmZDUzNmVkNDE3NzFhNDkxMWJhY2I3ZmU1ZTcyNWEwNmViMGZhMTVhMWMyIiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 03:11:52 GMT; Max-Age=7200; path=/; samesite=lax
Set-Cookie: laravel-session=eyJpdiI6ImtlcmZJVUJpd2I1NjNPWEhQVnYrSVE9PSIsInZhbHVlIjoidzIwbzB4bFFrZnB3djNOanYyVHlLZGlLQmx6cmtsMDg4QTl0SWFIUHNpVGtCaWlzSlViTCtzUjh6RjBOREowd1UwdUptWm0vOTRVV2xnWElkWGtGemdBWmZ5bkZQMldpb3U4a2lpVTgzM09aOXdZUTM1YnV0YUhGd1VsdkN5MzMiLCJtYWMiOiI4NzBkMTNkODg2YTFlNzg4ZjZhNmY1ZjBmZjFjNTcwYTdiYTMxMjU1N2QwOTI5YjU0MjlmZjNlMDE1NzhkZGVhIiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 03:11:52 GMT; Max-Age=7200; path=/; httponly; samesite=lax

Área restrita

PS C:\Users\breno\Documents\pweb1-atividades\aula06-pratica\laravel> curl.exe -i http://127.0.0.1:8000/em-breve
HTTP/1.1 503 Service Unavailable
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.4.25
Cache-Control: no-cache, private
Date: Fri, 27 Nov 2026 01:13:11 GMT
Content-Type: text/html; charset=utf-8
Set-Cookie: XSRF-TOKEN=eyJpdiI6ImRFeTZ4YUtWeVdWdlZjWVBYdU1LNEE9PSIsInZhbHVlIjoiNXVEVzFlTVo0RjJ2U29wSld6SSt3dDdndmM2REJCTXcyWEpLZ1RZZkJnWGw5YjZBd1FjWER6TEgzcEhEcFlINitqNTJGQm1RM3A1czgzMWR2V09CSmZrRWlhRUd6SjE3cEtsbnJjTmF4MnZNaHdqU1N0V3FaZHVxbWlEZFU4aGgiLCJtYWMiOiI4MTgyM2UxOGQwZjY0NzY0NjYzMjhlY2EwOWEwM2IzZTA1NjRiZTQxZWMxYmY5NGYwMzI3N2VjN2Y5NTg4OGE5IiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 03:13:11 GMT; Max-Age=7200; path=/; samesite=lax
Set-Cookie: laravel-session=eyJpdiI6Ik4wbEh0eUt3aUF3ZEt1TkFuSnNTY3c9PSIsInZhbHVlIjoiVm5VYkdqQnhBVHJmaHd1ckM5UVp3Y21uSm5kenUyVXhBSG5ZYm9TeVlhMzRpbmVVZnBkaW5Bem5hRUtqUU5WQXNDQkZGU1hkWWRpbDczNHNrKzJWTnNDT0creWdVek9vc1JMYjFveVJORDNuNlhRNVVoVlVhdmFDc0RjOW9PS2EiLCJtYWMiOiJlODU2MjkzNWZkMTMyMzI1NGU5MDk2MWE5NGM4ODVhOGQyYjc5YTAwNWNlNTcxNjc4MzI1MGJjODdhYjkwYTYyIiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 03:13:11 GMT; Max-Age=7200; path=/; httponly; samesite=lax

Página em construção

PS C:\Users\breno\Documents\pweb1-atividades\aula06-pratica\laravel> curl.exe -i http://127.0.0.1:8000/loja
HTTP/1.1 302 Found
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.4.25
Cache-Control: no-cache, private
Date: Fri, 27 Nov 2026 01:13:20 GMT
Location: http://127.0.0.1:8000/feira
Content-Type: text/html; charset=utf-8
Set-Cookie: XSRF-TOKEN=eyJpdiI6Ik1qcHB0OUxsQTZMcHAxb2pxbGhud0E9PSIsInZhbHVlIjoiNnJCVUV6dlA3TjVoN2NnbmpOdDQvRU1BTGl2Q251RlZpblI5eXgxVTZVcG1JY0lRRzUwV01zZUNGNGZ0Wi9WMlpjaWprSHdtUnR1bWp6MzJ6ZEUxS1BZSTVpeG5qWk9LUlJBMmdWRFE1UzZIMjBrdDRkdFA5UFhwcFFZYVdzdFciLCJtYWMiOiI2YWRlYjZjYzg1ZTdlNzQyMWNmYzE1NTMyOWMwNTM0OThhZDg1MWIzM2U4ZTNkNzNhMjZkZDE2OTU2MTcwOTM2IiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 03:13:20 GMT; Max-Age=7200; path=/; samesite=lax
Set-Cookie: laravel-session=eyJpdiI6IkJWQ0lVaUFIMkNHa1ZHRkdUeFFlSlE9PSIsInZhbHVlIjoiM3h6Tk5mdXdwVlpjR1VCanp1U3NlVC8zZHV1eGk0c01HRGxJcCtQWEJBVENKOTRUcDRibUt0bnFQbHdFd0ZnZnZvbzZYRVFSazBIUy9aWjdSVVREbWpmVVlEMnlISG41R1VaT21VVW00cC9rVWxBckhMU2kxRnN1a0dQcmEvdzEiLCJtYWMiOiJjYjU3NDNjZDRiMjUwZWYyMWMyZDBjNTkzNWE5ODk1Mjk0YTMxNmUwMDNjODhjNjc4NDBhZmNjMzA2NDE5NTg2IiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 03:13:20 GMT; Max-Age=7200; path=/; httponly; samesite=lax

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://127.0.0.1:8000/feira'" />

        <title>Redirecting to http://127.0.0.1:8000/feira</title>
    </head>
    <body>
        Redirecting to <a href="http://127.0.0.1:8000/feira">http://127.0.0.1:8000/feira</a>.
    </body>
</html>

PS C:\Users\breno\Documents\pweb1-atividades\aula06-pratica\laravel> curl.exe -i http://127.0.0.1:8000/produtos-antigos
HTTP/1.1 301 Moved Permanently
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.4.25
Date: Fri, 27 Nov 2026 01:13:36 GMT
Location: http://127.0.0.1:8000/produtos
Content-Type: text/html; charset=utf-8
Set-Cookie: XSRF-TOKEN=eyJpdiI6ImhMMDlvZ0VuZkNnbGY2SENOdXFoRWc9PSIsInZhbHVlIjoiSUM1ajZrWmUvblRaVDByMDA4cW5ublBiRWlEaTZLcW5wK0xtMCtOQWllRkdkNk9oWHd5ei9JbURBQmZrWVNwQUZCSmdmMVp1Zjd6N1NvT2pGYzV4UWxnQ0ZBTVlQRVVJOVhFWUV5NkR3VlVqTDJkMlo1UjNIVVdtRG9NMEM4RDAiLCJtYWMiOiI0MWFjMTY2Y2U5YWEyZDA0MjI4YmFkNmJlYzNiZDliNWMyOGNiMjIyNjlhMGE2MzFiOTk3NWNhMzE3ZTkyMmExIiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 03:13:36 GMT; Max-Age=7200; path=/; samesite=lax
Set-Cookie: laravel-session=eyJpdiI6InRZS3ZjaVl0VW1YUnhjWnJMZHdVVXc9PSIsInZhbHVlIjoiaDA0TE9WQTd1VEh1eklBYVBmLzY4Y0V1ZVVIUFNwZEVQQlhaUkVSS0lsZExwNG1YUHBickFBMzJWYkJqa3R6YUZuNGFVbEtEVmNhdi90SlRrVTZPME1GNlBFYkNYOFBDRFlNY05PZXF5MTFjUk5abC9MWVNpRVQ1b2JVaVZOM3UiLCJtYWMiOiI2MDIxYTJiYzk1MjVhZGVkYjM4NDQ0YjI2NDRhN2UxZjg1YTBhMjRmNjc3ZGM2ZTFlOGYxYmM2NTE3OGIyMWQ0IiwidGFnIjoiIn0%3D; expires=Fri, 27 Nov 2026 03:13:36 GMT; Max-Age=7200; path=/; httponly; samesite=lax

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://127.0.0.1:8000/produtos'" />

        <title>Redirecting to http://127.0.0.1:8000/produtos</title>
    </head>
    <body>
        Redirecting to <a href="http://127.0.0.1:8000/produtos">http://127.0.0.1:8000/produtos</a>.
    </body>
</html>
```

### Caminho da requisição
_(ex.: GET /cardapio -> rota (web.php) -> CardapioController@index -> view cardapio -> HTML 200)_

### Respostas
a) 1. Rota /admin:
HTTP/1.1 403 Forbidden
Content-Type: text/html; charset=utf-8

Conteúdo retornado: Área restrita.

2. Rota /em-breve:
HTTP/1.1 503 Service Unavailable
Content-Type: text/html; charset=utf-8

Conteúdo retornado: Página em construção.

3. Rota /loja:
HTTP/1.1 302 Found
Location: http://127.0.0.1:8000/feira

4. Rota /produtos-antigos:
HTTP/1.1 301 Moved Permanently
Location: http://127.0.0.1:8000/produtos

As duas primeiras rotas retornaram códigos de erro HTTP. As duas últimas retornaram redirecionamentos, indicando o novo endereço no cabeçalho Location.

b) Eu provaria utilizando o comando curl.exe -i http://127.0.0.1:8000/admin no terminal.
O resultado mostra o código HTTP/1.1 403 Forbidden, comprovando que o servidor retornou uma resposta de acesso proibido, mesmo que o navegador apresente a mensagem como uma página normal.
Isso acontece porque o navegador consegue exibir o conteúdo da resposta independentemente de ela ter sido bem-sucedida ou apresentar um erro HTTP.

c) O navegador fez duas requisições:
1. Uma requisição para /loja, que recebeu o status 302 Found.
2. Outra requisição para /feira, que recebeu o conteúdo da página de destino.
O curl.exe -i mostrou somente uma resposta porque, por padrão, ele não segue automaticamente os redirecionamentos. Ele apenas mostra a primeira resposta e o cabeçalho Location, que informa o endereço de destino.

d) O código 301 deve ser utilizado quando um endereço foi alterado permanentemente. Por exemplo, se a Feira Digital mudar definitivamente o endereço /produtos-antigos para /produtos, deve utilizar o redirecionamento 301.
O código 302 deve ser utilizado quando o redirecionamento é temporário. Por exemplo, se a Feira Digital direcionar temporariamente os visitantes da rota /loja para /feira durante uma manutenção ou promoção, deve utilizar o redirecionamento 302.


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

