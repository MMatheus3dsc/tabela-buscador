<?php 
session_start();
require 'listar.php'; 


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Corretor</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container-form">
        <h2>Cadastro de Corretor</h2>
        <form id="cadastro-corretor" action="cadastro.php" method="post">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Nome completo" required>
                <span class="error-message" id="nome-erro"></span>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="CPF" required>
                <span class="error-message" id="cpf-erro"></span>
            </div>
            <div class="form-group">
                <label for="creci">Creci:</label>
                <input type="text" id="creci" name="creci" placeholder="Creci" required>
                <span class="error-message" id="creci-erro"></span>
            </div>
            <div class="form-group">
                <button type="submit" id="submit-button">Enviar</button>
            </div>
        </form>

        <h3>Lista de Corretores</h3>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Creci</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($corretores)): ?>
                    <?php foreach ($corretores as $corretor): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($corretor['id']); ?></td>
                            <td><?php echo htmlspecialchars($corretor['nome']); ?></td>
                            <td><?php echo htmlspecialchars($corretor['cpf']); ?></td>
                            <td><?php echo htmlspecialchars($corretor['creci']); ?></td>
                            <td>
                                <button onclick="editarCorretor(<?php echo $corretor['id']; ?>, '<?php echo htmlspecialchars($corretor['nome']); ?>', '<?php echo htmlspecialchars($corretor['cpf']); ?>', '<?php echo htmlspecialchars($corretor['creci']); ?>')" title="Editar">
                                    ✏️
                                </button>
                                <a href="cadastro.php?delete=<?php echo $corretor['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este registro?')" title="Excluir">
                                    ❌
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Nenhum corretor cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="assets/script.js"></script>
</body>
</html>
