<?php
require_once 'conexao.php';

// Busca todos os registros
$stmt = $pdo->query("SELECT * FROM alunos ORDER BY id DESC");
$alunos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exemplo PHP + PostgreSQL</title>
</head>
<body>
    <h1>Lista de Alunos</h1>
    <a href="cadastrar.php">Cadastrar Novo Aluno</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno): ?>
                <tr>
                    <td><?= htmlspecialchars($aluno['id']) ?></td>
                    <td><?= htmlspecialchars($aluno['nome']) ?></td>
                    <td><?= htmlspecialchars($aluno['email']) ?></td>
                    <td>
                        <a href="excluir.php?id=<?= $aluno['id'] ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>