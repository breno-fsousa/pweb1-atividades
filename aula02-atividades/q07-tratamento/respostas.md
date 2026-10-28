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

$_GET['nome'] ?? 'Visitante': se o parâmetro nome não existir na URL, será utilizado o valor Visitante.
htmlspecialchars($nome, ENT_QUOTES, 'UTF-8'): converte caracteres especiais em entidades HTML, ajudando a prevenir ataques XSS.

4. Depois de corrigir: repita o curl e compare o corpo das duas respostas.

Primeira resposta: como o parâmetro nome não foi informado, o operador ?? utiliza o valor padrão Visitante.
Segunda resposta: como o parâmetro nome foi informado como Breno, o sistema exibe esse nome.
Segurança: htmlspecialchars() trata caracteres especiais antes de exibi-los, ajudando a prevenir ataques XSS.

5. No navegador, teste ?nome=<script>alert('Ataque')</script> antes e depois da correção
(use o histórico de commits ou desfaça a correção temporariamente) e explique oque é XSS.

### 5. Teste de XSS antes e depois da correção

**Antes da correção:**  
O código exibia diretamente o conteúdo recebido pela URL. Por isso, o navegador poderia interpretar a tag `<script>` e executar o JavaScript, mostrando o alerta “Ataque”.

**Depois da correção:**  
A função `htmlspecialchars()` transforma os caracteres especiais em entidades HTML, fazendo com que o conteúdo seja exibido como texto, sem executar o script.

**O que é XSS?**  
XSS (*Cross-Site Scripting*) é uma vulnerabilidade que permite a execução de scripts maliciosos no navegador de quem acessa uma página vulnerável.
