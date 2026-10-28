1. Crie o arquivo q09-somente-post/api.php que:
(a) envie o cabeçalho Content-Type: application/json; charset=utf-8;
(b) verique o método em $_SERVER['REQUEST_METHOD'];
(c) para qualquer método diferente de POST: responda com status 405, o
cabeçalho Allow: POST e o JSON {"erro": "Método não permitido"}, e
encerre com exit;
(d) para POST: responda com status 200 e o JSON {"sucesso": "Dados
recebidos"}.
2. Use json_encode com JSON_UNESCAPED_UNICODE para gerar o JSON.

3. Execute e copie as saídas de:

curl.exe -i http://localhost:8000/q09-somente-post/api.php

PS C:\Users\breno\Documents\pweb1-atividades\q09-somente-post> curl.exe -i http://localhost:8000/q09-somente-post/api.php
HTTP/1.1 405 Method Not Allowed
Host: localhost:8000
Date: Wed, 14 Oct 2026 17:22:03 GMT
Connection: close
X-Powered-By: PHP/8.4.25
Content-Type: application/json; charset=utf-8
Allow: POST

{"erro":"Método não permitido"}

curl.exe -i -X POST http://localhost:8000/q09-somente-post/api.php

PS C:\Users\breno\Documents\pweb1-atividades\q09-somente-post> curl.exe -i -X POST http://localhost:8000/q09-somente-post/api.php
HTTP/1.1 200 OK
Host: localhost:8000
Date: Wed, 14 Oct 2026 17:23:38 GMT
Connection: close
X-Powered-By: PHP/8.4.25
Content-Type: application/json; charset=utf-8

{"sucesso":"Dados recebidos"}

curl.exe -i -X PUT http://localhost:8000/q09-somente-post/api.php

PS C:\Users\breno\Documents\pweb1-atividades\q09-somente-post> curl.exe -i -X PUT http://localhost:8000/q09-somente-post/api.php
HTTP/1.1 405 Method Not Allowed
Host: localhost:8000
Date: Wed, 14 Oct 2026 17:24:18 GMT
Connection: close
X-Powered-By: PHP/8.4.25
Content-Type: application/json; charset=utf-8
Allow: POST

{"erro":"Método não permitido"}

4. Copie as linhas do log dessas três requisições e explique onde aparecem o método e o
status.

[Wed Oct 14 14:22:03 2026] [::1]:52072 [405]: GET /q09-somente-post/api.php 

[Wed Oct 14 14:23:38 2026] [::1]:52356 [200]: POST /q09-somente-post/api.php

[Wed Oct 14 14:24:18 2026] [::1]:64835 [405]: PUT /q09-somente-post/api.php

**Explicação dos logs das requisições**

Os logs do servidor PHP registram o método HTTP utilizado e o status da resposta.

No teste GET, aparece `[405]: GET`, indicando que o método GET não é permitido pela API. No teste POST, aparece `[200]: POST`, indicando que a requisição foi processada com sucesso. No teste PUT, aparece `[405]: PUT`, indicando que esse método também não é permitido.

Portanto, o método HTTP aparece depois do código de status, e o status informa o resultado da requisição. O código 200 representa sucesso, enquanto o código 405 indica que o método utilizado não é permitido.

5. Abra o endereço no navegador e explique qual método ele usou e qual status recebeu.

{"erro":"Método não permitido"}

Ao abrir o endereço da API no navegador, foi utilizado o método GET, que é o método padrão para acessar um endereço diretamente. Como a API permite somente requisições POST, o servidor retornou o status HTTP 405 (Method Not Allowed), acompanhado da mensagem JSON "Método não permitido".