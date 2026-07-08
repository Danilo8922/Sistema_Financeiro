<?php
require "conexao.php";

$tipo = $_POST["tipo"];
$pessoa = $_POST["pessoa"];
$nome = $_POST["nomeRecebimento"];
$valor = $_POST["valor"];

$sql = "INSERT INTO contas (donoConta, nome, valor, tipo) VALUES (:donoConta, :nome, :valor, :tipo)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":donoConta" => $pessoa,
    ":nome" => $nome,
    ":valor" => $valor,
    ":tipo" => $tipo

]
);

header("Location: index.php");
exit;

?>