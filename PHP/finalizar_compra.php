<?php
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(["erro" => "Você precisa estar logado para finalizar a compra."]);
    exit;
}

$host = "localhost";
$dbname = "projetohtml";
$user = "dayvson";
$password = "123456";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Recebe dados do POST
    $usuario_id = $_SESSION['usuario_id'];
    $destino = $_POST['destino'] ?? '';
    $quantidade = (int)($_POST['quantidade'] ?? 1);
    $pagamento = $_POST['pagamento'] ?? '';
    $valor_total = (float)($_POST['valor_total'] ?? 0);

    if (!$destino || !$pagamento || $quantidade <= 0 || $valor_total <= 0) {
        echo json_encode(["erro" => "Dados inválidos para finalizar a compra."]);
        exit;
    }

    // Insere compra
    $sql = "INSERT INTO compras (usuario_id, destino, quantidade, pagamento, valor_total, data_compra)
            VALUES (:usuario_id, :destino, :quantidade, :pagamento, :valor_total, NOW())
            RETURNING id_compra";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':usuario_id' => $usuario_id,
        ':destino' => $destino,
        ':quantidade' => $quantidade,
        ':pagamento' => $pagamento,
        ':valor_total' => $valor_total
    ]);

    $resultado = $stmt->fetch();

    if ($resultado && isset($resultado['id_compra'])) {
        echo json_encode([
            "sucesso" => "Compra finalizada com sucesso!",
            "id_compra" => $resultado['id_compra']
        ]);
    } else {
        echo json_encode(["erro" => "Não foi possível finalizar a compra."]);
    }

} catch (PDOException $e) {
    echo json_encode(["erro" => "Erro ao salvar compra: " . $e->getMessage()]);
}
