1. Antes de executar, encontre o erro no código e indique a linha.

O erro está na linha 2 do código. Falta o ponto e vírgula (;) no final da atribuição da variável $curso.

2. Abra a página no navegador. Copie a mensagem de erro e as linhas do log.

Parse error: syntax error, unexpected token "echo" in C:\Users\breno\Documents\pweb1-atividades\q02-erros\erro.php on line 3

[Thu Oct  8 21:33:40 2026] PHP 8.4.25 Development Server (http://localhost:8000) started
[Thu Oct  8 21:33:49 2026] [::1]:55760 Accepted
[Thu Oct  8 21:33:54 2026] [::1]:55760 [200]: GET /erro.php - syntax error, unexpected token "echo" in C:\Users\breno\Documents\pweb1-atividades\q02-erros\erro.php on line 3
[Thu Oct  8 21:33:54 2026] [::1]:55760 Closing
[Thu Oct  8 21:33:54 2026] [::1]:58680 Accepted
[Thu Oct  8 21:33:54 2026] [::1]:55294 Accepted

3. No Terminal 1, pare o servidor com Ctrl+C e suba de novo com -d display_errors=0
no lugar de =1. Abra a página outra vez e copie o log.

[Thu Oct  8 21:38:02 2026] PHP 8.4.25 Development Server (http://localhost:8000) started
[Thu Oct  8 21:38:12 2026] [::1]:51266 Accepted
[Thu Oct  8 21:38:14 2026] [::1]:51266 [500]: GET /erro.php - syntax error, unexpected token "echo" in C:\Users\breno\Documents\pweb1-atividades\q02-erros\erro.php on line 3
[Thu Oct  8 21:38:14 2026] [::1]:51266 Closing
[Thu Oct  8 21:38:15 2026] [::1]:58641 Accepted
[Thu Oct  8 21:38:15 2026] [::1]:58641 [500]: GET /erro.php - syntax error, unexpected token "echo" in C:\Users\breno\Documents\pweb1-atividades\q02-erros\erro.php on line 3
[Thu Oct  8 21:38:15 2026] [::1]:58641 Closing
[Thu Oct  8 21:38:15 2026] [::1]:52892 Accepted
[Thu Oct  8 21:38:15 2026] [::1]:59838 Accepted

4. Compare o status registrado no log nas duas execuções e explique a diferença.

Diferença: na primeira execução, o log registrou status 200 apesar do erro de sintaxe, enquanto na segunda registrou 500, que representa uma falha no processamento do código. O comportamento esperado para esse erro de sintaxe é o status 500; o status 200 da primeira execução pode ter ocorrido devido à forma como o erro foi tratado ou registrado naquela execução.

5. Volte o servidor para display_errors=1, corrija o erro, teste e faça um commit.

Bem-vindo ao curso de ADS


