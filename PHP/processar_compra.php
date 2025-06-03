<?php
session_start();

require_once 'conexao.php';

header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['erro' => 'Usuário não logado.']);
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$destino = $_POST['destino'] ?? '';
$quantidade = intval($_POST['quantidade'] ?? 1);
$pagamento = $_POST['pagamento'] ?? '';
$valor_unitario = 2000;
$valor_total = $quantidade * $valor_unitario;
$data_compra = date('Y-m-d H:i:s');

try {
    $sql = "INSERT INTO compras (usuario_id, destino, quantidade, pagamento, valor_total, data_compra)
            VALUES (:usuario_id, :destino, :quantidade, :pagamento, :valor_total, :data_compra)
            RETURNING id_compra";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':usuario_id' => $usuario_id,
        ':destino' => $destino,
        ':quantidade' => $quantidade,
        ':pagamento' => $pagamento,
        ':valor_total' => $valor_total,
        ':data_compra' => $data_compra
    ]);

    $result = $stmt->fetch();

    if ($result) {
        echo json_encode(['sucesso' => "Compra finalizada com sucesso! Código: {$result['id_compra']}"]);
    } else {
        echo json_encode(['erro' => 'Erro ao registrar compra.']);
    }

} catch (Exception $e) {
    echo json_encode(['erro' => 'Erro ao salvar compra: ' . $e->getMessage()]);
}
