<?php
session_start();
require_once 'conexao.php'; // Certifique-se de que o arquivo conexao.php está correto

header('Content-Type: application/json');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['erro' => 'Usuário não logado.']);
    exit;
}

// Dados recebidos do formulário via POST
$usuario_id = $_SESSION['usuario_id'];
$destino = $_POST['destino'] ?? '';
$quantidade = intval($_POST['quantidade'] ?? 1);
$pagamento = $_POST['pagamento'] ?? '';
$valor_unitario = 2000;
$valor_total = $quantidade * $valor_unitario;
$data_compra = date('Y-m-d H:i:s');

try {
    // Comando SQL
    $sql = "INSERT INTO compras (usuario_id, destino, quantidade, pagamento, valor_total, data_compra)
            VALUES ($1, $2, $3, $4, $5, $6) RETURNING id_compra";

    // Executa a query preparada
    $stmt = pg_prepare($conn, "inserir_compra", $sql);
    $result = pg_execute($conn, "inserir_compra", [
        $usuario_id,
        $destino,
        $quantidade,
        $pagamento,
        $valor_total,
        $data_compra
    ]);

    // Verifica se a compra foi salva com sucesso
    if ($row = pg_fetch_assoc($result)) {
        echo json_encode(['sucesso' => "Compra finalizada com sucesso! Código: {$row['id_compra']}"]);
    } else {
        echo json_encode(['erro' => 'Erro ao registrar compra.']);
    }

} catch (Exception $e) {
    echo json_encode(['erro' => 'Erro ao salvar compra: ' . $e->getMessage()]);
}
