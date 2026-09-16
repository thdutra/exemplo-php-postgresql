<?php
// Tenta ler a URL de conexão do PostgreSQL fornecida pelo Render.com
$dbUrl = getenv('DATABASE_URL');

if ($dbUrl) {
    // Ambiente de Produção (Render.com)
    $dbopts = parse_url($dbUrl);
    $host     = $dbopts["host"];
    $port     = $dbopts["port"] ?? "5432";
    $user     = $dbopts["user"];
    $password = $dbopts["pass"];
    $dbname   = ltrim($dbopts["path"], '/');
} else {
    // Ambiente Local de Desenvolvimento (ex: PostgreSQL local)
    $host     = "localhost";
    $port     = "5432";
    $user     = "postgres";
    $password = "postgres";
    $dbname   = "exemplo_db";
}

try {
    // Conexão via PDO para PostgreSQL
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}