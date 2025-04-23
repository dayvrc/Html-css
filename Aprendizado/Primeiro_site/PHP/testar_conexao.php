<?php
$host = "localhost";
$dbname = "projetohtml";
$user = "dayvson";
$password = "123456";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    echo "✅ Conexão bem-sucedida!";
} catch (PDOException $e) {
    echo "❌ Erro na conexão: " . $e->getMessage();
}
?>