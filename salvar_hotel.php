<?php
include 'conexao.php';

$id = $_POST['id'];
$nome = $_POST[' nome'];
$cidade = $_POST['cidade'];
$estrelas = $_POST['estrelas'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO hoteis (id,nome,cidade,estrelas,email,senha)
VALUES('$id','$nome','$cidade','$estrelas','$email','$senha')";

$resultado = mysqli_query($conexao,$sql);

if (!$resultado){
    echo "erro ao cadastrar" . mysqli_error($conexao);
exit;
}

?>  
<!DOCTYPE html>
<html lang='pt-BR'>

<head>
    <meta charset='UTF-8'>
    <title>Hotel cadastrado</title>

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
            box-sizing: border-box;
        }

        .container {
            width: 450px;
            margin: 40px auto;
            padding: 25px;
            background-color: white;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 8px 30px rgba(0, 210, 255, 0.15);
            box-sizing: border-box;
            color: #1e293b;
        }

        h2 {
            color: #1e293b;
            margin-bottom: 30px;
        }

        p {
            text-align: left;
            color: #475569;
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 12px;
            margin: 12px 0;
            box-sizing: border-box;
        }

        p b {
            color: #0f172a;
        }

        a {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 30px;
            border: none;
            border-radius: 25px;
            background-color: #0f172a;
            color: #00d2ff;
            font-weight: bold;
            text-decoration: none;
            box-sizing: border-box;
        }

        a:hover {
            background-color: #00d2ff;
            color: #0f172a;
        }
    </style>
</head>

<body>

    <h1>
        Hotel cadastrado! 🏨
    </h1>

    <div class='container'>

        <h2>
            DADOS DO HOTEL
        </h2>

        <p><b>Nome do Hotel:</b> <?php
        
        echo $texto

        ?></p>

        <p><b>Cidade:</b> <?php
        
        echo $cidade

        ?></p>

        <p><b>Estrelas:</b> ⭐ <?php
        
        echo $avaliacao

        ?></p>

        <p><b>email:</b> <?php
        
        echo $email

        ?></p>

        <p><b>senha:</b> <?php
        
        echo "🔒🔒🔒🔒"

        ?></p>

        <br>

        <a href='cadastro_hotel.html'>
            VOLTAR
        </a>

    </div>

</body>

</html>
