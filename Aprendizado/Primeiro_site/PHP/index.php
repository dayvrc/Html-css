<?php
header('Content-Type: application/json'); // Define que a resposta será JSON

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
        
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE cpf = :cpf");
        $stmt->bindParam(':cpf', $_POST["cpf"]);
        $stmt->execute();
        $cpfExiste = $stmt->fetchColumn();

        if ($cpfExiste > 0) {
            echo json_encode(["erro" => "Este CPF já está cadastrado no sistema! Caso tenha esquecido sua senha, tente recuperá-la. 🔐"]);
            exit;
        }

        // Inserir os dados no banco
        $sql = "INSERT INTO usuarios (nome, cpf, email, telefone, genero, senha) VALUES (:nome, :cpf, :email, :telefone, :genero, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $_POST["nome"]);
        $stmt->bindParam(':cpf', $_POST["cpf"]);
        $stmt->bindParam(':email', $_POST["email"]);
        $stmt->bindParam(':telefone', $_POST["telefone"]);
        $stmt->bindParam(':genero', $_POST["genero"]);
        $stmt->bindParam(':senha', $_POST["senha"]);
        $stmt->execute();

        // Retornar sucesso sem exibir o JSON direto na tela
        echo json_encode(["sucesso" => "Cadastro realizado com sucesso!", "redirect" => "login.html"]);
        exit;
    }

} catch (PDOException $e) {
    echo json_encode(["erro" => "Erro no banco de dados: " . $e->getMessage()]);
    exit;
}
?>