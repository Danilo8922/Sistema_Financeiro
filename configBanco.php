<?php require "conexao.php";

$criarTabelaPessoa = "CREATE TABLE pessoa(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50)
);";

$criarTabelaRecebimento = "CREATE TABLE contas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    donoConta VARCHAR(50),
    nome VARCHAR(50),
    valor FLOAT,
    tipo ENUM('recebimento','gasto')
);";

$inserirPessoa1 = "INSERT INTO pessoa (nome) VALUES ('Danilo Lenardi de Almeida')";
$inserirPessoa2 = "INSERT INTO pessoa (nome) VALUES ('Pérola Rafaela Barbosa Cardoso')";

$pdo->exec($criarTabelaPessoa);
$pdo->exec($criarTabelaRecebimento);
$pdo->exec($inserirPessoa1);
$pdo->exec($inserirPessoa2);

echo "Tabelas criadas no banco";
?>