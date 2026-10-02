<?php

require_once "conexao.php";

$sql = "SELECT quartos.*, hoteis.nome AS nome_hotel
        FROM quartos
        JOIN hoteis ON quartos.hotel_id = hoteis.id
        ORDER BY quartos.id";

$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos Cadastrados - Hotel Monopolio</title>
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
        .acoes {
            margin-top: 25px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="titulo_principal">HOTEL MONOPOLIO</h1>

    <div class="container">
        <h2>Quartos Cadastrados</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hotel</th>
                    <th>Número</th>
                    <th>Tipo</th>
                    <th>Preço da Diária</th>
                    <th>Disponível</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($quarto = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?= $quarto["id"] ?></td>
                        <td><?= htmlspecialchars($quarto["nome_hotel"]) ?></td>
                        <td><?= htmlspecialchars($quarto["numero"]) ?></td>
                        <td><?= htmlspecialchars($quarto["tipo"]) ?></td>
                        <td>R$ <?= number_format($quarto["preco_diaria"], 2, ",", ".") ?></td>
                        <td><?= $quarto["disponivel"] ? "Sim" : "Não" ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="acoes">
            <a href="cadastrar_quarto.html">Cadastrar novo quarto</a><br><br>
            <a href="logout_hotel.php">Voltar / Sair</a>
        </div>
    </div>
</body>
</html>