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
} catch (PDOException $e) {
    echo json_encode(["erro" => "Erro no banco de dados: " . $e->getMessage()]);
    exit;
}

//FUNCAO DE LIMPAR DADOS
function limparPost($dado){
    $dado = trim($dado);
    $dado = stripslashes($dado);
    $dado = htmlspecialchars($dado);
    return $dado;
} 
?>
