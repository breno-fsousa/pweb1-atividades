1. Identique os dois problemas do código.

1.O código não verifica se o parâmetro nome existe na URL, podendo gerar um aviso.
2.O código não trata a saída com htmlspecialchars(), permitindo uma possível vulnerabilidade XSS.

2. Antes de corrigir: abra saudacao.php no navegador sem parâmetros e copie o log. 

PS C:\Users\breno\Documents\pweb1-atividades\q07-tratamento> php -S localhost:8000
[Wed Oct 14 10:00:30 2026] PHP 8.4.25 Development Server (http://localhost:8000) started
[Wed Oct 14 10:00:42 2026] [::1]:50912 Accepted
[Wed Oct 14 10:00:42 2026] PHP Warning:  Undefined array key "nome" in C:\Users\breno\Documents\pweb1-atividades\q07-tratamento\saudacao.php on line 2
[Wed Oct 14 10:00:42 2026] [::1]:50912 [200]: GET /saudacao.php
[Wed Oct 14 10:00:42 2026] [::1]:50912 Closing
[Wed Oct 14 10:00:42 2026] [::1]:50860 Accepted

Depois execute

curl.exe -s "http://localhost:8000/q07-tratamento/saudacao.php?nome=<b>Oi</b>"

Copie a saída. Faça um commit.

[Wed Oct 14 10:02:32 2026] PHP 8.4.25 Development Server (http://localhost:8000) started
[Wed Oct 14 10:02:35 2026] [::1]:60449 Accepted
[Wed Oct 14 10:02:35 2026] [::1]:52445 Accepted
[Wed Oct 14 10:02:35 2026] [::1]:60449 [200]: GET /saudacao.php?nome=%3Cb%3EOi%3C/b%3E
[Wed Oct 14 10:02:35 2026] [::1]:60449 Closing

Olá, Oi

3. Corrija: valor padrão Visitante com ?? e saída com htmlspecialchars.

4. Depois de corrigir: repita o curl e compare o corpo das duas respostas.

5. No navegador, teste ?nome=<script>alert('Ataque')</script> antes e depois da correção
(use o histórico de commits ou desfaça a correção temporariamente) e explique oque é XSS.