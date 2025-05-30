<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8"> <!-- Tag de tipo de caractere com acento -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Tag de compatibilidade de explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Esse é meu primeiro site">
    <meta name="keywords" content="programacao,html,css,javascript">
    <meta name="author" content="Dayvson Costa">
    <title>Aero Tour | Viaje bem</title>
    <link rel="stylesheet" href="CSS/estilo.css"> <!-- Link de CSS -->
</head>

<body>

    <!-- Incluindo a navbar -->
    <?php include('navbarLogin.php'); ?>

    <main>
        <section id="container_c_passagem">

            <div class="TelaP">

                <div class="TelaP_img">
                    <img src="CSS/img/Salvador.png" alt="Imagem de Salvador">
                </div>

                <div class="TelaP_txt">
                    <div class="TelaP_txt2">
                        <h2> Salvador</h2>
                    </div>

                    <div class="TelaP_txt3">
                        <p style="font-size: 10px;">Ida e Volta</p>
                        <p style="font-size: 20px;">R$ 2.000</p>
                        <p style="font-size: 10px;">À VISTA</p>
                        <p>10x R$200</p>
                        <br>
                        
                    <?php if (isset($_SESSION['usuario_id'])): ?>
                        <a class="btn_1" style="color: white;" href="carrinho.php">Comprar</a>
                    <?php else: ?>
                        <a class="btn_1" style="color: white;" href="login.php">Comprar</a>
                    <?php endif; ?>

                    </div>

                </div>

            </div>

        </section>
    </main>

    <!-- Incluindo o footer -->
    <?php include('footer.php'); ?>

    <script src="Jquery\jquery-3.7.1.js"></script>
    <script src="JavaScript\global.js"></script>

</body>

</html>