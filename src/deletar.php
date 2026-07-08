<?php
require "conexao.php";

$id = $_GET["id"] ?? null;

if (isset($_GET["confirmar"]) && $id) {
    $stmt = $pdo->prepare("DELETE FROM contas WHERE id = :id");
    $stmt->execute([":id" => $id]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="deletar.css">
    <title>Deletar Conta</title>
</head>
<body>
    <h1>Você Realmente Deseja Deletar a Conta?</h1>
    <button><a href="index.php">Voltar</a></button>
    <button>
        <a href="deletar.php?id=<?php echo $id; ?>&confirmar=1">Deletar</a>
    </button>
</body>
</html>