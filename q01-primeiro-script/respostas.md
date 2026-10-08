1. Leia o código e responda à análise do respostas.md: quais linhas são HTML, quais são
PHP, e a diferença entre <?php echo e <?=.

Linhas HTMl
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Questão 01</title>
</head>
<body>
    <h1>Olá, turma!</h1>
    <p>
    </p>
    <p>Hora no servidor: </p>
</body>
</html>

LINHAS PHP
<?php echo "Este texto foi escrito pelo PHP."; ?>
<?= date('H:i:s') ?>

DIFERENÇA ENTRE <?php echo e <?=
<?php echo abre um bloco PHP e utiliza o comando echo para mostrar um conteúdo.
<?= é uma forma abreviada de <?php echo, usada principalmente para imprimir um valor diretamente.

2. Abra http://localhost:8000/q01-primeiro-script/ola.php no navegador. Copie
as linhas que surgiram no Terminal 1 e explique cada parte.

[Wed Oct  7 22:11:48 2026] [::1]:61178 Accepted *O navegador fez uma conexão com o servidor.
[Wed Oct  7 22:11:48 2026] [::1]:61178 [404]: GET / - No such file or directory *O navegador tentou acessar a página inicial /, mas ela não foi encontrada.
[Wed Oct  7 22:11:48 2026] [::1]:61178 Closing *A conexão foi encerrada.
[Wed Oct  7 22:11:53 2026] [::1]:65216 Accepted *O navegador fez uma nova conexão com o servidor.
[Wed Oct  7 22:11:53 2026] [::1]:65216 [200]: GET /ola.php *O arquivo ola.php foi encontrado e acessado com sucesso.
[Wed Oct  7 22:11:53 2026] [::1]:65216 Closing *A conexão foi encerrada após o servidor responder.
[Wed Oct  7 22:11:53 2026] [::1]:55996 Accepted *O servidor aceitou outra conexão do navegador.

3. Aperte F5 três vezes e observe o que muda na página e no log.

F5 – 1ª vez	A página é recarregada e o PHP recebe uma nova requisição
F5 – 2ª vez	Outra requisição GET /ola.php aparece no log
F5 – 3ª vez	Mais uma requisição GET /ola.php aparece
[200]	Significa que a página foi acessada com sucesso
Accepted	O servidor aceitou a conexão
Closing	A conexão foi encerrada

4. Aperte Ctrl+U e verique se aparece alguma linha de PHP.

O PHP não aparece no Ctrl + U porque ele é executado no servidor antes de chegar ao navegador. O navegador mostra apenas o HTML que foi gerado pelo PHP.

5. No Terminal 2, execute
curl.exe -i http://localhost:8000/q01-primeiro-script/ola.php
Copie a saída e explique a primeira linha, os cabeçalhos e o corpo.

HTTP/1.1 404 Not Found
O arquivo solicitado não foi encontrado.

Host: localhost:8000
Endereço do servidor local.

Date: Thu, 08 Oct 2026 01:28:25 GMT
Data e horário da resposta.

Connection: close
A conexão será encerrada.

X-Powered-By: PHP/8.4.25
Mostra que o servidor está usando o PHP 8.4.25.

Content-Type: text/html; charset=UTF-8
Informa que o conteúdo enviado é HTML e usa UTF-8.

Content-Length: 560
Informa o tamanho da resposta: 560 bytes.

<!doctype html>
Indica que o documento é HTML.

<html>
Início da página HTML.

<h1>Not Found</h1>
Mostra a mensagem "Não encontrado".

<p>
Início de um parágrafo.

The requested resource ... was not found on this server.
Informa que o arquivo solicitado não foi encontrado.

</p>
Final do parágrafo.

</html>
Final da página HTML.