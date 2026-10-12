1. Explique o código original: const, os parênteses no cálculo e o operador ternário.

const MEDIA_APROVACAO = 7;: cria uma constante que guarda a média mínima para aprovação. Seu valor é 7 e não deve ser alterado durante a execução do programa.

($n1 + $n2) / 2: os parênteses fazem a soma das duas notas primeiro. Depois, o resultado é dividido por 2 para calcular a média.

Operador ternário (? :): verifica uma condição e escolhe entre dois resultados. Se a média for maior ou igual a 7, a situação será "Aprovado"; caso contrário, será "Em recuperação".

2. Modique o código para ler as notas da URL: $n1 = (float) ($_GET['n1'] ?? 0);
e o mesmo para n2.

3. Execute e copie as saídas de:
curl.exe -s "http://localhost:8000/q05-media/media.php?n1=5&n2=6"

curl.exe -s "http://localhost:8000/q05-media/media.php?n1=9"

4. Copie as linhas do log dessas duas requisições e explique onde aparecem os valores das
notas.

5. Teste ?n1=abc&n2=10 e explique o resultado.