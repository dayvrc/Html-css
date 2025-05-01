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

        if (!$usuario) {
            file_put_contents('C:/xampp/htdocs/debug_login.txt', "Usuário não encontrado para o email: $email\n", FILE_APPEND);
            echo json_encode(["erro" => "Email ou senha incorretos!"]);
            exit;
        }
        
        file_put_contents('C:/xampp/htdocs/debug_login.txt', "Senha digitada: $senha\nSenha no banco: {$usuario['senha']}\n", FILE_APPEND);
        
        if (!password_verify($senha, $usuario["senha"])) {
            file_put_contents('C:/xampp/htdocs/debug_login.txt', "Password_verify falhou\n", FILE_APPEND);
            echo json_encode(["erro" => "Email ou senha incorretos!"]);
            exit;
        }
        

        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["usuario_nome"] = $usuario["nome"];

        echo json_encode(["sucesso" => "Login realizado!", "redirect" => "passagem.html"]);
        exit;
    }

} catch (PDOException $e) {
    echo json_encode(["erro" => "Erro no banco de dados: " . $e->getMessage()]);
    exit;
}
?>