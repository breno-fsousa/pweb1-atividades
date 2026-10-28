1. Crie q10-cookies/contador.php, que leia o cookie visitas com $_COOKIE (valor
padrão 0), some 1, grave de volta com setcookie (validade de 1 hora) e mostre Você
visitou esta página N vez(es).

Você visitou esta página 1 vez(es).

2. No navegador, aperte F5 algumas vezes. No DevTools, abra Application > Cookies
e salve o print prints/cookies-application.png.

3. Execute duas vezes

curl.exe -i http://localhost:8000/q10-cookies/contador.php

Copie a saída. Explique por que o contador não passa de 1.

PS C:\Users\breno\Documents\pweb1-atividades> curl.exe -i http://localhost:8000/q10-cookies/contador.php
HTTP/1.1 200 OK
Host: localhost:8000
Date: Wed, 14 Oct 2026 17:47:18 GMT
Connection: close
X-Powered-By: PHP/8.4.25
Set-Cookie: visitas=1; expires=Wed, 14 Oct 2026 18:47:18 GMT; Max-Age=3600
Content-type: text/html; charset=UTF-8

Você visitou esta página 1 vez(es).
PS C:\Users\breno\Documents\pweb1-atividades> curl.exe -i http://localhost:8000/q10-cookies/contador.php
HTTP/1.1 200 OK
Host: localhost:8000
Date: Wed, 14 Oct 2026 17:47:22 GMT
Connection: close
X-Powered-By: PHP/8.4.25
Set-Cookie: visitas=1; expires=Wed, 14 Oct 2026 18:47:22 GMT; Max-Age=3600
Content-type: text/html; charset=UTF-8

Você visitou esta página 1 vez(es).

O contador não passa de 1 porque o comando curl.exe, sem opções para armazenar e enviar cookies, não mantém o cookie entre as requisições. Assim, em cada execução, o PHP não encontra o cookie visitas, utiliza o valor padrão 0, soma 1 e retorna o valor 1 novamente. Para manter a contagem entre requisições, é necessário salvar e enviar o cookie.

4. Execute três vezes

curl.exe -i -c cookies.txt -b cookies.txt http://localhost:8000/q10-cookies/
contador.php

Copie a terceira saída. Explique o que fazem -c e -b.

PS C:\Users\breno\Documents\pweb1-atividades> curl.exe -i -c cookies.txt -b cookies.txt http://localhost:8000/q10-cookies/contador.php
HTTP/1.1 200 OK
Host: localhost:8000
Date: Wed, 14 Oct 2026 17:50:05 GMT
Connection: close
X-Powered-By: PHP/8.4.25
Set-Cookie: visitas=3; expires=Wed, 14 Oct 2026 18:50:05 GMT; Max-Age=3600
Content-type: text/html; charset=UTF-8

Você visitou esta página 3 vez(es). 

**Explicação das opções -c e -b**

A opção `-c cookies.txt` salva os cookies recebidos do servidor no arquivo indicado. Já a opção `-b cookies.txt` envia os cookies armazenados nesse arquivo junto com a requisição.

Dessa forma, o PHP consegue ler o valor anterior do cookie, somar 1 e atualizar o contador. Na saída apresentada, o contador chegou a 3 visitas, e o cookie foi configurado para expirar após uma hora.