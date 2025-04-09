<?php
// Configurações do banco de dados
$host = 'localhost'; // Host do banco (normalmente localhost)
$db = 'meu_banco'; // Nome do banco de dados
$user = 'seu_usuario'; // Seu nome de usuário no PostgreSQL
$pass = 'sua_senha'; // Sua senha no PostgreSQL
$port = '5432'; // Porta padrão do PostgreSQL

try {
    // Conectando ao banco de dados
    $dsn = "pgsql:host=$host;port=$port;dbname=$db"; // Data Source Name
    $pdo = new PDO($dsn, $user, $pass);

    // Configurando PDO para exibir mensagens de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Capturando os dados enviados pelo formulário
    $nome = $_POST['nome']; // Nome enviado pelo cliente
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email']; // E-mail enviado pelo cliente
    $telefone = $_POST['telefone']; // Telefone enviado pelo cliente (opcional)

    // Inserindo os dados no banco de dados
    $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (:nome, :email, :telefone)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':endereco', $endereco);

    if ($stmt->execute()) {
        echo "Dados cadastrados com sucesso!";
    } else {
        echo "Erro ao cadastrar os dados.";
    }
} catch (PDOException $e) {
    // Mostrando mensagens de erro
    echo "Erro na conexão: " . $e->getMessage();
}
?>