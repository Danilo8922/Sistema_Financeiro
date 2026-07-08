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
    <title>Criar Gasto</title>
</head>
<body>
    <header>
        <h1>Crar Gasto</h1>
        <button><a href="index.php">Voltar</a></button>
    </header>
    <form action="fazerGasto.php" method="POST">
        <input type="hidden" value="gasto" name="tipo">

        <label>Dono do Gasto</label>
        <select name="pessoa">
            <?php foreach ($pessoas as $pessoa): ?>
                <option value="<?php echo $pessoa["nome"];?>">
                    <?php echo htmlspecialchars($pessoa["nome"]); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Nome</label>
        <input type="text" placeholder="Gasto com Mecanico" name="nomeGasto">

        <label>Valor</label>
        <input type="number" name="valor" step="0.01">

        <button type="submit">Enviar</button>
    </form>
</body>
</html>