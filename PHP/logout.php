<?php
session_start(); // Inicia a sessão (se não tiver sido iniciada)
session_unset(); // Limpa todas as variáveis de sessão
session_destroy(); // Destroi a sessão

// Redireciona para a página inicial
header("Location: /ProjetoHTML/index.php");
exit;
