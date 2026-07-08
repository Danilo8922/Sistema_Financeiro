<?php
$host = "mysql";
$banco = "curso_php";
$usuario = "danilo";
$password = "senha123";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8",
        $usuario,
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_log("Banco conectado com sucesso"); // ← vai pro log do container

} catch (PDOException $e) {
    error_log("Erro ao conectar: " . $e->getMessage());
    die("Erro na conexão com o banco."); // para tudo e exibe mensagem simples
}




?>