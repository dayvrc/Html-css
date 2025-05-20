<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

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

<section class="section_carrinho" style="padding: 2rem;">
    <h2>Carrinho de Compras</h2>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
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
                <td>
                    <input type="number" name="quantidade" value="1" min="1" max="10">
                </td>
                <td>R$ 2.000</td>
                <td>R$ 2.000</td>
            </tr>
        </tbody>
    </table>

    <h3 style="margin-top: 20px;">Formas de Pagamento</h3>
    <form>
        <label><input type="radio" name="pagamento" value="pix" checked> PIX</label><br>
        <label><input type="radio" name="pagamento" value="credito"> Cartão de Crédito</label><br>
        <label><input type="radio" name="pagamento" value="boleto"> Boleto Bancário</label><br><br>

        <button type="submit" class="btn_1">Finalizar Compra</button>
    </form>
</section>

    <!-- Incluindo o footer -->
    <?php include('footer.php'); ?>

    <script src="Jquery/jquery-3.7.1.js"></script>
    <script src="JS/global.js"></script>

</body>
</html>
