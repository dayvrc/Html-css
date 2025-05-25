<?php
header('Content-Type: application/json');

// Inclui a conexão com o banco
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome     = $_POST["nome"]     ?? "";
    $cpf      = $_POST["cpf"]      ?? "";
    $email    = $_POST["email"]    ?? "";
    $telefone = $_POST["telefone"] ?? "";
    $genero   = $_POST["genero"]   ?? "";
    $senha    = $_POST["senha"]    ?? "";

    if (empty($nome) || empty($cpf) || empty($email) || empty($telefone) || empty($genero) || empty($senha)) {
        echo json_encode(["erro" => "Todos os campos são obrigatórios."]);
        exit;
    }

    // Verificar se o email já existe
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(["erro" => "Este email já está cadastrado."]);
        exit;
    }

    // Verificar se o CPF já existe
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE cpf = :cpf");
    $stmt->bindParam(':cpf', $cpf);
    $stmt->execute();
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(["erro" => "Este CPF já está cadastrado."]);
        exit;
    }

    // Hash da senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir usuário
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, cpf, email, telefone, genero, senha) 
                           VALUES (:nome, :cpf, :email, :telefone, :genero, :senha)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':senha', $senhaHash);
    $stmt->execute();

    echo json_encode(["sucesso" => "Cadastro realizado com sucesso!", "redirect" => "login.php"]);
    exit;
}
