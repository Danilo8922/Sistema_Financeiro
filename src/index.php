<?php require "conexao.php";
    $listarContas = $pdo->query("SELECT * FROM contas");
    $contas = $listarContas->fetchall(PDO::FETCH_ASSOC);
    $total = 0;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <header>
        <h1>Controle Financeiro</h1>
        <div>
            <button><a href="criarRecebimento.php">Criar Novo Recebimento</a></button>
            <button><a href="criarGasto.php">Criar Novo Gasto</a></button>
        </div>
    </header>
    <table>
        <tr>
            <th>ID</th>
            <th>Dono da Conta</th>
            <th>Nome da Conta</th>
            <th>Valor da Conta</th>
            <th>Tipo da Conta</th>
            <th>Ações</th>
        </tr>
        <?php if(empty($contas)): ?>
            <tr>
                <td colspan="5" style="text-align:center; color:#999";>
                    Nehuma Tarefa Encontrada
                </td>
            </tr>
        <?php endif; ?>
        <?php foreach($contas as $conta){
            $id = $conta["id"];
            $donoConta = $conta["donoConta"];
            $nome = $conta["nome"];
            $valor = $conta["valor"];
            $tipo = $conta["tipo"]; 

            if($tipo == "gasto"){
                $classe = "gasto";
                $total -= (float) $conta["valor"];
            } else {
                $classe = "recebimento";
                $total += (float) $conta["valor"];
            };
            $referencia = "deletar.php?id=$id";
        echo "<tr>";
            echo"<td class='$classe'>$id</td>";
            echo"<td class='$classe'>$donoConta</td>";
            echo"<td class='$classe'>$nome</td>";
            echo"<td class='$classe'>$valor</td>";
            echo"<td class='$classe'>$tipo</td>";
            echo"<td><button><a href='$referencia'>Deletar</a></button></td>";
        echo"</tr>";      
        };

        ?>       
    </table>
    <section>
        <?php
        $classeTotal = $total < 0 ? "total-negativo" : "total-positivo";
        echo "<h2 class='$classeTotal'>TOTAL = R$ " . number_format($total, 2, ',', '.') . "</h2>";
        ?>    
    </section>



</body>
</html>