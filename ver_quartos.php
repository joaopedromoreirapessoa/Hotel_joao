<?php

require_once "conexao.php";

$id_hotel = (int) ($_GET["id_hotel"] ?? 0);

$sql_hotel = "SELECT * FROM hoteis WHERE id = $id_hotel";
$resultado_hotel = mysqli_query($conexao, $sql_hotel);
$hotel = mysqli_fetch_assoc($resultado_hotel);

$sql = "SELECT * FROM quartos
        WHERE hotel_id = $id_hotel AND disponivel = 1
        ORDER BY numero";

$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos Disponíveis - Hotel Monopolio</title>
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
        .form {
            max-width: 500px;
            margin: 30px auto;
            padding: 25px;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
        }
        .label {
            color: #475569;
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        .input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            box-sizing: border-box;
        }
        .btn-enviar {
            width: 100%;
            padding: 12px;
            margin-top: 30px;
            border: none;
            border-radius: 25px;
            background-color: #0f172a;
            color: #00d2ff;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1 class="titulo_principal">HOTEL MONOPOLIO</h1>

    <div class="container">
        <h2>Quartos Disponíveis</h2>

        <?php if ($hotel) { ?>
            <h3><?= htmlspecialchars($hotel["nome"]) ?> - <?= htmlspecialchars($hotel["cidade"]) ?></h3>
        <?php } ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número</th>
                    <th>Tipo</th>
                    <th>Preço da Diária</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($quarto = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?= $quarto["id"] ?></td>
                        <td><?= htmlspecialchars($quarto["numero"]) ?></td>
                        <td><?= htmlspecialchars($quarto["tipo"]) ?></td>
                        <td>R$ <?= number_format($quarto["preco_diaria"], 2, ",", ".") ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <form class="form" action="salvar_reserva.php" method="POST">
            <h2>Fazer Reserva</h2>

            <label class="label" for="id_cliente">ID do Cliente:</label>
            <input class="input" type="number" name="id_cliente" id="id_cliente" min="1" required>

            <label class="label" for="id_quarto">ID do Quarto:</label>
            <input class="input" type="number" name="id_quarto" id="id_quarto" min="1" required>

            <label class="label" for="data_entrada">Data de Entrada:</label>
            <input class="input" type="date" name="data_entrada" id="data_entrada" required>

            <label class="label" for="data_saida">Data de Saída:</label>
            <input class="input" type="date" name="data_saida" id="data_saida" required>

            <button class="btn-enviar" type="submit">CONFIRMAR RESERVA</button>
        </form>

        <p><a href="listar_hoteis.php">Voltar para lista de hotéis</a></p>
    </div>
</body>
</html>