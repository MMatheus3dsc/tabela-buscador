<?php
require_once '../conexao.php';

try {
    $stmt = $pdo->query("SELECT * FROM corretores ORDER BY id DESC");
    $corretores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Erro ao listar corretores: ' . $e->getMessage());
}
?>
