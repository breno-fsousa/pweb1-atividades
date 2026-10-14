1. Execute
curl.exe -i http://localhost:8000/q10-cookies/login.php
Copie a saída e explique o aviso. Faça um commit.
2. Crie q10-cookies/dashboard.php, que mostre o valor do cookie usuario_logado (valor
padrão não).
3. Corrija o login.php para que o cookie seja gravado e o redirecionamento aconteça sem
avisos.
4. Execute de novo
curl.exe -i http://localhost:8000/q10-cookies/login.php
Explique o status, o Location e o Set-Cookie.
5. Explique por que setcookie() e header() precisam vir antes de qualquer echo.