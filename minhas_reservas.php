<?php

session_start();
require_once "conexao.php";

if (!isset($_SESSION["cliente_id"])) {
    echo "<h2>Você precisa fazer login para visualizar suas reservas.</h2>";
    echo '<a href="login.html">Ir para o login</a>';
    exit;
}

$id_cliente = (int) $_SESSION["cliente_id"];

$sql = "SELECT
            reservas.id,
            hoteis.nome AS nome_hotel,
            quartos.numero,
            quartos.tipo,
            quartos.preco_diaria,
            reservas.data_entrada,
            reservas.data_saida,
            reservas.total
        FROM reservas
        JOIN quartos ON reservas.quarto_id = quartos.id
        JOIN hoteis ON quartos.hotel_id = hoteis.id
        WHERE reservas.cliente_id = $id_cliente
        ORDER BY reservas.data_entrada DESC";

$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Reservas - Hotel Monopolio</title>
    <link rel="stylesheet" href="css/estilo.css">
    <style>
        .container {
            width: 95%;
            max-width: 1100px;
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
        <h2>Minhas Reservas</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hotel</th>
                    <th>Quarto</th>
                    <th>Tipo</th>
                    <th>Diária</th>
                    <th>Entrada</th>
                    <th>Saída</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($reserva = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?= $reserva["id"] ?></td>
                        <td><?= htmlspecialchars($reserva["nome_hotel"]) ?></td>
                        <td><?= htmlspecialchars($reserva["numero"]) ?></td>
                        <td><?= htmlspecialchars($reserva["tipo"]) ?></td>
                        <td>R$ <?= number_format($reserva["preco_diaria"], 2, ",", ".") ?></td>
                        <td><?= date("d/m/Y", strtotime($reserva["data_entrada"])) ?></td>
                        <td><?= date("d/m/Y", strtotime($reserva["data_saida"])) ?></td>
                        <td>R$ <?= number_format($reserva["total"], 2, ",", ".") ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="acoes">
            <a href="listar_hoteis.php">Voltar para lista de hotéis</a>
        </div>
    </div>
</body>
</html>