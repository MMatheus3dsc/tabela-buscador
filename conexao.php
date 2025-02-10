<?php
// Dados de conexão
$host = 'localhost';
$dbname = 'imobiliaria';
$user = 'root';
$password = '';

// Criando a conexão PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Lança exceções em caso de erro
    
} catch(PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
}

?>