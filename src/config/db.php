<?php
// Inclui o arquivo de configuração
$config = require __DIR__ . '/../config/config.php';

try {
    // Cria a string de conexão (DSN)
    $dsn = "pgsql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

    // Cria a instância PDO para conectar ao banco de dados
    $pdo = new PDO($dsn, $config['user'], $config['password']);

    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Foi utilizado para teste da conexão do Banco de Dados
    // echo("Conexão realizada com sucesso.");
    // Retorna a instância PDO para ser usada em outros arquivos
    return $pdo;
} catch (PDOException $e) {
    // Em caso de erro, exibe uma mensagem e encerra a execução
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>