<?php

require_once "conexao.php";

$sql = "SELECT * FROM hoteis ORDER BY id";
$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotéis - Hotel Monopolio</title>
    <link rel="stylesheet" href="css/estilo.css">
    <style>
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
            padding: 25px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 210, 255, 0.15);
        }
        .titulo_principal {
            color: #0f172a;
            background-color: white;
            border: 3px solid #00d2ff;
            border-radius: 50px;
            width: 350px;
            margin: 30px auto;
            padding: 10px;
            text-align: center;
        }
        .hotel {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            margin: 15px 0;
            background-color: #f8fafc;
        }
        .botao {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 18px;
            border-radius: 25px;
            background-color: #0f172a;
            color: #00d2ff;
        }
    </style>
</head>
<body>
    <h1 class="titulo_principal">HOTEL MONOPOLIO</h1>

    <div class="container">
        <h2>Hotéis Parceiros</h2>

        <?php while ($hotel = mysqli_fetch_assoc($resultado)) { ?>
            <div class="hotel">
                <h3><?= htmlspecialchars($hotel["nome"]) ?></h3>
                <p><strong>Cidade:</strong> <?= htmlspecialchars($hotel["cidade"]) ?></p>
                <p><strong>Estrelas:</strong> <?= (int) $hotel["estrelas"] ?></p>

                <a class="botao" href="ver_quartos.php?id_hotel=<?= $hotel["id"] ?>">
                    Ver Quartos Disponíveis
                </a>
            </div>
        <?php } ?>

        <p><a href="login.html">Voltar / Sair</a></p>
    </div>
</body>
</html>