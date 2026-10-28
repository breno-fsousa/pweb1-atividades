1. Execute

curl.exe -i http://localhost:8000/q10-cookies/login.php

Copie a saída e explique o aviso. Faça um commit.

PS C:\Users\breno\Documents\pweb1-atividades> curl.exe -i http://localhost:8000/q10-cookies/login.php
HTTP/1.1 302 Found
Host: localhost:8000
Date: Wed, 14 Oct 2026 17:58:52 GMT
Connection: close
X-Powered-By: PHP/8.4.25
Set-Cookie: usuario_logado=true; expires=Wed, 14 Oct 2026 18:58:52 GMT; Max-Age=3600
Location: dashboard.php
Content-type: text/html; charset=UTF-8

Carregando a página...

**Explicação do aviso `headers already sent`**

O aviso `headers already sent` pode ocorrer quando o PHP tenta enviar cabeçalhos HTTP, como os de `setcookie()` e `header()`, depois que o corpo da resposta já começou a ser enviado. No código original, o `echo` aparece antes dessas funções, criando o risco de erro. Na execução realizada, o servidor retornou status 302, enviou o cookie e informou o redirecionamento, sem apresentar o aviso. Isso pode ocorrer quando a saída está em buffer.

2. Crie q10-cookies/dashboard.php, que mostre o valor do cookie usuario_logado (valor
padrão não).

3. Corrija o login.php para que o cookie seja gravado e o redirecionamento aconteça sem
avisos.

4. Execute de novo

curl.exe -i http://localhost:8000/q10-cookies/login.php

PS C:\Users\breno\Documents\pweb1-atividades> curl.exe -i http://localhost:8000/q10-cookies/login.php
HTTP/1.1 302 Found
Host: localhost:8000
Date: Wed, 14 Oct 2026 18:04:03 GMT
Connection: close
X-Powered-By: PHP/8.4.25
Set-Cookie: usuario_logado=true; expires=Wed, 14 Oct 2026 19:04:03 GMT; Max-Age=3600
Location: dashboard.php
Content-type: text/html; charset=UTF-8

Explique o status, o Location e o Set-Cookie.

O status 302 Found indica que o servidor está solicitando um redirecionamento para outra página. O cabeçalho Location: dashboard.php informa que o destino é a página `dashboard.php`. Já o Set-Cookie solicita o armazenamento do cookie `usuario_logado=true`, com validade de uma hora. Assim, o login grava o cookie e orienta o navegador a seguir para o dashboard.

5. Explique por que setcookie() e header() precisam vir antes de qualquer echo.

setcookie() e header() devem vir antes de qualquer echo porque precisam enviar cabeçalhos HTTP ao navegador. Se o conteúdo da página for enviado primeiro, pode ocorrer o aviso “headers already sent”, impedindo o envio correto do cookie ou do redirecionamento.