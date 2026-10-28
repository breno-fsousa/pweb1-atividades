1. Explique o código original.

Linha 2:Recebendo o valor
$palavra = $_GET['palavra'] ?? "Ceara";
$palavra: variável que armazena o texto.
$_GET['palavra']: recebe o valor informado na URL.
?? "Ceara": define "Ceara" como valor padrão caso o parâmetro não exista ou seja null.
Exemplo: se nenhum valor for informado, a variável receberá Ceara.

Linha 3:Exibindo a palavra
echo "<p>Palavra: $palavra</p>";
echo: exibe o conteúdo na página.
<p> e </p>: criam um parágrafo em HTML.
$palavra: é substituída pelo texto armazenado na variável.
Resultado: Palavra: Ceara

Linha 4:Contando o tamanho
echo "<p>strlen: " . strlen($palavra) . "</p>";
strlen(): retorna a quantidade de bytes da string.
.: junta os textos e o resultado da função.
echo: exibe o resultado na página.
Resultado para Ceara: strlen: 5

2. Complete o código para mostrar também mb_strlen, strtoupper e mb_strtoupper, e
uma classicação com if: palavra curta (até 5 letras, usando mb_strlen) ou palavra
longa.

<?php
$palavra = $_GET['palavra'] ?? "Ceara";
echo "<p>Palavra: $palavra</p>";

echo "<p>strlen: " . strlen($palavra) . "</p>";

echo "<p>mb_strlen: " . mb_strlen($palavra, 'UTF-8') . "</p>";

echo "<p>strtoupper: " . strtoupper($palavra) . "</p>";

echo "<p>mb_strtoupper: " . mb_strtoupper($palavra, 'UTF-8') . "</p>";

if (mb_strlen($palavra, 'UTF-8') <= 5) {
    echo "<p>Classificação: palavra curta</p>";
} else {
    echo "<p>Classificação: palavra longa</p>";
}
?>

3. Execute

curl.exe -s "http://localhost:8000/q06-strings/palavra.php?palavra=Ceara"

Copie a saída.

Palavra: Ceara

strlen: 5

mb_strlen: 5

strtoupper: CEARA

mb_strtoupper: CEARA

Classificação: palavra curta

4. No navegador, abra palavra.php?palavra=Ceará. Copie a linha do log e explique por
que a palavra aparece como Cear%C3%A1.

[Tue Oct 13 22:48:43 2026] [::1]:57755 [200]: GET /q06-strings/palavra.php?palavra=Cear%C3%A1
Isso acontece por causa da codificação de URL (URL encoding), que permite transmitir caracteres especiais pela internet.
Ceará é a palavra original.
Em UTF-8, a letra á é representada pelos bytes C3 A1.
Na URL, esses bytes são escritos como %C3%A1.

5. Compare strlen e mb_strlen, e strtoupper e mb_strtoupper, para Ceara e Ceará.

A principal diferença é que as funções mb_ trabalham corretamente com caracteres multibyte, como letras acentuadas em UTF-8. Por isso, mb_strlen() é mais adequada para contar caracteres e mb_strtoupper() para converter palavras com acentos para maiúsculas.