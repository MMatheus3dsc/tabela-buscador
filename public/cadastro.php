<?php
require_once '../conexao.php';

// cadastro e edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $creci = $_POST['creci'];

    try {
        if ($id) {
                // Atualizar registro
            $stmt = $pdo->prepare("UPDATE corretores SET nome = :nome, cpf = :cpf, creci = :creci WHERE id = :id");
            $stmt->bindParam(':id', $id);
        } else {
         // Inserir novo registro
            $stmt = $pdo->prepare("INSERT INTO corretores (nome, cpf, creci) VALUES (:nome, :cpf, :creci)");
        }
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':creci', $creci);
        $stmt->execute();

        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        die('Erro ao salvar: ' . $e->getMessage());
    }
}

                    // Lógica do excluir
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    try {
        $stmt = $pdo->prepare("DELETE FROM corretores WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        die('Erro ao excluir: ' . $e->getMessage());
    }
}
?>
