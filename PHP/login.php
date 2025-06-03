<?php
session_start();

require_once 'conexao.php';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = limparPost($_POST["email"]);
        $senha = limparPost($_POST["senha"]);

        $stmt = $pdo->prepare("SELECT id, nome, senha FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch();

        if (!$usuario || !password_verify($senha, $usuario["senha"])) {
            // Você pode redirecionar para login com erro
            header("Location: ../login.php?erro=1");
            exit;
        }

        // Armazenando dados na sessão
        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["usuario_nome"] = $usuario["nome"];

        // Redirecionando para a página principal
        header("Location: ../index.php");
        exit;
    }

} catch (PDOException $e) {
    // Em ambiente real, evite mostrar erro diretamente
    echo "Erro no banco de dados: " . $e->getMessage();
    exit;
}
?>
