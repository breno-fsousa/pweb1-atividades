<?php

// Grava o cookie por 1 hora
setcookie("usuario_logado", "true", time() + 3600);

// Redireciona para o dashboard
header("Location: dashboard.php");

exit;
