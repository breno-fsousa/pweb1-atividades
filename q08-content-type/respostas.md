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


5. Retire o JSON_UNESCAPED_UNICODE, repita o curl e explique o que aconteceu com Pro-
gramação. Depois devolva a opção ao código.