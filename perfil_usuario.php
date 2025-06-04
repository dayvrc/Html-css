<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

include('PHP/conexao.php');

$usuario_id = $_SESSION['usuario_id'];

// Consulta as compras do usuário logado
$stmt = $pdo->prepare("SELECT id_compra, destino, quantidade, pagamento, data_compra, valor_total FROM compras WHERE usuario_id = :usuario_id ORDER BY data_compra DESC");
$stmt->bindParam(':usuario_id', $usuario_id);
$stmt->execute();
$compras = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="CSS/estilo.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<?php include('navbarLogin.php'); ?>

<section class="section_carrinho">
    <h2>Minhas Compras</h2>

    <?php if (count($compras) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Destino</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Forma de Pagamento</th>
                    <th>Data da Compra</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compras as $compra): ?>
                    <tr>
                        <td><?= $compra['id_compra'] ?></td>
                        <td><?= htmlspecialchars($compra['destino']) ?></td>
                        <td><?= $compra['quantidade'] ?></td>
                        <td>R$ <?= number_format($compra['valor_total'], 2, ',', '.') ?></td>
                        <td><?= ucfirst(htmlspecialchars($compra['pagamento'])) ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($compra['data_compra'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center;">Você ainda não fez nenhuma compra.</p>
    <?php endif; ?>
</section>

<?php include('footer.php'); ?>

</body>
</html>
