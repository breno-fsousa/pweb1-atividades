1. Explique json_encode, JSON_PRETTY_PRINT e JSON_UNESCAPED_UNICODE.

Esse código cria um array associativo em PHP com o nome da disciplina, o status e a quantidade de alunos. Depois, utiliza a função json_encode() para converter essas informações para JSON. A opção JSON_PRETTY_PRINT deixa o resultado organizado, enquanto JSON_UNESCAPED_UNICODE mantém os caracteres acentuados visíveis. Por fim, o echo exibe o JSON no navegador. A linha header() está comentada, mas pode ser utilizada para informar que o conteúdo da resposta é JSON com codificação UTF-8.

2. Execute

curl.exe -i http://localhost:8000/q08-content-type/dados.php

Copie a saída. No navegador, abra o DevTools (aba Network), clique na requisição e
salve um print do Content-Type em prints/devtools-html.png.

PS C:\Users\breno\Documents\pweb1-atividades\q08-content-type> curl.exe -i http://localhost:8000/q08-content-type/dados.php
HTTP/1.1 404 Not Found
Host: localhost:8000
Date: Wed, 14 Oct 2026 14:10:36 GMT
Connection: close
X-Powered-By: PHP/8.4.25
Content-Type: text/html; charset=UTF-8
Content-Length: 559 

3. Descomente a linha do header, repita o curl e salve o print prints/devtools-json.png.

4. Compare as duas saídas: o que mudou e o que não mudou?

Antes da alteração, o servidor retornava o cabeçalho Content-Type: text/html; charset=UTF-8, indicando que a resposta era HTML.

Depois de descomentar o header(), o cabeçalho passou a ser Content-Type: application/json; charset=utf-8, informando que o conteúdo retornado é JSON.

O que mudou foi o tipo de conteúdo declarado no cabeçalho HTTP. O corpo da resposta permaneceu igual, contendo as informações da disciplina, do status e da quantidade de alunos.

Portanto, a função header() define como o navegador deve interpretar o conteúdo da resposta, enquanto json_encode() converte os dados PHP para o formato JSON.

5. Retire o JSON_UNESCAPED_UNICODE, repita o curl e explique o que aconteceu com Pro-
gramação. Depois devolva a opção ao código.

Ao retirar a opção JSON_UNESCAPED_UNICODE, os caracteres acentuados da palavra Programação passaram a ser representados por sequências Unicode, como \u00e7 e \u00e3. Isso acontece porque, por padrão, o json_encode() escapa esses caracteres. Os dados não foram perdidos: o JSON continua válido. Depois do teste, a opção foi adicionada novamente para manter os caracteres acentuados visíveis na resposta.