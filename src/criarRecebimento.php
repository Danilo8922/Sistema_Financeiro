<?php
require "conexao.php";
$pessoas = $pdo->query("SELECT * FROM pessoa")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="criarGastoeRecebimento.css">
    <title>Criar Recebimento</title>
</head>
<body>
    <header>
        <h1>Crar Recebimento</h1>
        <button><a href="index.php">Voltar</a></button>
    </header>
    <form action="fazerRecebimento.php" method="POST">
        <input type="hidden" value="recebimento" name="tipo">

        <label>Dono do Recebimento</label>
        <select name="pessoa">
            <?php foreach ($pessoas as $cat): ?>
                <option value="<?php echo $cat["nome"];?>">
                    <?php echo htmlspecialchars($cat["nome"]); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Nome</label>
        <input type="text" placeholder="Recebimento de Sálario" name="nomeRecebimento">

        <label>Valor</label>
        <input type="number" step="0.01" name="valor">

        <button type="submit">Enviar</button>
    </form>
</body>
</html>