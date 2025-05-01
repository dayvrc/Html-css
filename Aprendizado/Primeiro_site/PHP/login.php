<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
header('Content-Type: application/json');

$host = "localhost";
$dbname = "projetohtml";
$user = "dayvson";
$password = "123456";



try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $stmt = $pdo->prepare("SELECT id, nome, senha FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch();

        if (!$usuario || !password_verify($senha, $usuario["senha"])) {
            echo json_encode(["erro" => "Email ou senha incorretos!"]);
            exit;
        }

        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["usuario_nome"] = $usuario["nome"];

        echo json_encode(["sucesso" => "Login realizado com sucesso!", "redirect" => "passagem.html"]);

        echo json_encode([
            "sucesso" => "Login realizado!",
            "redirect" => "passagem.html",
            "usuario_id" => $_SESSION["usuario_id"] ?? null,
            "usuario_nome" => $_SESSION["usuario_nome"] ?? null
        ]);
        

        exit;
    }

} catch (PDOException $e) {
    echo json_encode(["erro" => "Erro no banco de dados: " . $e->getMessage()]);
    exit;
}
?>