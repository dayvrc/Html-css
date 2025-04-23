<?php
$host = "localhost";
$dbname = "projetohtml";
$user = "dayvson";
$password = "123456";

try {
    // Conexão com o banco de dados
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
    
        // Verificar se o email já existe
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $emailExiste = $stmt->fetchColumn();
    
        if ($emailExiste > 0) {
            echo json_encode(["erro" => "Este email já está cadastrado. Tente outro!"]);
            exit;
        }
    
        // Prosseguir com a inserção
        $sql = "INSERT INTO usuarios (nome, cpf, email, telefone, genero) VALUES (:nome, :cpf, :email, :telefone, :genero)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $_POST["nome"]);
        $stmt->bindParam(':cpf', $_POST["cpf"]);
        $stmt->bindParam(':telefone', $_POST["telefone"]);
        $stmt->bindParam(':genero', $_POST["gender"]);
        $stmt->execute();
    
        echo json_encode(["sucesso" => "Cadastro realizado com sucesso!"]);
    }

} catch (PDOException $e) {
    // Retorna o erro como JSON para ser capturado pelo JavaScript
    echo json_encode(["erro" => $e->getMessage()]);
}
?>