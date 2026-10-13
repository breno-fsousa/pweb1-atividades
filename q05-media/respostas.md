1. Explique o código original: const, os parênteses no cálculo e o operador ternário.

const MEDIA_APROVACAO = 7;: cria uma constante que guarda a média mínima para aprovação. Seu valor é 7 e não deve ser alterado durante a execução do programa.

($n1 + $n2) / 2: os parênteses fazem a soma das duas notas primeiro. Depois, o resultado é dividido por 2 para calcular a média.

Operador ternário (? :): verifica uma condição e escolhe entre dois resultados. Se a média for maior ou igual a 7, a situação será "Aprovado"; caso contrário, será "Em recuperação".

2. Modique o código para ler as notas da URL: $n1 = (float) ($_GET['n1'] ?? 0);
e o mesmo para n2.

3. Execute e copie as saídas de:
curl.exe -s "http://localhost:8000/q05-media/media.php?n1=5&n2=6"

<p>Notas: 5 e 6</p>
<p>Média: 5.5</p>
<p>Situação: Em recuperação</p>

curl.exe -s "http://localhost:8000/q05-media/media.php?n1=9"

<p>Notas: 9 e 0</p>
<p>Média: 4.5</p>
<p>Situação: Em recuperação</p>

4. Copie as linhas do log dessas duas requisições e explique onde aparecem os valores das
notas.

[Mon Oct 12 17:56:34 2026] PHP 8.4.25 Development Server (http://localhost:8000) started
[Mon Oct 12 17:57:57 2026] [::1]:62561 Accepted
[Mon Oct 12 17:57:57 2026] [::1]:62561 [404]: GET /media.php?n1=5&n2=6 - No such file or directory
[Mon Oct 12 17:57:57 2026] [::1]:62561 Closing
[Mon Oct 12 17:58:17 2026] [::1]:53742 Accepted
[Mon Oct 12 17:58:17 2026] [::1]:53742 [404]: GET /media.php?n1=5&n2=6 - No such file or directory
[Mon Oct 12 17:58:17 2026] [::1]:53742 Closing
[Mon Oct 12 17:58:17 2026] [::1]:59866 Accepted
[Mon Oct 12 17:58:17 2026] [::1]:56648 Accepted
[Mon Oct 12 17:58:46 2026] [::1]:56674 Accepted
[Mon Oct 12 17:58:46 2026] [::1]:56674 [200]: GET /q05-media/media.php?n1=5&n2=6 
[Mon Oct 12 17:58:46 2026] [::1]:56674 Closing
[Mon Oct 12 17:59:24 2026] [::1]:59866 Closed without sending a request; it was probably just an unused speculative preconnection
[Mon Oct 12 17:59:24 2026] [::1]:59866 Closing
[Mon Oct 12 17:59:24 2026] [::1]:56648 Closed without sending a request; it was probably just an unused speculative preconnection
[Mon Oct 12 17:59:24 2026] [::1]:56648 Closing
[Mon Oct 12 18:00:02 2026] [::1]:50854 Accepted
[Mon Oct 12 18:00:02 2026] [::1]:50854 [200]: GET /q05-media/media.php?n1=9
[Mon Oct 12 18:00:02 2026] [::1]:50854 Closing

Os valores das duas notas aparecem na URL da requisição, depois do símbolo ?. Na primeira requisição, n1=5 representa a primeira nota e n2=6 representa a segunda nota, sendo separados pelo símbolo &. Na segunda requisição, aparece apenas n1=9, pois a segunda nota não foi informada e, por isso, o código utiliza o valor padrão 0, definido pelo operador ?? 0. No log, esses valores podem ser vistos nas linhas que contêm GET /q05-media/media.php?n1=5&n2=6 e GET /q05-media/media.php?n1=9.


5. Teste ?n1=abc&n2=10 e explique o resultado.

<p>Notas: 0 e 10</p>
<p>Média: 5</p>
<p>Situação: Em recuperação</p>

O código só reconhece a segunda nota porque a primeira não é um número válido.