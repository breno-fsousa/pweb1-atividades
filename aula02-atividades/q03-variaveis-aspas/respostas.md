1. Antes de executar, preencha a coluna Minha previsão da tabela do respostas.md.

	Minha previsão
	Aluna: Maria
	Aluna: Maria
	Aluna: Maria
	Cursa o 2o semestre de ADS
	MariaADS
	Maria

2. Execute
curl.exe -s http://localhost:8000/q03-variaveis-aspas/aspas.php
Copie a saída e preencha a coluna Resultado real.

    Resultado Real
    Aluna: Maria
    Aluna: Maria
    Aluna: $nome
    Cursa o 2o semestre de ADS
    MariaADS
    Atalho: Maria

3. Explique cada linha da saída e onde sua previsão errou.

1. Aluna: Maria — O ponto (.) faz a concatenação, juntando o texto "Aluna: " com o valor da variável $nome, que é Maria. Minha previsão estava correta.
2. Aluna: Maria — As aspas duplas permitem que o PHP substitua $nome pelo valor armazenado na variável. Minha previsão estava correta.
3. Aluna: $nome — As aspas simples não substituem a variável pelo seu valor, então o PHP exibe $nome literalmente. Minha previsão estava errada, pois pensei que apareceria Aluna: Maria.
4. Cursa o 2o semestre de ADS — As chaves em {$semestre} delimitam a variável, permitindo que o PHP diferencie seu nome do texto que vem depois. O valor 2 é exibido junto com o semestre de ADS. Minha previsão estava correta.
5. MariaADS — O ponto (.) concatena as variáveis $nome e $curso, mas não adiciona espaço entre elas. Minha previsão estava correta.
6. Atalho: Maria — O código <?= $nome ?> é um atalho para exibir o valor da variável $nome. O texto Atalho:  aparece porque está escrito fora do código PHP, antes do atalho. Minha previsão estava errada, pois escrevi apenas Maria e esqueci a palavra Atalho:.

4. Explique para que servem as chaves em {$semestre} e como colocar um espaço em
$nome . $curso.

As chaves em {$semestre} servem para delimitar o nome da variável dentro de um texto entre aspas duplas, indicando ao PHP onde ela termina. Assim, o PHP consegue diferenciar a variável $semestre da letra o que vem depois, exibindo 2o semestre.
Para colocar um espaço entre $nome e $curso, basta adicionar um espaço entre aspas duplas na concatenação.