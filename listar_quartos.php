<?php

require_once 'conexao.php';

$sql = "SELECT * FROM quartos";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {

    echo "Erro ao consultar: " . mysqli_error($conexao);

    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #0f172a;
            background-color: white;
            border: 3px solid #00d2ff;
            border-radius: 50px;
            width: 350px;
            margin: 30px auto;
            padding: 10px;
            text-align: center;
        }

        .meio {
            width: 900px;
            max-width: 90%;
            margin: 40px auto;
            padding: 25px;
            background-color: white;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 8px 30px rgba(0, 210, 255, 0.15);
            box-sizing: border-box;
        }

        .titulo_secundario {
            color: #1e293b;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            overflow: hidden;
        }

        th {
            padding: 12px;
            background-color: #0f172a;
            color: #00d2ff;
            border: 1px solid #00d2ff;
        }

        td {
            padding: 12px;
            border: 1px solid #cbd5e1;
            color: #475569;
            background-color: #f8fafc;
        }

        tr:hover td {
            background-color: #e0f7ff;
        }

        .btn-voltar {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 25px;
            border: none;
            border-radius: 25px;
            background-color: #0f172a;
            color: #00d2ff;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-voltar:hover {
            background-color: #00d2ff;
            color: #0f172a;
        }

        .link-cadastro {
            display: block;
            margin-top: 25px;
            color: #0f172a;
            font-weight: bold;
            text-decoration: none;
        }

        .link-cadastro:hover {
            color: #00a8cc;
        }
    </style>
</head>

<body>

    <h1>QUARTOS 🏨</h1>

    <div class="meio">

        <h2 class="titulo_secundario">DADOS DOS QUARTOS</h2>

        <table>

            <tr>

                <th>
                    ID HOTEL
                </th>

                <th>
                    NÚMERO DO QUARTO
                </th>

                <th>
                    TIPO DO QUARTO
                </th>

                <th>
                    PREÇO DA DIÁRIA
                </th>

            </tr>

            <?php

            while ($quarto = mysqli_fetch_assoc($resultado)) {

                echo "<tr>";

                echo "<td>" 
                    . $quarto['hotel_id'] . 
                    "</td>";

                echo "<td>" 
                    . $quarto['numero'] . 
                    "</td>";

                echo "<td>" 
                    . $quarto['tipo'] . 
                    "</td>";

                echo "<td>" 
                    . "R$ " . $quarto['preco_diaria'] . 
                    "</td>";

                echo "</tr>";

            }

            ?>

        </table>

        <br>

        <a href='logout_hotel.php' class="btn-voltar">
            VOLTAR
        </a>

        <br>
        <br>

        <a href="cadastrar_quarto.html" class="link-cadastro">
            Clique aqui para ir para a tela de cadastro
        </a>

    </div>

</body>

</html>
