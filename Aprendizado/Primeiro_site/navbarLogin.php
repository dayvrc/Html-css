<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


<nav class="navbar">
    <div class="logo">
        <a href="index.php">
            <h1>Aero Tour</h1>
        </a>
    </div>

    <div class="menu">
        <a href="#container_passagens">Comprar Passagens</a>

        <?php if (isset($_SESSION["usuario_nome"])): ?>
            <!-- Se o usuário estiver logado -->
            <a href="perfil.php">Olá, <?= $_SESSION["usuario_nome"]; ?>!</a> <!-- Exibe o nome do usuário -->
            <a href="PHP/logout.php" id="botao" >Sair</a> <!-- Link para deslogar -->
        <?php else: ?>
            <!-- Se o usuário não estiver logado -->
            <a id="botao" href="login.php">Login</a>
        <?php endif; ?>
    </div>
</nav>