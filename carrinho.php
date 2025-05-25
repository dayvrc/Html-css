<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Carrinho - Aero Tour</title>
    <link rel="stylesheet" href="CSS/estilo.css">
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
                <td><input type="number" id="quantidade" value="1" min="1" max="10"></td>
                <td>R$ 2.000</td>
                <td id="total">R$ 2.000</td>
            </tr>
        </tbody>
    </table>

    <h3 style="margin-top: 20px;">Formas de Pagamento</h3>
    <form id="formCompra">
        <label><input type="radio" name="pagamento" value="pix" checked> PIX</label><br>
        <label><input type="radio" name="pagamento" value="credito"> Cartão de Crédito</label><br>
        <label><input type="radio" name="pagamento" value="boleto"> Boleto Bancário</label><br><br>

        <button type="submit" class="btn_1">Finalizar Compra</button>
    </form>
</section>

<div class="popup sucesso" id="popupMensagem">
    <p id="mensagemPopup"></p>
    <button onclick="fecharPopup()" class="btn_1">Fechar</button>
</div>

<?php include('footer.php'); ?>

<script src="Jquery/jquery-3.7.1.js"></script>
<script src="JS/global.js"></script>

<script>
    $('#formCompra').on('submit', function(e) {
        e.preventDefault();
        const quantidade = $('#quantidade').val();
        const pagamento = $('input[name=pagamento]:checked').val();

        $.ajax({
            url: '/PHP/processar_compra.php',
            method: 'POST',
            dataType: 'json',
            data: {
                destino: 'Salvador',
                quantidade: quantidade,
                pagamento: pagamento
            },
            success: function(resposta) {
                $('#mensagemPopup').text(resposta.sucesso || resposta.erro);
                $('#popupMensagem').fadeIn();
            }
        });
    });

    function fecharPopup() {
        $('#popupMensagem').fadeOut();
    }
</script>
</body>
</html>
