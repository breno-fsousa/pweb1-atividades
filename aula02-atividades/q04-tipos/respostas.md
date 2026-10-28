1. Antes de executar, preencha a previsão de tipo e valor de cada linha.

	Minha previsão (antes de executar)
	string: 105
	string: 15
	int: 3
	int: 1
	int: 3.9
	bool: false
	bool: false
	bool: true

2. Execute
curl.exe -s http://localhost:8000/q04-tipos/tipos.php
Copie a saída e explique cada linha do var_dump.

1. int(15) — O PHP converte o texto "10" em número e soma com 5, resultando em 15, que é um número inteiro (int).
2. string(3) "105" — O ponto (.) junta "10" com 5, formando o texto "105". O número 3 indica que a string possui três caracteres.
3. float(3.5) — A divisão de 7 por 2 resulta em 3.5, que é um número decimal (float).
4. int(1) — O operador % retorna o resto da divisão. Como o resto de 7 dividido por 2 é 1, o resultado é um número inteiro.
5. int(3) — O (int) converte o texto "3.9 kg" em um número inteiro. O PHP aproveita a parte numérica inicial e descarta as casas decimais e o restante do texto.
6. bool(false) — A conversão de "0" para booleano resulta em false, pois essa string é considerada falsa pelo PHP.
7. bool(true) — A conversão de "false" resulta em true, porque é um texto não vazio. O PHP não interpreta a palavra como o valor booleano falso.
8. bool(false) — A comparação 0.1 + 0.2 == 0.3 resulta em false devido a pequenas imprecisões na representação de números decimais no computador.

3. Explique a diferença entre "10" + 5 e "10" . 5, e por que (bool) "0" e (bool)
"false" dão resultados diferentes.

O operador + realiza uma soma matemática. Assim, em "10" + 5, o PHP converte o texto "10" em número e soma com 5, resultando em 15. Já o operador . serve para juntar textos. Portanto, "10" . 5 resulta em "105".
Na conversão para booleano, (bool) "0" resulta em false, porque o PHP considera a string "0" como falsa. Já (bool) "false" resulta em true, porque é um texto não vazio. O PHP não interpreta a palavra "false" como o valor booleano falso automaticamente.

4. Acrescente ao arquivo duas linhas var_dump criadas por você e explique o resultado.

var_dump("5" * 2); — O PHP converte o texto "5" em número e multiplica por 2. O resultado é int(10), pois o resultado é um número inteiro.
var_dump((float) "6.5"); — O (float) converte o texto "6.5" em um número decimal. O resultado é float(6.5), pois possui casas decimais.