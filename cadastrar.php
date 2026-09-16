<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';

    if (!empty($nome) && !empty($email)) {
        // Uso de Prepared Statements para segurança contra SQL Injection
        $stmt = $pdo->prepare("INSERT INTO alunos (nome, email) VALUES (:nome, :email)");
        $stmt->execute([
            ':nome'  => $nome,
            ':email' => $email
        ]);

        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>
</head>
<body>
    <h1>Novo Aluno</h1>
    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit">Salvar</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>