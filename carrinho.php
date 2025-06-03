<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html> <!--Tag que mostra que o documento e tipo html-->
<html lang="pt-br"> <!--Tag que inicia o html e lang define idioma-->

<!-- SHIFT + ALT + A - ATALHO DE COMENTARIO -->

<head> <!--Tag cabeça o que está aqui não e visto pelo user só navegador-->
    <meta charset="UTF-8"> <!--Tag de tipo de caracter com acento-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Tag de combatibilidade de explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Tag de compatibilidade de expansão de tela-->
    <meta name="description" content="Esse é meu primeiro site">
    <meta name="keywords" content="programacao,html,css,javascript">
    <meta name="author" content="Dayvson Costa">
    <title>Aero Tour | Viaje bem</title> <!--Tag de titulo-->
    <link rel="stylesheet" href="CSS/estilo.css"> <!--TAG PARA LINK DE CSS-->
</head>


<body>

    <?php include('navbarLogin.php'); ?>

    <section class="section_carrinho">

        <h2>Carrinho de Compras</h2>

            <div id="items_carrinho">

                <table>
                    <thead>
                        <tr>
                            <th>Destino</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Salvador</td>
                            <td><input type="number" id="quantidade" value="1" min="1" max="10"></td>
                            <td>R$ 2.000</td>
                            <td id="total">R$ 2.000</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>

            <div id="formas_pagamento">

                <h3 style="margin-top: 20px;">Formas de Pagamento</h3>

                <form id="formCompra">
                    <label><input type="radio" name="pagamento" value="pix" checked> PIX</label><br>
                    <label><input type="radio" name="pagamento" value="credito"> Cartão de Crédito</label><br>
                    <label><input type="radio" name="pagamento" value="boleto"> Boleto Bancário</label><br><br>

                    <button type="submit" class="btn_1" >Finalizar Compra</button>
                </form>

            </div>
        
        <div class="popup sucesso" id="popupMensagem">
            <p id="mensagemPopup"></p>
            <button onclick="fecharPopup()" class="btn_1">Fechar</button>
        </div>

    </section>



    <?php include('footer.php'); ?>

    <script src="Jquery\jquery-3.7.1.js"></script>
    <script src="JavaScript\global.js"></script>

   </body>

</html>
