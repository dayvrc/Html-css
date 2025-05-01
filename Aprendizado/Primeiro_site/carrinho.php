<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Carrinho de Compras - Aero Tour">
    <meta name="keywords" content="carrinho, compras, passagens, pagamento">
    <meta name="author" content="Dayvson Costa">
    <title>Carrinho - Aero Tour</title>
    <link rel="stylesheet" href="CSS/estilo.css"> <!-- Link para o CSS -->
</head>

<body>

    <!-- Incluindo a navbar -->
    <?php include('navbarLogin.php'); ?>

    <main>
        <section id="container_carrinho">
            <h2>Carrinho de Compras</h2>

            <!-- Verificação se o usuário tem passagens no carrinho -->
            <?php if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])): ?>
                <div class="itens-carrinho">
                    <?php foreach ($_SESSION['carrinho'] as $item): ?>
                        <div class="item">
                            <img src="<?php echo $item['imagem']; ?>" alt="<?php echo $item['nome']; ?>" width="150">
                            <div class="detalhes">
                                <h3><?php echo $item['nome']; ?></h3>
                                <p>Preço: R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></p>
                                <p>Quantidade: <?php echo $item['quantidade']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Formulário de pagamento -->
                <div class="pagamento">
                    <h3>Escolha a forma de pagamento:</h3>
                    <form action="finalizarCompra.php" method="POST">
                        <select name="forma_pagamento" required>
                            <option value="">Selecione</option>
                            <option value="cartao">Cartão de Crédito</option>
                            <option value="boleto">Boleto Bancário</option>
                            <option value="pix">PIX</option>
                        </select>
                        <button type="submit" class="btn_1">Finalizar Compra</button>
                    </form>
                </div>

                <!-- Total do Carrinho -->
                <div class="total-carrinho">
                    <h3>Total: R$ 
                        <?php
                        $total = 0;
                        foreach ($_SESSION['carrinho'] as $item) {
                            $total += $item['preco'] * $item['quantidade'];
                        }
                        echo number_format($total, 2, ',', '.');
                        ?>
                    </h3>
                </div>

            <?php else: ?>
                <p>Seu carrinho está vazio. <a href="index.php">Voltar para as passagens</a></p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <div class="rodape">
            <h1 class="aero_tour">Aero Tour</h1>
        </div>
        <div class="container-rdp">
            <div class="sociais">
                <h2>Redes Sociais</h2>
                <p>Instagram</p>
                <p>Facebook</p>
                <p>Youtube</p>
            </div>
            <div class="outros">
                <h2>Cliente</h2>
                <p>Faq</p>
                <p>Atendimento</p>
                <p>Financeiro</p>
            </div>
        </div>
        <div class="endereco">
            <p>Av. Eng. Abdias de Carvalho, 1678 - Madalena, Recife - PE, 50720-225</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="JS/global.js"></script>

</body>

</html>
