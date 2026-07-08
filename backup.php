    <section>
        <?php require "conexao.php";

        $listarContas = $pdo->query("SELECT * FROM contas");
        $contas = $listarContas->fetchall(PDO::FETCH_ASSOC);
        $total = 0;
        echo"<ul>";

        foreach($contas as $conta){
            $id = htmlspecialchars($conta["id"]);
            $donoConta = htmlspecialchars($conta["donoConta"]);
            $nome = htmlspecialchars($conta["nome"]);
            $valor = htmlspecialchars($conta["valor"]);
            $tipo = htmlspecialchars($conta["tipo"]);
            if($tipo == "gasto"){
                $classe = "gasto";
                $total -= (float) $conta["valor"];
            } else {
                $classe = "recebimento";
                $total += (float) $conta["valor"];
            }

            echo"<li class='$classe'>$id - $donoConta - $nome - $valor R$ - $tipo</li>";
        };

        echo"</ul>";

        echo "<h2>TOTAL = R$ " . number_format($total, 2, ',', '.') . "</h2>"
        ?>

    </section>